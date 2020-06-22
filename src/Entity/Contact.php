<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Contact
{


    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $nom;

    /**
      * @var string
     * @Assert\NotBlank()
     */
    private $prenom;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var string
     * @Assert\Regex(
     *      pattern="/[0-9]{10}/") 
     */
    private $telephone;

    /**
    * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $commentaire;

    


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
