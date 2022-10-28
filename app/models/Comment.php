<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Core\Model;

/**
 * @ORM\Entity
 * @ORM\Table(name="comments")
 */
class Comment extends Model
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
    protected $content;

    public function getId()
    {
        return $this->id;
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
