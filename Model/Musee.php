<?php

class Musee {
    private ?int $id;
    private ?string $nom;
    private ?string $adresse;
    private ?string $region;
    private ?string $jours_fermeture;
    private ?string $description;
    private ?DateTime $date_creation;

    // Constructor
    public function __construct(
        ?int $id,
        ?string $nom,
        ?string $adresse,
        ?string $region,
        ?string $jours_fermeture,
        ?string $description,
        ?DateTime $date_creation
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->region = $region;
        $this->jours_fermeture = $jours_fermeture;
        $this->description = $description;
        $this->date_creation = $date_creation;
    }

    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(?string $nom): void {
        $this->nom = $nom;
    }

    public function getAdresse(): ?string {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): void {
        $this->adresse = $adresse;
    }

    public function getRegion(): ?string {
        return $this->region;
    }

    public function setRegion(?string $region): void {
        $this->region = $region;
    }

    public function getJoursFermeture(): ?string {
        return $this->jours_fermeture;
    }

    public function setJoursFermeture(?string $jours_fermeture): void {
        $this->jours_fermeture = $jours_fermeture;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    public function getDateCreation(): ?DateTime {
        return $this->date_creation;
    }

    public function setDateCreation(?DateTime $date_creation): void {
        $this->date_creation = $date_creation;
    }
}

?>
