<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Crazy Tic-Tac-Toe")')->count() > 0);
    }

    public function testXIsWinner()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $buttonCrawlerNode = $crawler->selectButton('Submit');
        $form = $buttonCrawlerNode->form();
        $formResponseCrawler = $client->submit($form, [
            'nested[squares][0][squares][0][value]' => 'X',
            'nested[squares][0][squares][1][value]' => 'X',
            'nested[squares][0][squares][2][value]' => 'X',

            'nested[squares][1][squares][0][value]' => 'X',
            'nested[squares][1][squares][4][value]' => 'X',
            'nested[squares][1][squares][8][value]' => 'X',

            'nested[squares][2][squares][2][value]' => 'X',
            'nested[squares][2][squares][5][value]' => 'X',
            'nested[squares][2][squares][8][value]' => 'X',
        ]);

        $this->assertTrue($formResponseCrawler->filter('html:contains("The winner is X")')->count() > 0);
    }
}
