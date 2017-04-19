<?php
    include_once "singleton.php";

    singleton::setConfig('mysql:host=localhost;dbname=bde;charset=utf8','bde','cesi');
    
    
    
    
    interface model
    {
        public static function findAll();
        public static function findOne($id);
        public function save();
        public function remove();
    }

?>