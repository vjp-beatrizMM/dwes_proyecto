<?php

    Class FileException extends Exception {

        /**
         * @param $mensaje recibe el mensaje de error
         */
        public function __construct(string $mensaje)
        {
            parent::__construct($mensaje);
        }

    }

?>