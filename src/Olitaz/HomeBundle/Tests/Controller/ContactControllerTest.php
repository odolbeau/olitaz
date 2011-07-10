<?php

namespace Olitaz\HomeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/contact');

        // page is ok
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('h1:contains("Contactez-moi")')->count() > 0, 'Can`ŧ find the good title (h1)');
        $this->assertTrue($crawler->filter('h2:contains("Envoyez un message")')->count() > 0, 'Can`ŧ find the good title (h2)');

        // try to send a contact email
        $form = $crawler->selectButton('valid')->form();
        $crawler = $client->submit($form, array(
                    'contact_form[name]'         => 'Tester',
                    'contact_form[mail]'         => 'tester@tester.fr',
                    'contact_form[subject]'      => 'Test contact message',
                    'contact_form[content]'      => 'Hello! This is the content of my message for you! :) I hope you will receive it! Bye!',
                    ));

        $crawler = $client->followRedirect();
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('h2:contains("Votre message a été envoyé")')->count() > 0, 'Can`ŧ find the good title (h2)');

        
    }
}
