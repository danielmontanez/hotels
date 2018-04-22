<?php

class Hotel {

    private $id;
    private $name;
    private $desc;
    private $image;

    public function __construct($id, $name, $desc, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->image = $image;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDesc($desc) {
        $this->email = $desc;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getImage() {
        return $this->image;
    }
    
}