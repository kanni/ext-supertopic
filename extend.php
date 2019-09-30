<?php

/*
 * This file is part of Flarum.
 *
 * The creator of bbbbcode is Billy Wilcosky. https://wilcosky.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {

            $emotes = glob(__DIR__ . '/assets/superemoticons_latest/*.{jpg,png,gif}', GLOB_BRACE);

            foreach ($emotes as $emote) {
                $path_parts = pathinfo($emote);
                $name = $path_parts['filename'];
                $type = $path_parts['extension'];
                $data = file_get_contents($emote);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $config->Emoticons->add(
                    ':'.$name,
                    '<img src="'.$base64.'"/>'
                 );
            };
        })
];
