<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PractitionerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PractitionerRepository::class)]
#[ApiResource]
class Practitioner extends User
{

}
