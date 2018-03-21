<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* @ORM\Table(name="app_users")
* @ORM\Entity(repositoryClass="App\Repository\UserRepository")
*/
class User implements UserInterface, \Serializable
{
/**
* @ORM\Column(type="integer")
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/
private $id;

/**
* @ORM\Column(type="string", length=25, unique=true)
*/
private $username;

/**
* @ORM\Column(type="string", length=64)
*/
private $password;

/**
* @ORM\Column(type="string", length=254, unique=true)
*/
private $email;

/**
* @ORM\Column(name="is_active", type="boolean")
*/
private $isActive;

/**
* @ORM\Column(name="is_admin", type="boolean")
*/
private $isAdmin;

/**
* @return mixed
*/
public function getId()
{
    return $this->id;
}

public function __construct()
{
$this->isActive = true;
// may not be needed, see section on salt below
// $this->salt = md5(uniqid('', true));
}
/**
* @return mixed
*/
public function getisActive()
{
   return $this->isActive;
}

public function getUsername()
{
return $this->username;
}
/**
* @param mixed $username
*/
public function setUsername($username): void
{
   $this->username = $username;
}

public function getSalt()
{
// you *may* need a real salt depending on your encoder
// see section on salt below
return null;
}

public function getPassword()
{
return $this->password;
}
/**
* @param mixed $password
*/
public function setPassword($password): void
{
   $this->password = $password;
}

/**
* @return mixed
*/
public function getEmail()
{
    return $this->email;
}
/**
* @param mixed $email
*/
public function setEmail($email): void
{
    $this->email = $email;
}

public function getRoles()
{
    if($this->isAdmin === true){
        return array('ROLE_ADMIN');
    }else{
        return array('ROLE_USER');
    }
}

/**
* @return mixed
*/
 public function getisAdmin()
{
   return $this->isAdmin;
}
/**
* @param mixed $isAdmin
*/
public function setIsAdmin(bool $isAdmin): void
{
   $this->isAdmin = $isAdmin;
}

public function eraseCredentials()
{
}

/** @see \Serializable::serialize() */
public function serialize()
{
return serialize(array(
$this->id,
$this->username,
$this->password,
// see section on salt below
// $this->salt,
));
}

/** @see \Serializable::unserialize() */
public function unserialize($serialized)
{
list (
$this->id,
$this->username,
$this->password,
// see section on salt below
// $this->salt
) = unserialize($serialized);
}
}