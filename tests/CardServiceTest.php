<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\CardService;

class CardServiceTest extends TestCase
{

    /**
     * @return void
     * test sur la fonction de creation du jeu de carte
     */
    public function testCreateGame()
    {
         $cardService=new CardService();
        $cardGame = $cardService->createGame();
        $this->assertTrue(is_array($cardGame),'le jeu de carte est un tableau');
        $this->assertCount(10, $cardGame);

    }

    /**
     * @return void
     * Test sur la fonction qui trie le jeu de carte
     */
    public function testSortedGame(){
        $cardService=new CardService();
        $cardGame = $cardService->createGame();
        $sorteCardGame=$cardService->sortedGame($cardGame);
        $this->assertTrue(is_array($sorteCardGame),'le jeu de carte est un tableau');
        $this->assertCount(10, $sorteCardGame);
        $this->assertNotEquals($sorteCardGame,$cardGame,'le jeu de carte est bien trié');
    }
}
