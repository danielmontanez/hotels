<?php

class Reservation {

    private $reservation_id;
    private $user_id;
    private $hotel_id;
    private $approved;

    public function __construct($reservation_id, $user_id, $hotel_id) {
        $this->reservation_id = $reservation_id;
        $this->user_id = $user_id;
        $this->hotel_id= $hotel_id;
        $this->approved = $approved;
    }
    
    public function getReservationId() {
        return $this->reservation_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getHotelId() {
        return $this->hotel_id;
    }

    public function isApproved() {
        return $this->approved;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id
    }

    public function setHotelId($hotel_id) {
        $this->hotel_id = $hotel_id;
    }
    
    public function setApproved($approved){
        $this->approved = $approved;
    }
   
}