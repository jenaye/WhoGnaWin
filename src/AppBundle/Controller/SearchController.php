<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use AppBundle\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $infoPlayer = $this->getDoctrine()
            ->getRepository('AppBundle:Player')
            ->getPlayerByName($request->get('playerName'));
        dump($infoPlayer);
        exit;

        return $this->render('search/player.html.twig', array(
            'player' => $infoPlayer,
        ));

    }
}