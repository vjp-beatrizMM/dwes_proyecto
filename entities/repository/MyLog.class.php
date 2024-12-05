<?php

    class MyLog{
        public $log;

        public function __construct(string $fileName){
            $this->log = new Monolog\Logger('name');
            $this->log->pushHandler(
                new Monolog\Handler\StreamHandler($fileName, Monolog\Level::Info));
        }
        
    }