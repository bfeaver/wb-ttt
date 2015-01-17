<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->markTestSkipped('came with framework, remove...');
        $client = static::createClient();

        $crawler = $client->request('GET', '/app/example');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Homepage")')->count() > 0);
    }
}
