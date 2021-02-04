<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Projets;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // Création d’un utilisateur de type “administrateur”
        $admin = new Admin();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
        $admin,
        'adminpassword'
        ));

        $manager->persist($admin);
        $projets = new Projets();
        $projets->setDescription('Ce site à pour but de mettre à l\'honneur les femmes réalisatrice,');
        $projets->setTitre('FéminiVision');
        $projets->setClients('La Péliculle Ensorcelée');
        $manager->persist($projets);

        $image = new Image();
        $image->setName('517c8a373c240ee6d17a9cbac2aa4125.jpg');
        $image->setProjet($projets);
        $manager->persist($image);

        $image = new Image();
        $image->setName('48fac4f0103cb085289cca64b0f5073d.png');
        $image->setProjet($projets);
        $manager->persist($image);

        $image = new Image();
        $image->setName('21759120f013f4177ac0459a709f4bb1.png');
        $image->setProjet($projets);
        $manager->persist($image);
        $manager->flush();
    }
}
