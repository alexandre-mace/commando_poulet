<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07/12/18
 * Time: 19:09
 */

namespace Domain;


class Monster
{
    const MONSTERS = [
        1 => [
            'number' => 1,
            'name' => 'Poulet curry',
            'damage' => 50,
            'lifePoints' => 800
        ],
        2 => [
            'number' => 2,
            'name' => 'Poulet gingembre',
            'damage' => 50,
            'lifePoints' => 800
        ],
        3 => [
            'number' => 3,
            'name' => 'Poulet basquaise',
            'damage' => 50,
            'lifePoints' => 800
        ],
        4 => [
            'number' => 4,
            'name' => 'Poulet colombo',
            'damage' => 50,
            'lifePoints' => 800
        ],
        5 => [
            'number' => 5,
            'name' => 'Poulet COCO',
            'damage' => 200,
            'lifePoints' => 1500,
            'attackNames' => [
                "Poulet COCO envoie un violent coup de bec !",
                "Poulet COCO envoie du jus de noix de coco et vous êtes allergique !",
                "Poulet COCO envoie un rayon laser !"
            ]
        ]
    ];
}