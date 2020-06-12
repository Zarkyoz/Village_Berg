<?php

namespace App\Entity;

use App\Repository\ArticleActuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleActuRepository::class)
 */
class ArticleActu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleActu;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionActu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageActu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAdActu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleActu(): ?string
    {
        return $this->titleActu;
    }

    public function setTitleActu(string $titleActu): self
    {
        $this->titleActu = $titleActu;

        return $this;
    }

    public function getDescriptionActu(): ?string
    {
        return $this->descriptionActu;
    }

    public function setDescriptionActu(string $descriptionActu): self
    {
        $this->descriptionActu = $descriptionActu;

        return $this;
    }

    public function getImageActu(): ?string
    {
        return $this->imageActu;
    }

    public function setImageActu(string $imageActu): self
    {
        $this->imageActu = $imageActu;

        return $this;
    }

    public function getCreatedAdActu(): ?\DateTimeInterface
    {
        return $this->createdAdActu;
    }

    public function setCreatedAdActu(\DateTimeInterface $createdAdActu): self
    {
        $this->createdAdActu = $createdAdActu;

        return $this;
    }
}
