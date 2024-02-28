<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;


define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("PAGEVOIR", "show");

define("DEFAULTPASSOWRD", "password");



function userFullName(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;


}

if (!function_exists('getImage')) {
    function getImage($post, $thumb = false)
    {   
        $url = "storage/photos/{$post->user->id}";
        if($thumb) $url .= '/thumbs';
        return asset("{$url}/{$post->image}");
    }
}

if (!function_exists('currentRoute')) {
  function currentRoute($route)
  {
      return Route::currentRouteNamed($route) ? ' class=current' : '';
  }
}

if (!function_exists('formatDate')) {
  function formatDate($date)
  {
      return ucfirst(utf8_encode ($date->formatLocalized('%d %B %Y')));
  }
}

if (!function_exists('formatHour')) {
  function formatHour($date)
  {
      return ucfirst(utf8_encode ($date->formatLocalized('%Hh%M')));
  }
}

if (!function_exists('currentRouteActive')) {
  function currentRouteActive(...$routes)
  {
      foreach ($routes as $route) {
          if(Route::currentRouteNamed($route)) return 'active';
      }
  }
}

if (!function_exists('currentChildActive')) {
  function currentChildActive($children)
  {
      foreach ($children as $child) {
          if(Route::currentRouteNamed($child['route'])) return 'active';
      }
  }
}

if (!function_exists('menuOpen')) {
  function menuOpen($children)
  {
      foreach ($children as $child) {
          if(Route::currentRouteNamed($child['route'])) return 'menu-open';
      }
  }
}

if (!function_exists('isRole')) {
  function isRole($role)
  {
      return auth()->user()->role === $role;
  }
}

if (!function_exists('getUrlSegment')) {
  function getUrlSegment($url, $segment)
  {   
      $url_path = parse_url(request()->url(), PHP_URL_PATH);
      $url_segments = explode('/', $url_path);
      return $url_segments[$segment];
  }
}
