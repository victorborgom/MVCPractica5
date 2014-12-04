<?php

    class ModelUn {
        /**
         *
         * @var type 
         */
        private $_propietat=array();
        
        public function __construct($array) {
            foreach ($array as  $value) {
                $this->_propietat=$value;
                
            }
        
       }
        public function getPropietat(){
            return $this->_propietat;
        }
    }
    class ModelDos {
        /**
         *
         * @var type 
         */
        private $_propietat=array();
        
        public function __construct($array) {
            foreach ($array as $key => $value) {
                $this->_propietat=$value;
                
            }
       }
       public function getPropietat(){
            return $this->_propietat;
        }
        
    }
    
        class ModelTres {
        /**
         *
         * @var type 
         */
        private $_propietat=array();
        
        public function __construct($array) {
            foreach ($array as  $value) {
                $this->_propietat=$value;
                
            }
        
       }
        public function getPropietat(){
            return $this->_propietat;
        }
    }