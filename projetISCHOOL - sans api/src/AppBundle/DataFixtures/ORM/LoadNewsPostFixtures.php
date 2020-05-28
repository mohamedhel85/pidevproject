<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\NewsPost;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadNewsPostFixtures  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @inheritDoc
     */
//    php bin/console doctrine:fixtures:load
    public function load(ObjectManager $manager)
    {
        $post = (new NewsPost())
            ->setTitle('post1')
            ->setUpdatedAt(new \DateTime('24-02-2020'))
            ->setCreatedAt((new \DateTime('25-02-2020')))
            ->setCarouselDesc('post1 desc')
            ->setContentdesc('qlsdkjqlsdjieldjiql')
            ->setImage('interior-42555.jpg')
        ;
        $manager->persist($post);


        $post = (new NewsPost())
            ->setTitle('post2')
            ->setUpdatedAt(new \DateTime('24-02-2020'))
            ->setCreatedAt((new \DateTime('25-02-2020')))
            ->setCarouselDesc('post2 desc')
            ->setContentdesc('qlsdkjqlsdjieldjiql')
            ->setImage('interior-42555.jpg')
        ;
        $manager->persist($post);

        $post = (new NewsPost())
            ->setTitle('post3')
            ->setUpdatedAt(new \DateTime('24-02-2020'))
            ->setCreatedAt((new \DateTime('25-02-2020')))
            ->setCarouselDesc('post3 desc')
            ->setContentdesc('qlsdkjqlsdjieldjiql')
            ->setImage('interior-42555.jpg')
        ;
        $manager->persist($post);

        $post = (new NewsPost())
            ->setTitle('post4')
            ->setUpdatedAt(new \DateTime('24-02-2020'))
            ->setCreatedAt((new \DateTime('25-02-2020')))
            ->setCarouselDesc('post4 desc')
            ->setContentdesc('qlsdkjqlsdjieldjiql')
            ->setImage('interior-42555.jpg')
        ;
        $manager->persist($post);

        $post = (new NewsPost())
            ->setTitle('post5')
            ->setUpdatedAt(new \DateTime('24-02-2020'))
            ->setCreatedAt((new \DateTime('25-02-2020')))
            ->setCarouselDesc('post5 desc')
            ->setContentdesc('qlsdkjqlsdjieldjiql')
            ->setImage('interior-42555.jpg')
        ;
        $manager->persist($post);



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
        return 300;
    }
}