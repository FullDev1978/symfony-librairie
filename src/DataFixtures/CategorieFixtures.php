<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{   

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

    public const BD = "bande dessinnée";
    public const POLAR = "polar";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom("Bande dessinée");
        $categorie->setSlug("bande-dessinee");
        $manager->persist($categorie);
        $this->addReference(self::BD, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Roman policier");
        $categorie->setSlug("roman-policier");
        $manager->persist($categorie);
        $this->addReference(self::POLAR, $categorie);

        $manager->flush();
    }
}
