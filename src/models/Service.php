<?php

class Service
{
    private $description;
    private $image;
    private $date;
    private $posted_at;

    public function __construct($description, $image, $date, $term)
    {
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
        $this->posted_at = $term;
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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getPostedAt()
    {
        return $this->posted_at;
    }
}

