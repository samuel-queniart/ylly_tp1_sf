<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Article.
 *
 * @ORM\Table(name="article_ter")
 * @ORM\Entity()
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
     * @ORM\Column(name="assistante", type="string", length=255)
     */
    private $assistante;

    /**
     * Get id.
     *
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
     * Set assistante.
     *
     * @param string $assistante
     *
     * @return ArticleTer
     */
    public function setAssistante($assistante)
    {
        $this->assistante = $assistante;

        return $this;
    }

    /**
     * Get assistante.
     *
     * @return string
     */
    public function getAssistante()
    {
        return $this->assistante;
    }
}
