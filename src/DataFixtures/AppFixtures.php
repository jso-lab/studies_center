<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\UserFactory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
    // Load Users
    UserFactory::new()
    ->withAttributes([
        'email' => 'cam2lellis@gmail.com',
        'plainPassword' => 'Ha$$pw1',
    ])
    ->promoteRole('ROLE_ADMIN')
    ->create();

    UserFactory::new()
    ->withAttributes([
        'email' => 'john@me.com',
        'plainPassword' => 'azerty',
    ])
    ->promoteRole('ROLE_USER')
    ->create();
   
    UserFactory::new()
    ->withAttributes([
        'email' => 'tisha@symfonycasts.com',
        'plainPassword' => 'tishapass',
        'firstName' => 'Tisha',
        'lastName' => 'The Cat',
        'avatar' => 'tisha.png',
    ])
    ->promoteRole('ROLE_USER')
    ->create();

    $manager->flush();

    }
}
