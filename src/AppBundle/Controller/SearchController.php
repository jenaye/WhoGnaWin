<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Entity\Player;
use AppBundle\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Game controller.
 *
 * @Route("search")
 */
class SearchController extends Controller
{

    /**
     * List game of player
     *
     * @Route("/", name="search_player_by_name_get")
     * @Method("GET")
     */
    public function indexAction(Request $request){

        return $this->render('search/index.html.twig');

    }


    /**
     * List game of player
     *
     * @Route("/player", name="search_player_by_name_result")
     * @Method("GET")
     */
    public function playerAction(Request $request){

        $player = $this->getDoctrine()->getRepository(Player::class)->getPlayerByName($request->query->get('playerName'));
        if($player){
            $games[] = $this->getDoctrine()
                    ->getRepository(Game::class)
                    ->findBy(['player1' => $player]);

            $games[] = $this->getDoctrine()
                    ->getRepository(Game::class)
                    ->findBy(['player2' => $player]);

        }else{
            throw new BadRequestHttpException('No player found with this name');
        }

        return $this->render('search/player.html.twig', [
            'player' => $player,
            'games' => $games
        ]);

    }
}