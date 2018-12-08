<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08/12/18
 * Time: 11:50
 */

namespace App\Event;

use App\Entity\Player;
use Symfony\Component\EventDispatcher\Event;

class PlayerActionEvent extends Event
{
    const NAME = 'player.action';

    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function getPlayer()
    {
        return $this->player;
    }
}