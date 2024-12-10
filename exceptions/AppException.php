<?php

namespace proyecto\entities;
use Exception;
    class AppException extends Exception{
        public function __construct($message)
        {
            parent::__construct($message);
        }
    }

?>