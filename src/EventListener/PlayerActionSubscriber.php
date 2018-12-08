<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 19:26
 */

namespace App\EventListener;

use App\Entity\Player;
use App\Event\PlayerActionEvent;
use Doctrine\ORM\EntityManagerInterface;
use Domain\GameSystem;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerActionSubscriber implements EventSubscriberInterface
{
    private $gameSystem;
    private $manager;

    public function __construct(GameSystem $gameSystem, EntityManagerInterface $manager)
    {
        $this->gameSystem = $gameSystem;
        $this->manager = $manager;
    }

    public static function getSubscribedEvents()
    {
        return array(
            PlayerActionEvent::NAME => 'onPlayerAction'
        );
    }
    public function onPlayerAction(PlayerActionEvent $event)
    {
        $this->handleRound($event);
    }

    public function handleRound(PlayerActionEvent $event)
    {
        $entity = $event->getPlayer();

        if ($entity instanceof Player and $entity->getHasStartedGame()) {
            $this->gameSystem->process($entity, $entity->getEnemy());
            $this->manager->flush();
        }
    }
}
