<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 31/12/2018
 * Time: 00:47
 */

namespace App\Entity;

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
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idComment;

    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     */
    public $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    public $content;



    public function eraseCredentials()
    {
        return null;
    }

    public function getId()
    {
        return $this->idComment;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return $this->getUsername() . ", " . $this->getContent();
    }

}