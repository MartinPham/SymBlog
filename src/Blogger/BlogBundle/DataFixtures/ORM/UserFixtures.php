<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use  Blogger\BlogBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('admin');
        $user1->setEmail('admin@symblog.dev');

        $encoder = $this->container->get('security.password_encoder');

        $user1->setPassword($encoder->encodePassword($user1, 'adminpass'));

        $user1->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));

        $manager->persist($user1);


        $user2 = new User();
        $user2->setUsername('user');
        $user2->setEmail('user@symblog.dev');

        $encoder = $this->container->get('security.password_encoder');

        $user2->setPassword($encoder->encodePassword($user2, 'userpass'));

        $user2->setRoles(array('ROLE_USER'));

        $manager->persist($user2);




        $manager->flush();
    }
}