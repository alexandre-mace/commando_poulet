<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/12/18
 * Time: 00:29
 */

namespace Domain;


use Domain\Behavior\Fightable;

abstract class Character
{
    use Fightable;
}