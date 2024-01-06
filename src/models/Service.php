<?php

class Service
{
    private $description;
    private $image;

    public function __construct($description, $image)
    {
        $this->description = $description;
        $this->image = $image;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }
}