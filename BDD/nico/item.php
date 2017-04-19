<?php
require 'server.php';
abstract class item
{
    protected $server = server::getInstance;
    protected $table;

    public function __construct($t){
        self::$table = $t;
    }
    abstract protected function find();
    abstract protected function remove();
    abstract protected function update();
}