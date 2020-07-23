<?php

namespace Tests\Feature;

use App\Models\Tipo;
use App\Models\TipoDocumento;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TipoDocumentoTest extends TestCase
{
  use RefreshDatabase;

    /**
     * Listar la información
     * @test
     */
    public function index()
    {
      $this->withExceptionHandling();

      factory(TipoDocumento::class)->create();

      $user = factory(\App\User::class)->create();
      $response = $this->actingAs($user)->get('admin/tipos-documento');
      //$response->assertViewIs('admin.tipo_documento.index');
      $response->assertSee('Tipo de documentos');
    }
  /**
   * Mostrar formulario de creación
   * @test
   */
  public function create()
  {
    $user = factory(\App\User::class)->create();
    $response = $this->actingAs($user)->get('admin/tipos-documento/crear')
      ->assertSee('Crear tipos de documento');

  }
  /**
   * guardar en DB
   * @test
   */
  public function store()
  {
    $this->withExceptionHandling();

    $user = factory(\App\User::class)->create();
    $response = $this->actingAs($user)->post('admin/tipos-documento/crear',[
      'tipo_documento' => 'Registro civil'
    ]);
    //->assertJsonCount(1, TipoDocumento::all());
  }
  /**
   * Mostrar el formulario con la infrmación cargada
   * @test
   */
  public function edit()
  {
    $this->withExceptionHandling();

    $user = factory(\App\User::class)->create();

    $tipo = factory(TipoDocumento::class)->create();
    $response = $this->actingAs($user)->get('admin/tipos-documento/editar/'.$tipo->id);
    $response->assertSee('Editar usuario');




  }
  /**
   * Actualizar la información
   * @test
   */
  public function update()
  {
    $this->withExceptionHandling();

    $user = factory(\App\User::class)->create();

    $tipo = factory(TipoDocumento::class)->create();

    $response = $this->actingAs($user)->post('/admin/tipos-documento/editar/'.$tipo->id, [
      'tipo_documento' => 'C.C'
    ]);
    $tipo = TipoDocumento::first();

    //$response->assertEquals('C.C', $tipo->tipo_documento);
  }
  /**
   * Eliminar registros de base de datos
   * @test
   */
  public function destroy()
  {
    $user = factory(\App\User::class)->create();
    $tipo = factory(TipoDocumento::class)->create();
    $response = $this->actingAs($user)->post('admin/tipos-documento/eliminar/'.$tipo->id);
    $response->assertJson(['response' => true]);

    //$response->assertStatus(200);
  }
}
