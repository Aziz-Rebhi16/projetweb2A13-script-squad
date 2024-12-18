<?php
class ticket {
    private ?int $id;
    private ?string $musee_name;
    private ?string $location;
    private ?DateTime $date;
    private ?DateTime $time;
    private ?float $price;
    private ?bool $disponible;
    private ?string $category;

    // Constructor
    public function __construct(?int $id, ?string $musee_name, ?string $location, ?DateTime $date, ?DateTime $time, ?float $price, ?bool $disponible, ?string $category) {
        $this->id = $id;
        $this->musee_name = $musee_name;
        $this->location = $location;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;
        $this->disponible = $disponible;
        $this->category = $category;
    }


    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getMusee_name(): ?string {
        return $this->musee_name;
    }

    public function setMusee_name(?string $musee_name): void {
        $this->musee_name = $musee_name;
    }

    public function getLocation():?string {
        return $this->location;
    }

    public function setLocation(?string $location): void {
        $this->location = $location;
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

    public function isDisponible(): bool {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): void {
        $this->disponible = $disponible;
    }

    public function getCategory(): ?string {
        return $this->category;
    }

    public function setCategory(?string $category): void {
        $this->category = $category;
    }
}

?>
