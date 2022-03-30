<?php

namespace App\DataFixtures;

use App\Entity\Admin;
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

        $manager->flush();

    }
}
