<?php

class Reclamation {
    private ?int $id_rec;
    private ?string $nom;
    private ?string $prenom;
    private ?DateTime $date_rec;
    private ?string $sujet;
    private ?string $status;
    private ?string $description;

    // Constructor
    public function __construct(?int $id_rec, ?string $nom, ?string $prenom, ?DateTime $date_rec = null, ?int $sujet, ?string $status, ?string $description) {
        $this->id_rec = $id_rec;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_rec = $date_rec;
        $this->sujet = $sujet;
        $this->status = $status;
        $this->description = $description;
    }

    // Getters and Setters

    public function getIdRec(): ?int {
        return $this->id_rec;
    }

    public function setIdRec(?int $id_rec): void {
        $this->id_rec = $id_rec;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(?string $nom): void {
        $this->nom = $nom;
    }

    public function getPrenom(): ?string {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void {
        $this->prenom = $prenom;
    }

    public function getDateRec(): ?DateTime {
        return $this->date_rec;
    }

    public function setDateRec(?DateTime $date_rec): void {
        $this->date_rec = $date_rec;
    }

    public function getSujet(): ?int {
        return $this->sujet;
    }

    public function setSujet(?int $sujet): void {
        $this->sujet = $sujet;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(?string $status): void {
        $this->status = $status;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): void {
        $this->description = $description;
    }
}
?>
