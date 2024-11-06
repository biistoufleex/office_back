<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Trait\UserServiceTrait;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

class ClientFixtures extends Fixture
{
    use UserServiceTrait;

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $client = $this->userService->createUser(
                'Client_' . $i,
                'Client_' . $i,
                'client' . $i . '@gmail.com',
                '0606060606' . $i,
                'password123',
                ['ROLE_CLIENT'],
                Client::class
            );
            $manager->persist($client);
        }
        $manager->flush();
    }

}
