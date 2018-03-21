<?php
namespace App\Controller\EasyAdmin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends BaseAdminController
{
    private $pass;
    private $user;
    /**
    * @param User $entity
    */
    protected function prePersistEntity($entity)
    {
        $this->user = $entity;
        $this->pass = $entity->getPassword();
        $entity->setPassword($this->encode());
    }

    public function encode(UserPasswordEncoderInterface $encoder)
    {
        return $encoder->encodePassword($this->user, $this->pass);
    }

    /*protected function preUpdateEntity($entity)
    {
        $pass = $entity->getPassword();
        $entity->setPassword($pass.'-pass');
    }*/
}