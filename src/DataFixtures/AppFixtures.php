<?php

namespace App\DataFixtures;


use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
       
        UserFactory::new([
            
            'email' => 'cam2lellis@gmail.com',
            'password' => 'H4$$pw1'
            ])
            ->promoteRole('ROLE_ADMIN')
            ->create();
           
            $manager->flush();
        
    }
}
