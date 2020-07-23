<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
   public function store(Request $request)
   {
     $data = [];
     $data['status'] = 406;
     if($request->isJson() && $request->hasHeader('Content-Type')) {
       $data['status'] = 201;
       DB::beginTransaction();
       dd($request->all());
       $cliente = null;
       $vehiculo = null;
       try {
         $cliente = $cliente = Cliente::create();
       } catch(ValidationException $e){
         DB::rollback();
       }
       catch(\Exception $e)
       {
         DB::rollback();
         throw $e;
       }
     }

     return response()->json(['cliente' => $data], $data['status']);
   }

   public function show(Request $request, $documento)
   {
     $data = [];
     $data['status'] = 404;
     $cliente = Cliente::where('documento', $documento)->first();
     if($cliente) {
       $data['status'] = 200;
       $data['cliente'] = [
         'nombre' => $cliente->nombres,
         'documento' => $cliente->documento,
         'tipo_documento' => $cliente->tipoDocumento->tipo_documento,
         'telefono' => $cliente->telefono,
         'email' => $cliente->email,
       ];
       $tmp = [];
       foreach ($cliente->vehiculos as $v) {
         $tmp[] = ['placa' => $v->placa, 'tipo' => $v->tipo->tipo, 'marca' => $v->marca->marca];
       }
       $data['vehiculo'] = $tmp;
       unset($tmp);
     }

     return response()->json(['cliente' => $data], $data['status']);
   }

   public  function getMarcas()
   {
     $marcas = Marca::select('id as cod', 'marca')->get();
     return response()->json(['marcas' => $marcas]);
   }
  public  function getTipos()
  {
    $tipos = Tipo::select('id as cod', 'tipo')->get();
    return response()->json(['tipos_vehiculos' => $tipos]);
  }
  public  function getTiposDocumento()
  {
    $tipos = TipoDocumento::select('id as cod', 'tipo_documento as tipo')->get();
    return response()->json(['tipos_documento' => $tipos]);
  }
}
