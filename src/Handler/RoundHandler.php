<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 15:45
 */

namespace App\Handler;


use App\Event\PlayerActionEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RoundHandler
{
    private $manager;
    private $session;
    private $dispatcher;

    public function __construct(EntityManagerInterface $manager, SessionInterface $session, EventDispatcherInterface $dispatcher)
    {
        $this->manager = $manager;
        $this->session = $session;
        $this->dispatcher = $dispatcher;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $event = new PlayerActionEvent($form->getData());
            $this->dispatcher->dispatch($event::NAME, $event);
            $form->getData()->setRound($form->getData()->getRound() + 1);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}