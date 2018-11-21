<?php

namespace AppBundle\DataFixtures;

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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\Color($faker));

        for ($i = 0; $i < 4; ++$i) {
            $article = new Article();
            $article->setAuthor($faker->name);
            $article->translate('en')->setTitle($faker->realText(50));
            $article->translate('en')->setContent($faker->text(300));
            $manager->persist($article);
            $article->mergeNewTranslations();
        }

        for ($i = 0; $i < 3; ++$i) {
            $article = new ArticleBis();
            $article->setAuthorBis($faker->name);
            $article->translate('en')->setTitle($faker->realText(20));
            $article->translate('en')->setTitle2($faker->realText(30));
            $article->translate('en')->setTitle3($faker->realText(40));
            $article->translate('en')->setTitle4($faker->realText(50));
            $article->translate('en')->setContent($faker->text(200));
            $manager->persist($article);
            $article->mergeNewTranslations();
        }

        for ($i = 0; $i < 2; ++$i) {
            $article = new ArticleTer();
            $article->setAuthor($faker->name);
            $article->setAssistante($faker->name);
            $article->translate('en')->setTitle($faker->realText(20));
            $article->translate('en')->setHeader($faker->text(100));
            $article->translate('en')->setFooter($faker->text(50));
            $article->translate('en')->setContent($faker->text(200));
            $manager->persist($article);
            $article->mergeNewTranslations();
        }

        for ($i = 0; $i < 2; ++$i) {
            $block = new Block();
            $block->translate('en')->setTitle($faker->realText(20));
            $block->translate('en')->setContent($faker->text(200));
            $manager->persist($block);
            $block->mergeNewTranslations();
        }

        for ($i = 0; $i < 4; ++$i) {
            $block = new BlockBis();
            $block->translate('en')->setTitle($faker->realText(25));
            $block->translate('en')->setCustom($faker->realText(50));
            $block->translate('en')->setContent($faker->text(200));
            $manager->persist($block);
            $block->mergeNewTranslations();
        }

        for ($i = 0; $i < 2; ++$i) {
            $block = new BlockTer();
            $block->translate('en')->setTitle($faker->realText(25));
            $block->translate('en')->setContent($faker->realText(100));
            $block->translate('en')->setContent2($faker->text(200));
            $block->translate('en')->setContent3($faker->text(2500));
            $block->translate('en')->setContent4($faker->text(300));
            $manager->persist($block);
            $block->mergeNewTranslations();
        }

        for ($i = 0; $i < 10; ++$i) {
            $dog = new Dog();
            $dog->setName($faker->name);
            $dog->translate('en')->setRace($faker->word);
            $dog->translate('en')->setColor($faker->safeColorName);
            $dog->translate('en')->setDescription($faker->realText(200));
            $manager->persist($dog);
            $dog->mergeNewTranslations();
        }

        for ($i = 0; $i < 20; ++$i) {
            $kitten = new Kitten();
            $kitten->setName($faker->name);
            $kitten->translate('en')->setRace($faker->word);
            $kitten->translate('en')->setDescription($faker->realText(200));
            $manager->persist($kitten);
            $kitten->mergeNewTranslations();
        }

        for ($i = 0; $i < 5; ++$i) {
            $page = new Page();
            $page->translate('en')->setTitle($faker->sentence(4));
            $page->translate('en')->setSubtitle($faker->sentence(5));
            $page->translate('en')->setContent($faker->realText(200));
            $manager->persist($page);
            $page->mergeNewTranslations();
        }

        for ($i = 0; $i < 1; ++$i) {
            $page = new PageBis();
            $page->translate('en')->setTitle($faker->sentence(4));
            $page->translate('en')->setSubtitle($faker->sentence(5));
            $page->translate('en')->setContent($faker->realText(200));
            $manager->persist($page);
            $page->mergeNewTranslations();
        }

        for ($i = 0; $i < 3; ++$i) {
            $page = new PageTer();
            $page->translate('en')->setTitle($faker->sentence(4));
            $page->translate('en')->setSubtitle($faker->sentence(5));
            $page->translate('en')->setContent($faker->realText(200));
            $manager->persist($page);
            $page->mergeNewTranslations();
        }

        $manager->flush();
    }
}
