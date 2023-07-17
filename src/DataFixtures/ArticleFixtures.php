<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
            foreach ($this->getData() as $data){
                $category = $this->getReference($data[3]);
                $objet =(new Article())
                        ->setName($data[0])
                        ->setPhoto($data[1])
                        ->setPrice($data[2])
                        ->setCategory($category)
                    ;
                $this->addReference($data[0], $objet);
                $manager->persist($objet);
            }


        $manager->flush();
    }

    private function getData():array
    {
        return [
//            ['Frite','frite.jpeg','5$','Boisson'],
//            ['Coca','fanta.jpg','5$','Dessert'],
            ['Fanta','Boisson2.webp','5$','Petite Faim'],
//            ['Sprit','coca.webp','5$','Burger'],
            ['Coca-cola','Boisson1.webp','5$','Burger'],

        ];
    }

    public function getDependencies(): array
    {
        return[
            CategoryFixtures::class,
        ];
    }
}
