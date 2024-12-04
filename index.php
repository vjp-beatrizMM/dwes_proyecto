<?php

require_once 'utils/bootstrap.php';

//$router= new Router();

//$routes= require 'utils/routes.php';
//$uri=trim($_SERVER['REQUEST_URI'],'/'); quitado y ponemos lo de dentro de routes[]


try {
    require App::get('router')->direct(Request::uri(), $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    die($e->getMessage());
}
