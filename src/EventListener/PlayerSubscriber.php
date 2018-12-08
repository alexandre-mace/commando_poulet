<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 19:26
 */

namespace App\EventListener;

use App\Entity\Player;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Domain\GameSystem;

class PlayerSubscriber implements EventSubscriber
{
    private $gameSystem;

    public function __construct(GameSystem $gameSystem)
    {
        $this->gameSystem = $gameSystem;
    }

    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->setLifePoints($args);
        $this->setEnemy($args);
    }

    public function setLifePoints(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof Player) {
            $entity->setLifePoints($entity->getRole()->getLifePoints());
        }
    }
    public function setEnemy(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof Player) {
            $entity->setEnemy(new \App\Entity\Monster(\Domain\Monster::MONSTERS[1]));
        }
    }
}
