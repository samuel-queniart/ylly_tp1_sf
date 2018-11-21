<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Article.
 *
 * @ORM\Table(name="article_bis")
 * @ORM\Entity()
 */
class ArticleBis
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
    private $authorBis;

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
    public function getAuthorBis()
    {
        return $this->authorBis;
    }

    /**
     * @param string $author
     * @param mixed  $authorBis
     *
     * @return ArticleBis
     */
    public function setAuthorBis($authorBis)
    {
        $this->authorBis = $authorBis;

        return $this;
    }
}
