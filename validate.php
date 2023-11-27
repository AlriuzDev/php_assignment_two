<?php
    class validate {
        public function isEmpty($value){
            return empty($value);
        }
        public function isAmountValid($amount){
            return preg_match("/^[1-9]\d*$/", $amount);
        }
        public function isOptionValid($option){
            return ($option != 'Choose...' || empty($option));
        }
    }
?>