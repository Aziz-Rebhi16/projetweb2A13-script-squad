<?php

class reservation {
    private ?int $id;
    private ?string $name;
    private ?string $surname;
    private ?string $email;
    private ?string $phone;
    private ?string $musee_name;
    private ?DateTime $date;
    private ?DateTime $time;
    private ?float $price;
    private ?string $category;

    // Constructor
    public function __construct(?int $id,  ?string $name, ?string $surname, ?string $email, ?string $phone, ?string $musee_name, ?DateTime $date, ?DateTime $time, ?float $price, ?string $category) {
        $this->id = $id;
        $this->name=$name;
        $this->surname=$surname;
        $this->email=$email;
        $this->phone=$phone;
        $this->musee_name = $musee_name;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;
        $this->category = $category;
    }


    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getName():?string {
        return $this->name;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function getSurName():?string {
        return $this->surname;
    }

    public function setSurName(?string $surname): void {
        $this->surname = $surname;
    }
    
    public function getEmail():?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getPhone():?string {
        return $this->phone;
    }

    public function setPhone(?string $phone): void {
        $this->phone = $phone;
    }

    public function getMusee_name(): ?string {
        return $this->musee_name;
    }

    public function setMusee_name(?string $musee_name): void {
        $this->musee_name = $musee_name;
    }

    public function getDate(): ?DateTime {
        return $this->date;
    }

    public function setDate(?DateTime $date): void {
        $this->date = $date;
    }

    public function getTime(): ?DateTime {
        return $this->time;
    }

    public function setTime(?DateTime $time): void {
        $this->time = $time;
    }

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getCategory(): ?string {
        return $this->category;
    }

    public function setCategory(?string $category): void {
        $this->category = $category;
    }
}

?>
