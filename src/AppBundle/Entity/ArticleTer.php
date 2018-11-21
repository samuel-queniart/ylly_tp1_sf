<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity()
 * @ORM\Table(name="article_ter")
 */
class ArticleTer
{
    use ORMBehaviors\Translatable\Translatable, ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="assistant", type="string", length=255)
     */
    private $assistant;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param string $assistant
     *
     * @return ArticleTer
     */
    public function setAssistant($assistant)
    {
        $this->assistant = $assistant;

        return $this;
    }

    /**
     * @return string
     */
    public function getAssistant()
    {
        return $this->assistant;
    }
}
