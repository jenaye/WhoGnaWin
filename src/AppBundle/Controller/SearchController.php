<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Entity\Player;
use AppBundle\Form\SearchType;
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

            $count = 0;
            $winned = 0;
            foreach ($games as $key) {

                foreach ($key as $item) {
                    if ($player == $item->getPlayer1()) {
                   //     echo "Nadal est à gauche => ";
                        if ($item->getPlayer1Score() > $item->getPlayer2Score()) {
                         //   echo "le player a gauche a gagné <br/>, Nadal gagne 1 point : $matchGagné ";
                            $winned++;

                        } else {
                        //    echo "le player de droite à gagné<br/>";
                        }
                    } else {
                     //   echo "Nadal est a droite =>";
                        if ($item->getPlayer1Score() < $item->getPlayer2Score()) {
                         //   echo "le player a gauche a perdu <br/>";
                            $winned++;
                        } else {
                         //   echo "le player de droite à gagné<br/>, Nadal gagne 1 point: $matchGagné";

                        }
                    }
                    $count++;
                }
            }

        }else{
            throw new BadRequestHttpException('No player found with this name');
        }

        return $this->render('search/player.html.twig', [
            'player' => $player,
            'games' => $games,
            'total' => $count,
            'winned' => $winned
        ]);

    }

    /**
     * List game of player vs other player
     *
     * @Route("/all/{gender}", name="search_player_vs_player")
     * @Method("GET")
     */
    public function CombinedAction(Request $request,$gender){
        $form = $this->createForm(SearchType::class,null,['gender' => $gender]);
        return $this->render('search/player_vs_player.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // think to create post method, who call function in repository with all parameters to find everygame from player1 vs player2
}