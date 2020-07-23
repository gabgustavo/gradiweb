<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\TipoDocumento;
use App\Models\Vehiculo;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class ApiController extends Controller
{
  /*
   * TODO Falta en todos corroborar el token que sea valido
   * */
  public function getToken(Request $request)
  {
    if($request->isJson() && $request->hasHeader('Content-Type')) {
      if($request->usuario && $request->contrasena) {
        $pass = bcrypt($request->contrasena);
        $data =[
          'user' => $request->usuario,
          'password' => $request->contrasena,
          'estado'=>'activo'
        ];
        if(Auth::attempt($data)) {
          $user = auth()->user();
          return response()->json(['token' => $user->token, 'msg' => '', 'status' => 200], 200);
        }
      }
      return response()->json(['token' => null, 'msg' =>
        'Validar información', 'status' => 203], 203);
    }

    return response()->json(['token' => null, 'msg'
    => 'Validar información', 'status' => 203], 203);
  }
   public function store(Request $request)
   {
     $data = [];
     $data['status'] = 406;

     if($request->isJson() && $request->hasHeader('Content-Type') && $request->token) {
       DB::beginTransaction();

       try {
         $tpDocumento = (!is_int($request->cliente['tipo_documento']))
         ? TipoDocumento::where('tipo_documento', $request->cliente['tipo_documento'])->first()
         : TipoDocumento::where('id', $request->cliente['tipo_documento'])->first();

         $placa = (isset($request->vehiculo[0]['placa'])) ? $request->vehiculo[0]['placa'] :'';
         $marca = (isset($request->vehiculo[0]['marca'])) ? Marca::find($request->vehiculo[0]['marca']) :'';
         $tipo = (isset($request->vehiculo[0]['tipo'])) ? Marca::find($request->vehiculo[0]['tipo']) :'';

         if($tpDocumento && $placa && $marca && $tipo &&
           isset($request->cliente['nombre']) && isset($request->cliente['documento'])) {

           $telefono = isset($request->cliente['telefono']) ? $request->cliente['telefono'] : null;
           $email = isset($request->cliente['email']) ? $request->cliente['email'] : null;
           $cliente = Cliente::where('documento', $request->cliente['documento'])->first();
           $vehiculo = Vehiculo::where('placa', $placa)->first();
           if (!$cliente && !$vehiculo){

             $cliente = Cliente::create([
               'nombres' => $request->cliente['nombre'],
               'documento' => $request->cliente['documento'],
               'tipo_documento_id' => $tpDocumento->id,
               'telefono' => $telefono,
               'email' => $email,
             ]);

             $vehiculo = Vehiculo::create([
               'placa' => $placa,
               'marca_id' => $marca->id,
               'tipo_id' => $tipo->id,
             ]);

             $cliente->vehiculos()->sync($vehiculo->id);

             DB::commit();

             $cliente = Cliente::getCliente($request->cliente['documento'], 201);

             return response()->json(['cliente' => $cliente], 201);
           } else {
             DB::rollback();
             return response()->json(['cliente' => null, 'msg' => 'Cliente o vehiculo ya esta registrado'], 406);
           }
         } else {
           DB::rollback();
           return response()->json(['cliente' => null, 'msg' => 'Falta información requerida'], 406);
         }

       } catch(\Exception $e) {
         DB::rollback();
         return response()->json(['cliente' => $data], 500);
       }
     }

     return response()->json(['cliente' => $data], $data['status']);
   }

   public function show(Request $request, $documento)
   {
     $cliente = [];
     $cliente['status'] = 403;

     if($request->token) {
       $cliente = Cliente::getCliente($documento);
     }
     return response()->json(['cliente' => $cliente], $cliente['status']);
   }

   public  function getMarcas(Request $request)
   {
     $marcas = [];
     $marcas['status'] = 403;
     if($request->token) {
       $marcas = Marca::select('id as cod', 'marca')->get();
       $marcas['status'] = 200;
     }

     return response()->json(['marcas' => $marcas],$marcas['status']);
   }
  public  function getTipos(Request $request)
  {
    $tipos = [];
    $tipos['status'] = 403;
    if($request->token) {
      $tipos = Tipo::select('id as cod', 'tipo')->get();
      $tipos['status'] = 200;
    }
    return response()->json(['tipos_vehiculos' => $tipos], $tipos['status']);
  }
  public  function getTiposDocumento(Request $request)
  {
    $tipos = [];
    $tipos['status'] = 403;
    if($request->token) {
      $tipos = TipoDocumento::select('id as cod', 'tipo_documento as tipo')->get();
      $tipos['status'] = 200;
    }
    return response()->json(['tipos_documento' => $tipos], $tipos['status']);
  }

  public function getVehiculos(Request $request)
  {
    $status = $request->token ? 203 : 403;
    if($request->isJson() && $request->hasHeader('Content-Type') && $request->token) {
      $marcas = Marca::orderBy('marca')->get();
      $data = [];
      foreach ($marcas as $marca) {
        $vehiculos = [];
        foreach ($marca->vehiculos as $vehiculo) {
          $vehiculos[] = [
            'placa' => $vehiculo->placa
          ];
        }
        $data['marcas'][] = [
          'marca' => ucfirst(strtolower($marca->marca)),
          'num_vehiculos' => count($marca->vehiculos),
          'vehiculos' => $vehiculos
        ];
      }

      return response()->json(['vehiculos' => $data, 'msg' => '', 'status' => 200], 200);
    }

    return response()->json(['vehiculos' => null, 'msg' => 'Petición no valida', 'status' => $status], $status);
  }
}
