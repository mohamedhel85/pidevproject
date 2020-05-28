<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadCategoryFixtures  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @inheritDoc
     */
//    php bin/console doctrine:fixtures:load
    public function load(ObjectManager $manager)
    {
        $category = (new Category())
            ->setName('Exterior')
        ;


        $manager->persist($category);
        $this->addReference('category.exterior', $category); // define a reference point for our category

        $category = (new Category())
            ->setName('Interior')
        ;


        $manager->persist($category);
        $this->addReference('category.interior', $category); // define a reference point for our category

        $manager->flush();
    }
    // then we need to create the category entity after creating the entity we need to use this following command
    // php bin/console doctrine:migration:diff to create a version of the database for backup
    //php bin/console doctrine:migration:migrate to add the image object to the database.
    /**
     * @inheritDoc
     */
    public function getOrder() //define the order of leading of the fixtures
    {
        return 100;
    }
}