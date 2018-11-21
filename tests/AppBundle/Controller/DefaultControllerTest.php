<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @internal
 * @coversNothing
 */
final class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Ylly ninja autotranlator', $crawler->filter('#container h1')->text());
    }

    public function testIndexLocale()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fr');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Languages current : fr', $crawler->filter('#container h2')->text());
    }
}
