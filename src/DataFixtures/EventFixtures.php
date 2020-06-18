<?php

namespace App\DataFixtures;

use App\Entity\ArticleEvent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($ae =1; $ae <=10; $ae++){
            $articleEvent = new ArticleEvent();
            $articleEvent->setTitleEvent ("le titre de l'événement $ae");
            $articleEvent->setDescriptionEvent ("une descritpion de l'événement $ae");
            $articleEvent->setImageEvent ("http://placehold.it/350x150");
            $articleEvent->setCreatedAdEvent (new \DateTime());
         
            $manager->persist($articleEvent);
        }

        $manager->flush();
    }
}
