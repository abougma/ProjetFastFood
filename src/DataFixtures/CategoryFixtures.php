<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $objet = (new Category())
                ->setName($data[0])
            ;
            $this->addReference($data[0], $objet);
            $manager->persist($objet);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            ['Boisson'],
            ['Dessert'],
            ['Petite Faim'],
            ['Burger'],
        ];
    }
}
