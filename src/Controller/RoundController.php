<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 15:40
 */

namespace App\Controller;


use App\Entity\Player;
use App\Form\RoundType;
use App\Handler\RoundHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RoundController extends AbstractController
{
    /**
     * @Route("/round/{id}", name="round")
     */
    public function round(Player $player, Request $request, RoundHandler $handler, SessionInterface $session)
    {
        $form = $this->createForm(RoundType::class, $player)->handleRequest($request);
        if ($handler->handle($form)) {
            return $this->redirectToRoute('round', ['id' => $player->getId()]);
        }
        return $this->render('round/round.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
    }
}