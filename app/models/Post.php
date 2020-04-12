<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Core\Model;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post extends Model
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="string") 
     */
    protected $title;

    /** 
     * @ORM\Column(type="text") 
     */
    protected $content;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
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
}
