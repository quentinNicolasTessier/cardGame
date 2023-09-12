<?php
// src/Controller/CardController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Service\CardService;

/**
 * Controller qui permet de gerer et afficher le jeu de carte
 */
class CardController extends AbstractController
{
    private $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }
    #[Route('/',name: 'card')]
    public function index(SessionInterface $session): Response
    {
        // creation du jeu de carte
        $cardGame = $this->cardService->createGame();
        $sortedHand=$cardGame;
        // Triez la main par couleur, puis par valeur
        $sortedHand=$this->cardService->sortedGame($sortedHand);

        // Vous pouvez également stocker la main dans la session pour une utilisation ultérieure
        $session->set('hand', $cardGame);
        // Affichez la main non triée et triée
        return $this->render('cardGame.html.twig', [
            'hand' => $cardGame,
            'sortedHand' => $sortedHand,
        ]);
    }


}
?>