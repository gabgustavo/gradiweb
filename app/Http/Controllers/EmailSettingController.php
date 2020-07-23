<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Laracasts\Flash\Flash;
use App\Http\Requests\EmailSettingCreateRequest;

class EmailSettingController extends Controller
{
  public function index()
  {
    return view('admin.configuraciones.emails.index');
  }
  public function indexAjax()
  {
    if(!\request()->ajax()) abort(403, 'No tiene permisos para acceder a esta petición');

    $emails = EmailSetting::query();
    return DataTables()
      ->eloquent($emails)
      ->editColumn('active', function($emails){
        $msg = ($emails->active) ? 'Si': 'No';
        $clase = ($emails->active) ? 'bg-success': 'bg-secondary';
        $html = '<span class="p-2 rounded '.$clase.'">'.$msg.'</span>';
        return $html;
      })
      ->editColumn('authenticate', function($emails){
        $msg = ($emails->authenticate) ? 'Si': 'No';
        $clase = ($emails->authenticate) ? 'bg-success': 'bg-secondary';
        $html = '<span class="p-2 rounded '.$clase.'">'.$msg.'</span>';
        return $html;
      })
      ->editColumn('created_at', function($emails){
        return ($emails->created_at)->diffForHumans();
      })
      ->editColumn('updated_at', function($emails){
        return ($emails->updated_at)->diffForHumans();
      })
      ->addColumn('aciones', function($emails){
        $btn = '
        <a href="#" data-href="'.route('email.destroy', $emails).'" 
        class="btn btn-danger btn-delete-info mb-2"><i class="far fa-trash-alt pr-1"></i>Eliminar</a>
        ';
        $btn .= '
        <a href="'.route('email.edit', $emails).'" class="btn btn-primary mb-2"><i class="fas fa-edit pr-1"></i>Editar</a>
        ';
        return $btn;
      })
      ->rawColumns(['aciones', 'active', 'authenticate'])
      //->toJson();
      ->make(true);
  }
    public  function create()
    {
      $select = ['1' => 'Si', '0' => 'No'];
      $smtp_secure = ['' => 'None', 'tls' => 'tls', 'ssl' => 'ssl'];
      return view('admin.configuraciones.emails.create',compact('select', 'smtp_secure'));
    }
    public  function store(EmailSettingCreateRequest $request)
    {
      if($request->active) {
        EmailSetting::where('active', 1)->update(['active' => 0]);
      }
      $email = EmailSetting::create($request->all());
      Flash::success('La nueva configuración de correo se creo correctamente');
      return redirect()->route('email.edit', $email);
    }
    public  function edit(EmailSetting $email)
    {
      $select = ['1' => 'Si', '0' => 'No'];
      $smtp_secure = ['' => 'None', 'tls' => 'tls', 'ssl' => 'ssl'];
      return view('admin.configuraciones.emails.edit', compact('email', 'select', 'smtp_secure'));
    }
    public  function update(EmailSettingCreateRequest $request, EmailSetting $email)
    {
      if($request->active) {
        EmailSetting::where('active', 1)->where('id', '!=', $email->id)->update(['active' => 0]);
      }
      $email->fill($request->all())->save();
      Flash::success('La configuración de correo se actualizo correctamente');
      return redirect()->route('email.edit', $email);
    }
    public  function destroy(EmailSetting $email)
    {
      $email->delete();

      Flash::success('Configurción de email seha eliminado con exito');
      return redirect()->route('email.index');
    }
}
