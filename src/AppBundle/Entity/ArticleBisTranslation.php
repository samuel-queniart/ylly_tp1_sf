<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity()
 * @ORM\Table(name="article_bis_translations")
 */
class ArticleBisTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title2", type="string", length=255)
     */
    private $title2;

    /**
     * @var string
     *
     * @ORM\Column(name="title3", type="string", length=255)
     */
    private $title3;

    /**
     * @var string
     *
     * @ORM\Column(name="title4", type="string", length=255)
     */
    private $title4;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return ArticleBisTranslation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return ArticleBisTranslation
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set title2.
     *
     * @param string $title2
     *
     * @return ArticleBisTranslation
     */
    public function setTitle2($title2)
    {
        $this->title2 = $title2;

        return $this;
    }

    /**
     * Get title2.
     *
     * @return string
     */
    public function getTitle2()
    {
        return $this->title2;
    }

    /**
     * Set title3.
     *
     * @param string $title3
     *
     * @return ArticleBisTranslation
     */
    public function setTitle3($title3)
    {
        $this->title3 = $title3;

        return $this;
    }

    /**
     * Get title3.
     *
     * @return string
     */
    public function getTitle3()
    {
        return $this->title3;
    }

    /**
     * Set title4.
     *
     * @param string $title4
     *
     * @return ArticleBisTranslation
     */
    public function setTitle4($title4)
    {
        $this->title4 = $title4;

        return $this;
    }

    /**
     * Get title4.
     *
     * @return string
     */
    public function getTitle4()
    {
        return $this->title4;
    }
}
