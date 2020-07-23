<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Laracasts\Flash\Flash;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tipo_documento.index');
    }

  public function indexAjax()
  {
    if(!\request()->ajax()) abort(403, 'No tiene permisos para acceder a esta petición');

    $preguntas = TipoDocumento::query();
    return DataTables()
      ->eloquent($preguntas)
      ->editColumn('created_at', function($preguntas){
        return ($preguntas->created_at)->diffForHumans();
      })
      ->editColumn('updated_at', function($preguntas){
        return ($preguntas->updated_at)->diffForHumans();
      })
      ->addColumn('aciones', function($preguntas){
        $btn = '<a href="#" data-href="'.route('tpdocumento.destroy', $preguntas).'" data-request="ajax" 
        class="btn btn-danger btn-delete-info mb-2 mr-1"><i class="far fa-trash-alt pr-1"></i>Eliminar</a>';
        $btn .= '<a href="'.route('tpdocumento.edit', $preguntas).'" class="btn btn-primary mb-2"><i class="fas fa-edit pr-1"></i>Editar</a>';
        return $btn;
      })
      ->rawColumns(['aciones', 'pregunta', 'traduccion', 'estado'])
      //->toJson();
      ->make(true);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tipo_documento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipo = TipoDocumento::create($request->all());

      Flash::success('Tipo de documento creada con exito');
      return redirect()->route('tpdocumento.index', $tipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $tipo)
    {
      return view('admin.tipo_documento.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipo)
    {
      $tipo->fill($request->all())->save();
      Flash::success('Tipo de documento actualizada con exito');
      return redirect()->route('tpdocumento.index', $tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipo)
    {
      $tipo->delete();
      Flash::success('Tipo de documento eliminado con exito');
      return response()->json(['response' => true]);
    }
}
