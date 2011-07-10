<?php

namespace Olitaz\HomeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
