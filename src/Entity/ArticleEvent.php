<?php

namespace App\Entity;

use App\Repository\ArticleEventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleEventRepository::class)
 */
class ArticleEvent
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
    private $titleEvent;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageEvent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAdEvent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleEvent(): ?string
    {
        return $this->titleEvent;
    }

    public function setTitleEvent(string $titleEvent): self
    {
        $this->titleEvent = $titleEvent;

        return $this;
    }

    public function getDescriptionEvent(): ?string
    {
        return $this->descriptionEvent;
    }

    public function setDescriptionEvent(string $descriptionEvent): self
    {
        $this->descriptionEvent = $descriptionEvent;

        return $this;
    }

    public function getImageEvent(): ?string
    {
        return $this->imageEvent;
    }

    public function setImageEvent(string $imageEvent): self
    {
        $this->imageEvent = $imageEvent;

        return $this;
    }

    public function getCreatedAdEvent(): ?\DateTimeInterface
    {
        return $this->createdAdEvent;
    }

    public function setCreatedAdEvent(\DateTimeInterface $createdAdEvent): self
    {
        $this->createdAdEvent = $createdAdEvent;

        return $this;
    }
}
