<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/12/18
 * Time: 23:01
 */

namespace App\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ChooseRoleHandler
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($form->getData());
            $this->manager->flush();
            return [
                'status' => true,
                'playerId' => $form->getData()->getId()
            ];
        }
        return ['status' => false];
    }
}