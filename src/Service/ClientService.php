<?php

namespace App\Service;

use App\Entity\Client;
use App\Repository\ClientRepository;

class ClientService
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function getClientById(int $id): ?Client
    {
        return $this->clientRepository->find($id);
    }

    public function getClients(): array
    {
        return $this->clientRepository->findAll();
    }
}
