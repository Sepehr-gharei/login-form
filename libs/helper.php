<?php
function site_url($uri){
    return  BASE_URL . $uri;
}
function dd($var){
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
}

function redirect(string $target = BASE_URL):void
{
    header("location: $target");
    die();
}

function setError(string $msg):void{
    $_SESSION['error'] = $msg;
}