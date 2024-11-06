<?php

namespace App\Controller;

use App\Service\ClientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    private ClientService $userService;

    public function __construct(ClientService $userService) {
        $this->userService = $userService;
    }

    #[Route('/clients', name: 'get_clients', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $clients = $this->userService->getClients();
        return $this->json($clients);
    }
}
