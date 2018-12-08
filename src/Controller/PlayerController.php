<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/12/18
 * Time: 00:34
 */

namespace App\Controller;

use App\Entity\Player;
use App\Form\ChooseNameType;
use App\Form\ChooseRoleType;
use App\Form\ConfirmType;
use App\Handler\ChooseNameHandler;
use App\Handler\ChooseRoleHandler;
use App\Handler\ConfirmHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    /**
     * @Route("/choose-role", name="character_choose_role")
     */
    public function chooseRole(Request $request, ChooseRoleHandler $handler)
    {
        $form = $this->createForm(ChooseRoleType::class)->handleRequest($request);
        $payload = $handler->handle($form);
        if ($payload['status']) {
            return $this->redirectToRoute('character_choose_name', ['id' => $payload['playerId']]);
        }
        return $this->render('character/choose_role.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/choose-name/{id}", name="character_choose_name")
     */
    public function chooseName(Player $player, Request $request, ChooseNameHandler $handler)
    {
        $form = $this->createForm(ChooseNameType::class, $player)->handleRequest($request);
        $payload = $handler->handle($form);
        if ($payload['status']) {
            return $this->redirectToRoute('confirm', ['id' => $payload['playerId']]);
        }
        return $this->render('character/choose_name.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
    }

    /**
     * @Route("/confirm/{id}", name="confirm")
     */
    public function confirm(Player $player, Request $request, ConfirmHandler $handler)
    {
        $form = $this->createForm(ConfirmType::class, $player)->handleRequest($request);
        $payload = $handler->handle($form);
        if ($payload['status']) {
            return $this->redirectToRoute('round', ['id' => $payload['playerId']]);
        }
        return $this->render('character/confirm.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
    }

}