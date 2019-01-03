<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 30/12/2018
 * Time: 15:07
 */
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email", message="This email address is already in use")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id;
     * @ORM\Column(name="Id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    protected $email;


    /**
     * @var string
     * @ORM\Column(name="name", type="text", length=40)
     */
    protected $name;


    /**
     * @Assert\Length(max=4096)
     */
    protected $plainPassword;


    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=64)
     */
    protected $password;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description2;



    public function eraseCredentials()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    public function getSalt()
    {
        return null;
    }


    public function __toString()
    {
        return $this->getEmail().", ".$this->getName();
    }

    public function getDescription2()
    {
        return $this->description2;
    }

    public function setDescription2($description2)
    {
        $this->description2 = $description2;

    }
}
