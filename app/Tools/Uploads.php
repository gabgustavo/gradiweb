<?php
namespace App\Tools;

/**
 * Autor: Luis Gustavo Avila B.
 * Email: gustavoavilabar@hotmail.com
 * Fecha: 2020-05
 * Nombre del sistemas FManager
 * Mensaje: Tarde o temprano la disciplina vence a la inteligencia
 */

use Image;

class Uploads
{
  private $request;
  private $path;
  private $field;
  private $newName;
  private $tipe;
  private $sizes;
  private $generalPath;

  /**
   * Uploads constructor.
   * @param $request \Illuminate\Http\Request;
   * @param $field relative
   * @param $path
   * @param $newName
   * @param array $sizes
   * @param string $tipe
   */
  public function __construct($request, $field, $path, $newName, $sizes = [], $tipe = 'image')
  {
    $this->request = $request;
    $this->field = $field;
    $this->path = $path;
    $this->newName = $newName;
    $this->tipe = $tipe;
    $this->sizes = $sizes;
    $this->generalPath = public_path('assets/');
  }

  /**
   * @Intervention\Image\Image;
   * @return array|string
   */
  public function uploadImage($prefix = true)
  {
    $files = $this->request->{$this->field};
    $listName = [];

    if(is_array($files)) {
      foreach ($files as $file) {
        $name = $this->newName."_lg_".str_random(7).date('Ymdhis').
          ".".$file->getClientOriginalExtension();

        $listName[] = $name;

        $directory = $this->generalPath.$this->path.'/';
        if (!file_exists($directory) ) {
          mkdir($directory, 0775);
        }
        $imgOriginal = $file->move($directory, $name);
        $pathFile = $imgOriginal->getPathname();

        //$imgProducto = Image::make($file->getRealPath());
        if(count($this->sizes)) {
          foreach ($this->sizes as $size) {
            $imgNueva = Image::make($pathFile);
            $imgNueva->fit($size[0], $size[1])->save($directory .  $size[0].'_'.$size[1].'_'. $name);
          }
        }
      }
    } else {
      $prefix = ($prefix) ? "_lg_".str_random(7).date('Ymdhis') : '';
      $name = $this->newName.$prefix.".".$files->getClientOriginalExtension();

      $listName = $name;

      $directory = $this->generalPath.$this->path.'/';
      if (!file_exists($directory) ) {
        mkdir($directory, 0775);
      }

      $imgOriginal = $files->move($directory, $name);
      $pathFile = $imgOriginal->getPathname();

      if(count($this->sizes)) {
        foreach ($this->sizes as $size) {
          $imgNueva = Image::make($pathFile);
          $imgNueva->fit($size[0], $size[1])->save($directory .  $size[0].'_'.$size[1].'_'. $name);
        }
      }
    }

    return $listName;
  }


  public function uploadFiles()
  {
    $files = $this->request->{$this->field};
    $listName = [];

    if(is_array($files)) {
      foreach ($files as $file) {
        $name = $this->newName."_lg_".str_random(7).date('Ymdhis').
          ".".$file->getClientOriginalExtension();

        $listName[] = $name;

        $directory = $this->generalPath.$this->path.'/';
        if (!file_exists($directory) ) {
          mkdir($directory, 0775);
        }
        $imgOriginal = $file->move($directory, $name);
        $pathFile = $imgOriginal->getPathname();
      }
    } else {
      $name = $this->newName."_lg_".str_random(7).date('Ymdhis').
        ".".$files->getClientOriginalExtension();

      $listName = $name;

      $directory = $this->generalPath.$this->path.'/';
      if (!file_exists($directory) ) {
        mkdir($directory, 0775);
      }

      $imgOriginal = $files->move($directory, $name);
      $pathFile = $imgOriginal->getPathname();
    }

    return $listName;
  }

  public function deleteFiles($data)
  {
    $directory = $this->generalPath.$this->path.'/';

    if (is_array($data) && count($data)) {
      foreach ($data as $d) {
        if (file_exists($directory.$d) && !is_dir($directory.$d)) {
          unlink($directory.$d);
          if($this->tipe == 'image' || $this->tipe == 'images') {
            if(count($this->sizes)) {
              foreach ($this->sizes as $size) {
                unlink($directory . $size[0].'_'.$size[1].'_'. $d);
              }
            }
          }
        }
      }
      return true;
    } else {
      if ($data && file_exists($directory.$data) && !is_dir($directory.$data)) {
        unlink($directory.$data);
        if($this->tipe == 'image' || $this->tipe == 'images') {
          if(count($this->sizes)) {
            foreach ($this->sizes as $size) {
              unlink($directory . $size[0].'_'.$size[1].'_'. $data);
            }
          }
        }
        return true;
      }
    }
    return false;
  }

}