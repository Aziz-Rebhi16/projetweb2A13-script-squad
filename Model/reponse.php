<?php

class reponse {
    private ?int $id_rep;
    private ?int $id_rec;
    private ?DateTime $date_rep;
    private ?string $contenu_rep;

    // Constructor
    public function __construct(?int $id_rec,?int $id_rep,?string $contenu_rep, ?DateTime $date_rep = null) {
        $this->id_rec = $id_rec;
        $this->id_rep = $id_rep;
        $this->contenu_rep = $contenu_rep;
        $this->date_rec = $date_rec;
        
    }

    // Getters and Setters

    public function getIdRep(): ?int {
        return $this->id_rep;
    }

    public function setIdRep(?int $id_rep): void {
        $this->id_rep = $id_rep;
    }

    public function getContenu(): ?string {
        return $this->contenu_rep;
    }

    public function setContenu(?string $contenu_rep): void {
        $this->contenu_rep = $contenu_rep;
    }


    public function getDateRep(): ?DateTime {
        return $this->date_rep;
    }

    public function setDateRep(?DateTime $date_rep): void {
        $this->date_rep = $date_rep;
    }

   
}
?>