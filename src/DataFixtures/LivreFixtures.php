<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\DataFixtures\EditeurFixtures;
use App\DataFixtures\CategorieFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LivreFixtures extends Fixture implements DependentFixtureInterface
{
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
    public const ROYAL_TAQUIN ="royal taquin";
// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre -> setTitre("Royal Taquin");
        $livre -> setImageName('boule-bill-tome-42-royal-taquin.jpg');
        $livre -> setDescription('Oyez, Oyez, gentes dames et gentes damoiseaux ! Le seigneur Bill et ses fidèles sujets, Boule et Pouf, vous accueilleront 
        dans leur château fort pour vivre des aventures extraordinaires. En vrai roi taquin, à la maison ou à l\'occasion de visites de châteaux faites en famille,
        Bill fait le plein de farces et règne sur son petit monde, avec la gaité et la facétie qui le caractérisent.');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::ROYAL_TAQUIN, $livre);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            EditeurFixtures::class,
            CategorieFixtures::class,
        ];
    }
}


