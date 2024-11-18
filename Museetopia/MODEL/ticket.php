<?php
class ticket {
    private ?int $id;
    private ?string $musee_name;
    private ?string $location;
    private ?DateTime $time;
    private ?DateTime $date;
    private ?string $ticket_type;
    private ?bool $disponible;
    private ?float $price;

    public function __construct($id, $musee_name, $location, DateTime $time, DateTime $date, $ticket_type, $disponible, $price)
    {
        $this->id = $id;
        $this->musee_name = $musee_name;
        $this->location = $location;
        $this->time = $time;
        $this->date = $date;
        $this->ticket_type = $ticket_type;
        $this->disponible = $disponible;
        $this->price = $price;
    }

    public function getid() : ?int
    {
        return $this->id;
    }
    public function setid($id): void
    {
        $this->id = $id;
    }
    public function getmusee_name() : string
    {
        return $this->musee_name;
    }
    public function setmusee_name($musee_name): void
    {
        $this->musee_name = $musee_name;
    }
    public function getlocation() : string
    {
        return $this->location;
    }
    public function setlocation($location): void
    {
        $this->location = $location;
    }   
    public function gettime() : DateTime
    {
        return $this->time;
    }
    public function settime( DateTime $time ): void
    {
        $this->time = $time;
    }
    public function getdate() : ?DateTime
    {
        return $this->date;
    }
    public function setdate( ?DateTime $date ): void
    {
        $this->date = $date;
    }
    public function getticket_type() : string
    {
        return $this->ticket_type;
    }
    public function setticket_type($ticket_type): void
    {
        $this->ticket_type = $ticket_type;
    }
    public function isdisponible() : bool
    {
        return $this->disponible;
    }
    public function setdisponible( bool $disponible ): void
    {
        $this->disponible = $disponible;
    }
    public function getprice() : float
    {
        return $this->price;
    }
    public function setprice($price): void
    {
        $this->price = $price;
    }
}
?>