<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\User;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new Admin();
        $admin->setEmail('cam2lellis@gmail.com');

        $password = $this->hasher->hashPassword($admin, 'H4$$pw1');
        $admin->setPassword($password);

        $manager->persist($admin);

      
        UserFactory::createOne([
            'email' => 'cam2lellis@gmail.com',
            'plainPassword' => 'H4$$pw1'
            ])
            ->getPassword();
            $manager->flush();
    }
}
