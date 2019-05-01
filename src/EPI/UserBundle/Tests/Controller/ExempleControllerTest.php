<?php

namespace EPI\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExempleControllerTest extends WebTestCase
{
    public function testAfficherstatus()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherStatus');
    }

    public function testPublierstatu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/publierStatu');
    }

}
