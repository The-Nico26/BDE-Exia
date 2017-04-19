<?php
    include_once 'serveur.php';
    include_once 'item.php';

    class membre extends item
    {
        public $server = server::getInstance;
        public $table = null;

        function __construct($t)
        {
            self::$table = $t;
        }

        function find()
        {
        }

        function delete()
        {
        }

        function update()
        {
        }
    }