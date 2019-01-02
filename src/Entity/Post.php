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
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idPost;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=40)
     */
    public $title;

    /**
     * @var string
     * @ORM\Column(name="content",type="string", length=255)
     */
    public $content;


    public function eraseCredentials()
    {
        return null;
    }

    public function getId()
    {
        return $this->idPost;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTile($title)
    {
        $this->title = $title;
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
        return $this->getTitle() . ", " . $this->getContent();
    }

}