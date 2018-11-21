<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity
 * @ORM\Table(name="block_ter_translations")
 */
class BlockTerTranslation
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="content2", type="text")
     */
    private $content2;

    /**
     * @var string
     *
     * @ORM\Column(name="content3", type="text")
     */
    private $content3;

    /**
     * @var string
     *
     * @ORM\Column(name="content4", type="text")
     */
    private $content4;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
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
     * Set content2.
     *
     * @param string $content2
     *
     * @return BlockTerTranslation
     */
    public function setContent2($content2)
    {
        $this->content2 = $content2;

        return $this;
    }

    /**
     * Get content2.
     *
     * @return string
     */
    public function getContent2()
    {
        return $this->content2;
    }

    /**
     * Set content3.
     *
     * @param string $content3
     *
     * @return BlockTerTranslation
     */
    public function setContent3($content3)
    {
        $this->content3 = $content3;

        return $this;
    }

    /**
     * Get content3.
     *
     * @return string
     */
    public function getContent3()
    {
        return $this->content3;
    }

    /**
     * Set content4.
     *
     * @param string $content4
     *
     * @return BlockTerTranslation
     */
    public function setContent4($content4)
    {
        $this->content4 = $content4;

        return $this;
    }

    /**
     * Get content4.
     *
     * @return string
     */
    public function getContent4()
    {
        return $this->content4;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return BlockTerTranslation
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
     * @return BlockTerTranslation
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
