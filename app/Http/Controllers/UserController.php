<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserCreateRequest;
use Laracasts\Flash\Flash;
use DB;
use App\Tools\Uploads;

class UserController extends Controller
{
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    return view('admin.users.index');
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  public function indexAjax()
  {
    if(!\request()->ajax()) abort(403, 'No tiene permisos para acceder a esta petición');

    $users = User::query()->whereIn('estado', ['activo', 'inactivo', 'bloqueado']);
    return DataTables()
      ->eloquent($users)
      ->editColumn('foto', function($users){
        $img =  '<img src="'.miAvatar($users).'" class="img-fluid rounded-circle" 
      width="30" alt="'.$users->nombre.'">';
        return $img;
      })
      ->editColumn('estado', function($users){
        $clase = '';
        if($users->estado == 'activo') $clase = 'bg-success';
        if($users->estado == 'inactivo') $clase = 'bg-warning';
        $estado = '<span class="p-1 px-3 rounded '.$clase.'">'.$users->estado.'</span>';
        return $estado;
      })
      ->addColumn('aciones', function($users){
        $btn = '<a href="#" data-href="'.route('user.destroy', $users).'" data-request="ajax" 
        class="btn btn-danger btn-delete-info mb-2 mr-1"><i class="far fa-trash-alt pr-1"></i>Eliminar</a>';

        $btn .='<a href="'.route('user.edit', $users).'" class="btn btn-primary mb-2"><i class="fas fa-edit pr-1"></i>Editar</a>';
        return $btn;
      })
      ->rawColumns(['foto', 'aciones', 'estado'])
      //->toJson();
      ->make(true);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function  create()
  {
    $estados = ['activo' => 'Activo', 'inactivo' => 'Inactivo'];
    return view('admin.users.create', compact('roles', 'estados'));
  }

  /**
   * @param UserCreateRequest $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public  function store(UserCreateRequest $request)
  {
    $user = User::create($request->all());
    $user->password = bcrypt($request->password);
    $user->save();

    if($request->foto) {
      $archivo = new Uploads($request, 'foto', 'users',$user->url, [[500, 500]]);
      $nuevo = $archivo->uploadImage();
      $user->foto = $nuevo;
      $user->save();
    }

    Flash::success('Usuario creado correctamente');
    return redirect()->route('user.edit', $user);
  }

  /**
   * @param User $user
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function  edit(User $user)
  {
    $estados = ['activo' => 'Activo', 'inactivo' => 'Inactivo'];
    return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'estados'));
  }

  /**
   * @param UserEditRequest $request
   * @param User $user
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(UserEditRequest $request, User $user)
  {
    $user->fill($request->all())->save();

    if($request->password) {
      $user->password = bcrypt($request->password);
      $user->save();
    }

    if($request->foto) {
      $archivo = new Uploads($request, 'foto', 'users',$user->url, [[500, 500]]);
      if($user->foto) $archivo->deleteFiles($user->foto);
      $nuevo = $archivo->uploadImage();
      $user->foto = $nuevo;
      $user->save();
    }

    Flash::success('Usuario actualizado correctamente');
    return redirect()->route('user.edit', $user);
  }

  public function frmPerfil(User $user)
  {
    if($user->id != auth()->id()) abort(403);
    $perfil = true;
    return view('admin.users.perfil', compact('user', 'perfil', 'userRoles'));
  }
  public function perfil(UserEditRequest $request, User $user)
  {
    if($user->id != auth()->id()) abort(403);
    $user->fill($request->all())->save();

    if($request->password) {
      $user->password = bcrypt($request->password);
      $user->save();
    }

    if($request->foto) {
      $archivo = new Uploads($request, 'foto', 'users',$user->url, [[500, 500]]);
      if($user->foto) $archivo->deleteFiles($user->foto);
      $nuevo = $archivo->uploadImage();
      $user->foto = $nuevo;
      $user->save();
    }

    Flash::success('Perfil actualizado correctamente');
    return redirect()->route('user.perfil', $user);
  }

  public function  destroy(User $user)
  {
    $user->delete();
    Flash::success('Usuari eliminado con exito');
    return response()->json(['response' => true]);
  }


}
