<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel-> setTitre("Album");
        $carousel -> setImageName('');
        $carousel -> setTexte("");
        $manager->persist($carousel);

        $manager->flush();
    }
}
