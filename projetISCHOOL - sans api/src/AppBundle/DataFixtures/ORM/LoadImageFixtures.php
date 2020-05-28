<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class LoadImageFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @inheritDoc
     * @noinspection PhpParamsInspection
     */
//    php bin/console doctrine:fixtures:load
    public function load(ObjectManager $manager)
    {
        $image = (new image())
            ->setFilename('exterior-323835.jpg')
            ->setSlug('exterior-323835')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.exterior'))
        ;

        $manager->persist($image);


        $image = (new image())
            ->setFilename('exterior-9o4gaTN-summer-wallpaper-1920x1080.jpg')
            ->setSlug('exterior-9o4gaTN-summer-wallpaper-1920x1080')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.exterior'))
        ;

        $manager->persist($image);


        $image = (new image())
            ->setFilename('exterior-323863.jpg')
            ->setSlug('exterior-323863')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.exterior'))
        ;

        $manager->persist($image);

        $image = (new image())
            ->setFilename('exterior-323893.jpg')
            ->setSlug('exterior-323893')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.exterior'))
        ;

        $manager->persist($image);


        $image = (new image())
            ->setFilename('interior-42555.jpg')
            ->setSlug('interior-42555')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.interior'))
        ;

        $manager->persist($image);


        $image = (new image())
            ->setFilename('interior-42557.jpg')
            ->setSlug('interior-42557')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.interior'))
        ;

        $manager->persist($image);

        $image = (new image())
            ->setFilename('interior-42561.jpg')
            ->setSlug('interior-42561')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.interior'))
        ;

        $manager->persist($image);

        $image = (new image())
            ->setFilename('interior-42563.jpg')
            ->setSlug('interior-42563')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory($this->getReference('category.interior'))
        ;

        $manager->persist($image);



        $manager->flush();
    }
    // then we need to create the category entity after creating the entity we need to use this following command
    // php bin/console doctrine:migration:diff to create a version of the database for backup
    //php bin/console doctrine:migration:migr to add the image object to the database.
    /**
     * @inheritDoc
     */
    public function getOrder() //define the order of leading of the fixtures
    {
        return 200;
    }
}