<?php

namespace proyecto\entities\repository;

use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;

class MyLog {
    public $log;

    public function __construct(string $fileName) {
        $this->log = new Logger('name');
        $this->log->pushHandler(
            new StreamHandler($fileName, Level::Info)
        );
    }
}
