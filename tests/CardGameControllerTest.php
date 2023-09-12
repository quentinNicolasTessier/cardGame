<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardGameControlleTest extends WebTestCase
{
    /**
     * @return void
     * test fonctionnel sur la page de la liste des cartes
     */
    public function testWebPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ma main de cartes (non triée)');
    }
}
?>