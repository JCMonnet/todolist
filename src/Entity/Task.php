<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass:TaskRepository::class)]
class Task
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type:'integer')]
private $id;

#[ORM\Column(type:'string', length:255)]
private $name;

#[ORM\Column(type:'string', length:255)]
private $description;

#[ORM\Column(type:'datetime_immutable')]
private $date;

#[ORM\Column(type:'string', length:255)]
private $category;

#[ORM\ManyToOne(targetEntity:User::class, inversedBy:'tasks')]
#[ORM\JoinColumn(nullable:false)]
private $user;
// on récupère le user connecté qui est lié à la nouvelle tâche en cours de création
public function __construct($user)
    {
    $this->user = $user;
}
function getId(): ?int
    {
    return $this->id;
}

function getName(): ?string
    {
    return $this->name;
}

function setName(string $name): self
    {
    $this->name = $name;

    return $this;
}

function getDescription(): ?string
    {
    return $this->description;
}

function setDescription(string $description): self
    {
    $this->description = $description;

    return $this;
}

function getDate(): ?\DateTimeImmutable
{
    return $this->date;
}

function setDate(\DateTimeImmutable$date): self
    {
    $this->date = $date;

    return $this;
}

function getCategory(): ?string
    {
    return $this->category;
}

function setCategory(string $category): self
    {
    $this->category = $category;

    return $this;
}

function getUser(): ?User
    {
    return $this->user;
}

function setUser(?User $user): self
    {
    $this->user = $user;

    return $this;
}
}
