<?php

use Faker\Generator as Faker;

$factory->define(\App\Music::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'type' => 'youtube',
        'source' => $faker->randomElement([
            'https://www.youtube.com/watch?v=sVPXDGCYl8s',
            'https://www.youtube.com/watch?v=-1W2nkMVgYo',
            'https://www.youtube.com/watch?v=xnL_DOQxhzE',
            'https://www.youtube.com/watch?v=MWlRl3oJDqI',
            'https://www.youtube.com/watch?v=TKgQedWHCE8',
            'https://www.youtube.com/watch?v=31ynT-uRyWs',
            'https://www.youtube.com/watch?v=8wto35MYjL8',
            'https://www.youtube.com/watch?v=ziZ1vJnMboo',
            'https://www.youtube.com/watch?v=ChIwxel9q8M',
            'https://www.youtube.com/watch?v=dDJoX3w2EME',
            'https://www.youtube.com/watch?v=_tP7njyysqg',
            'https://www.youtube.com/watch?v=j0ZuMsCNrXk'
        ]),
        'featured' => 0,
        'weight' => 0
    ];
});
