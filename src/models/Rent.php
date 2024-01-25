<?php

class Rent
{
    private $rentDate;
    private $returnDate;
    private $rentedBikes;
    private $user_id;

    public function __construct(String $rentDate, String $returnDate, array $rentedBikes, string $user_id)
    {
        $this->rentDate = $rentDate;
        $this->returnDate = $returnDate;
        $this->rentedBikes = $rentedBikes;
        $this->user_id = $user_id;
    }

    public function getRentDate(): String
    {
        return $this->rentDate;
    }

    public function getReturnDate(): String
    {
        return $this->returnDate;
    }

    public function getRentedBikes(): array
    {
        return $this->rentedBikes;
    }

    public function getRentedBikesAsString() {
        $bikeStrings = array_map(function($bike) {
            return trim($bike, '{}');
        }, $this->rentedBikes);

        return implode(', ', $bikeStrings);
    }

    public function getUserId(): String
    {
        return $this->user_id;
    }
}