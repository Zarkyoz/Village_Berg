<?php

namespace App\DataFixtures;

use App\Entity\ArticleActu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($aa =1; $aa <=10; $aa++){
            $articleActu = new ArticleActu();
            $articleActu->setTitleActu ("le titre de l'actualité $aa");
            $articleActu->setDescriptionActu ("une descritpion de l'actualité $aa");
            $articleActu->setImageActu ("http://placehold.it/350x150");
            $articleActu->setcreatedAdActu (new \DateTime());
         
            $manager->persist($articleActu);
        }

        $manager->flush();
    }
}
