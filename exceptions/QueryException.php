<?php

namespace proyecto\entities;

use Exception;
    class QueryException extends Exception{
        public function __construct($mensaje)
        {
            parent::__construct($mensaje);
        }
    }

?>