<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\TipoDocumento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\ClienteCreateRequest;
use Laracasts\Flash\Flash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $busqeda = $request->busqeda;
      $clientes = Cliente::where(function ($q) use($busqeda){
        $q->where('nombres', 'like', '%'.$busqeda.'%');
        $q->orWhere('documento', 'like', '%'.$busqeda.'%');
        $q->orWhere('email', 'like', '%'.$busqeda.'%');
        $q->orWhere('placa', 'like', '%'.$busqeda.'%');
      })
      ->join('tipos_documentos', 'tipo_documento_id', '=', 'tipos_documentos.id')
      ->join('clientes_vehiculos', 'clientes.id', '=', 'cliente_id')
      ->join('vehiculos', 'vehiculo_id', '=', 'vehiculos.id')
      ->select('clientes.*', 'tipos_documentos.tipo_documento', DB::raw('GROUP_CONCAT(placa) placa'))
      ->groupBy('clientes.id')
      ->paginate(20);
      return view('admin.clientes.index', compact('clientes', 'busqeda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipos_documento = TipoDocumento::pluck('tipo_documento','id')->prepend('Seleccione un tipo de documento', '');
      $marcas = Marca::all();
      $tipos = Tipo::all();
      return view('admin.clientes.create', compact('tipos_documento', 'marcas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteCreateRequest $request)
    {
       $cliente = Cliente::create($request->all());
       foreach ($request->placa as $k => $val) {
         $vehiculo = new Vehiculo;
         $vehiculo->placa = $val;
         $vehiculo->marca_id = $request->marca_id[$k];
         $vehiculo->tipo_id = $request->tipo_id[$k];
         $vehiculo->save();
         $cliente->vehiculos()->sync($vehiculo->id);
       }

       Flash::success('Cliente creado con exito');
       return redirect()->route('cliente.edit', $cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
      $tipos_documento = TipoDocumento::pluck('tipo_documento','id')->prepend('Seleccione un tipo de documento', '');
      $marcas = Marca::all();
      $tipos = Tipo::all();
      return view('admin.clientes.edit', compact('cliente','tipos_documento', 'marcas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
      $cliente->fill($request->all())->save();
      foreach ($request->placa as $k => $val) {
        $vehiculo = new Vehiculo;
        $vehiculo->placa = $val;
        $vehiculo->marca_id = $request->marca_id[$k];
        $vehiculo->tipo_id = $request->tipo_id[$k];
        $vehiculo->save();
        $cliente->vehiculos()->sync($vehiculo->id);
      }

      Flash::success('Cliente creado con exito');
      return redirect()->route('cliente.edit', $cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
