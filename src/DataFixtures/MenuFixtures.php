<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data){
            $article = $this->getReference($data[3]);
            $objet = (new Menu())
                        ->setName($data[0])
                        ->setPrice($data[1])
                        ->setPhoto($data[2])
                        ->addArticle($article)
                ;
            $manager->persist($objet);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return[
//            ['Menu Burger Enfant','13$','MenuEnfant.png','Coca'],
            ['Menu Double Cheese','15$','double-cheese-menu.webp','Fanta'],
            ['Menu Double Cheese','15$','Menu1.jpeg','Fanta'],
            ['Menu Double Cheese','15$','Menu2.jpeg','Fanta'],

        ];
    }

    public function getDependencies()
    {
        return[
            ArticleFixtures::class,
        ];
    }
}
