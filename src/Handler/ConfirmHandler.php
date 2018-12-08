<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 13:52
 */

namespace App\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class ConfirmHandler
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData()->setRound(1);
            $this->manager->flush();
            return [
                'status' => true,
                'playerId' => $form->getData()->getId()
            ];
        }
        return ['status' => false];
    }
}