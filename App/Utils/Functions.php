<?php
    namespace App\Utils;

    class Functions{
        public static function cleanInput($value){
            return htmlspecialchars(strip_tags((trim($value))));
        }
    }

?>