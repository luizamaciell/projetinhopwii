<?php

   namespace Source\Models;

   class address {

    private $street;
    private $number;
    private $complement;

    public function __construct($street = null, $number = null, $complement = null){
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;

   }

   public function setStreet($street) {
    $this->street = $street;
}

public function getStreet($street) {
   return $this->street; 
}

public function setNumber($number) {
    $this->number = $number;
}

public function getNumber($number) {
   return $this->number;
}

public function setComplement($complement) {
    $this->complement = $complement;
}

public function getComplement($complement) {
   return $this->complement; 
}

   }

