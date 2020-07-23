<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumoApiController extends Controller
{
  protected $baseUri;
  protected $token;
  public function __construct()
  {
    $this->baseUri = 'http://localhost/gradiweb/public/api/';
    $this->token = $this->getToken();
  }
  public function getToken()
  {
    $curl = curl_init();

    $data = json_encode([
      'usuario' => 'luis',
      'contrasena' => '1234',
    ]);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "cli-get-token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 30,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    curl_close($curl);

    return $response;
  }

  public function getVehiculos()
  {
    $curl = curl_init();

    $data = json_encode([
      'token' => $this->token['token']
    ]);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "vehiculos",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 50,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    curl_close($curl);

    return $response;
  }

  public function getTiposDocumento()
  {

    $curl = curl_init();

    $data = json_encode([
      'token' => $this->token['token']
    ]);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "tipos-documento",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 50,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    curl_close($curl);
    return $response;
  }

  public function getMarcas()
  {
    $curl = curl_init();
    $data = json_encode([
      'token' => $this->token['token']
    ]);
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "marcas",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 50,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    return $response;
  }

  public  function getTiposVehiculos()
  {
    $curl = curl_init();

    $data = json_encode([
      'token' => $this->token['token']
    ]);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "tipo-vehiculos",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 5,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    curl_close($curl);
    return $response;
  }

  public function setClienteVehiculo()
  {
    $curl = curl_init();

    $data = json_encode([
      'token' => $this->token['token'],
      "cliente" => [
        "nombre" => "Gustavo Jimenez",
        "documento" => 9998774555,
        "tipo_documento" => "C.C"
      ],
      "vehiculo" => [
        [
          "placa" => "LGB123",
          "tipo" => "1",
          "marca" => "1"
        ]
      ]
    ]);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->baseUri . "crear-cliente",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 5,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = json_decode(curl_exec($curl), 1);

    curl_close($curl);

    return $response;
  }
}
