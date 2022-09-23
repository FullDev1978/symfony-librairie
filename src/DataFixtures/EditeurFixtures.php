<?php

namespace App\DataFixtures;

use App\Entity\Editeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EditeurFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
    public const DARGAUD = "dargaud";
    public const CASTERMAN = "casterman";


// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $editeur = new Editeur();
        $editeur->setNom ("Dargaud");
        $manager->persist($editeur);
        $this->addReference(self::DARGAUD, $editeur);

        $editeur = new Editeur();
        $editeur->setNom ("Casterman");
        $manager->persist($editeur);
        $this->addReference(self::CASTERMAN, $editeur);

        $editeur = new Editeur();
        $editeur->setNom ("Vents d'Ouest");
        $manager->persist($editeur);


        $editeur = new Editeur();
        $editeur->setNom ("Ombres Noires");
        $manager->persist($editeur);

        $editeur = new Editeur();
        $editeur->setNom ("Seuil");
        $manager->persist($editeur);

        $editeur = new Editeur();
        $editeur->setNom ("Actes Sud");
        $manager->persist($editeur);

        $editeur = new Editeur();
        $editeur->setNom ("Flammarion");
        $manager->persist($editeur);

        $manager->flush();
    }
}
