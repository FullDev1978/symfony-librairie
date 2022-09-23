<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class AuteurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $auteur = new Auteur();
        $auteur->setNom('Roba');
        $auteur->setPrenom('Jean');
        $auteur->addLivre($this->getReference(LivreFixtures::ROYAL_TAQUIN));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setNom('Cazenove');
        $auteur->setPrenom('Christophe');
        $auteur->addLivre($this->getReference(LivreFixtures::ROYAL_TAQUIN));
        $manager->persist($auteur);
        
        $auteur = new Auteur();
        $auteur->setNom('Bastide');
        $auteur->setPrenom('Jean');
        $auteur->addLivre($this->getReference(LivreFixtures::ROYAL_TAQUIN));
        $manager->persist($auteur);


        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            LivreFixtures::class,
        ];
    }
}
