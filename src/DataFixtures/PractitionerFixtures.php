<?php

namespace App\DataFixtures;

use App\Entity\Practitioner;
use App\Trait\UserServiceTrait;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

class PractitionerFixtures extends Fixture
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
                'Practitioner_' . $i,
                'Practitioner_' . $i,
                'practitioner' . $i . '@gmail.com',
                '0606060606' . $i,
                'password123',
                ['ROLE_PRACTITIONER'],
                Practitioner::class
            );
            $manager->persist($client);
        }
        $manager->flush();
    }
}
