<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleBis;
use AppBundle\Entity\ArticleTer;
use AppBundle\Entity\Block;
use AppBundle\Entity\BlockBis;
use AppBundle\Entity\BlockTer;
use AppBundle\Entity\Dog;
use AppBundle\Entity\Kitten;
use AppBundle\Entity\Page;
use AppBundle\Entity\PageBis;
use AppBundle\Entity\PageTer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", name="homepage", defaults={"_locale"="en"}, requirements={
     *     "_locale"="en|fr|it|es|de"
     * })
     *
     * @param mixed $_locale
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $_locale)
    {
        $em = $this->getDoctrine()->getManager();

        $classes = [
            'articles' => Article::class,
            'articlesBis' => ArticleBis::class,
            'articlesTer' => ArticleTer::class,
            'blocks' => Block::class,
            'blocksBis' => BlockBis::class,
            'blocksTer' => BlockTer::class,
            'pages' => Page::class,
            'pagesBis' => PageBis::class,
            'pagesTer' => PageTer::class,
            'kitten' => Kitten::class,
            'dogs' => Dog::class,
        ];

        foreach ($classes as $key => $class) {
            $vars[$key] = $em->getRepository($class)->findAll();
        }

        return $this->render('default/index.html.twig', $vars);
    }
}
