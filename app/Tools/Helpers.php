<?php
/**
 * Autor: Luis Gustavo Avila B.
 * Email: gustavoavilabar@gmail.com
 * Fecha: 2020-05
 * Nombre del sistemas: xxx
 */

/**
 * @param null $campo
 * @return null
 * Tener la informacion del sistema con solo pasar un campo o en un obj si no se le pasa
 */
function sistema($campo = null) {
  $sistema = App\Models\Sistema::orderBy('id', 'desc')->first();

  $sistema->logo = asset('assets/'.$sistema->logo);
  $sistema->favicon = asset(''.$sistema->favicon);

  if($campo) {
    if(isset($sistema->{$campo})) {
      return $sistema->{$campo};
    } else {
      return null;
    }
  } else {
    return $sistema;
  }
}


/**
 * @param null $m
 * @return string
 * Se recibe el mes en numero y se retorna en letra
 */
function getMount($m = null)
{
  $m = ($m) ? (string)$m : null;
  switch ($m) {
    case "01":
     return "En";
    break;
    case "02":
     return "Feb";
    break;
    case "03":
     return "Mar";
    break;
    case "04":
     return "Abr";
    break;
    case "05":
     return "May";
    break;
    case "06":
     return "Jun";
    break;
    case "07":
     return "Jul";
    break;
    case "08":
     return "Ag";
    break;
    case "09":
     return "Sept";
    break;
    case "10":
     return "Oct";
    break;
    case "11":
     return "Nov";
    break;
    case "12":
     return "Dic";
    break;
    default:
     return "N/A";
    break;
  }
}

/**
 * @param $email
 * @param int $s
 * @param string $d
 * @param string $r
 * @param bool $img
 * @param array $atts
 * @return string
 * genera el avar de un usuario
 */
function getAvatar( $email, $s = 100, $d = 'wavatar', $r = 'g', $img = false, $atts = array() ) {
  /**
   * Get either a Gravatar URL or complete image tag for a specified email address.
   *
   * @param string $email The email address
   * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
   * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
   * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
   * @param boole $img True to return a complete IMG tag False for just the URL
   * @param array $atts Optional, additional key/value attributes to include in the IMG tag
   * @return String containing either just a URL or a complete image tag
   * @source https://gravatar.com/site/implement/images/php/
   */
  $url = 'https://www.gravatar.com/avatar/';
  $url .= md5( strtolower( trim( $email ) ) );
  $url .= "?s=$s&d=$d&r=$r";
  if ( $img ) {
    $url = '<img src="' . $url . '"';
    foreach ( $atts as $key => $val )
      $url .= ' ' . $key . '="' . $val . '"';
    $url .= ' />';
  }
  return $url;
}


/**
 * @param array $data
 * @return bool
 * elimina un archivo / array de archivos
 */
function fileDelete($data = []) {
  if (is_array($data) && count($data)) {
    foreach ($data as $d) {
      if (file_exists($d) && !is_dir($d)) {
        unlink($d);
      }
    }
    return true;
  } else {
    if ($data && file_exists($data) && !is_dir($data)) {
      unlink($data);
      return true;
    }
  }
  return false;
}

function settingEmail($campo = null) {
  $email = App\Models\EmailSetting::setting();
  if($email && $campo) {
    if(isset($email->{$campo})) {
      return trim($email->{$campo});
    } else {
      return null;
    }
  } else {
    return $email;
  }
}

function limit($str, $limit = 50, $append = ' ...') {
  return Str::limit($str, $limit, $append);
}

function deleteDirectory($dir)
{
  if (!$dh = @opendir($dir)) return;
  while (false !== ($current = readdir($dh))) {
    if ($current != '.' && $current != '..') {
      if (!@unlink($dir . '/' . $current))
        deleteDirectory($dir . '/' . $current);
    }
  }
  closedir($dh);
  @rmdir($dir);
}


function miAvatar($user)
{
  //$user = \Auth()->user();
  if($user->foto) {
    return asset('assets/users/500_500_'.$user->foto);
  } else {
    return getAvatar($user->email);
  }
}

function openMenu($path)
{
  if(is_array($path)) {
    foreach ($path as $p) {
      $validacion = \Illuminate\Support\Str::startsWith(request()->route()->getName(), $p);
      if($validacion) {
        return ' menu-open ';
        break;
      }
    }
  } else {
    $validacion = \Illuminate\Support\Str::startsWith(request()->route()->getName(), $path);
    if($validacion) {
      return ' menu-open ';
    } else return '';
  }

}
function activeSubMenu($path)
{
  if(is_array($path)) {
    foreach ($path as $p) {
      $validacion = \Illuminate\Support\Str::startsWith(request()->route()->getName(), $p);
      if($validacion) {
        return ' active ';
      }
    }

  } else {
    $validacion = \Illuminate\Support\Str::startsWith(request()->route()->getName(), $path);
    if($validacion) {
      return ' active ';
    } else return '';
  }

}


/**
 * @param $array
 * @param $eliminar
 * @return mixed
 * Elimina una posicion de un array
 */
function deleteItemArrat($array, $eliminar)
{
  $deleted = false;
  foreach ($array as $k => $item) {
    if($item == $eliminar) {
      $deleted = true;
      unset($array[$item]);
      break;
    }
    if(!$deleted) {
      if($k == $eliminar) {
        $deleted = true;
        unset($array[$k]);
        break;
      }
    }
  }
  return $array;
}

function selecMarca() {

}
