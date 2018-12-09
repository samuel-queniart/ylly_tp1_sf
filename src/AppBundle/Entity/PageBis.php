<?php

namespace AppBundle\Entity;

use AppBundle\Annotation\NinjaTranslator;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @NinjaTranslator(name="PageBis")
 * @ORM\Entity()
 * @ORM\Table(name="page_bis")
 */
class PageBis
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
