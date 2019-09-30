<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {

            $emotes = glob(__DIR__ . '/assets/superemoticons_latest/*.{jpg,png,gif}', GLOB_BRACE);

            foreach ($emotes as $emote) {
                $path_parts = pathinfo($emote);
                $name = ':' . $path_parts['filename'];
                $type = $path_parts['extension'];
                $data = file_get_contents($emote);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                
                $config->Emoticons->add(
                    $name,
                    '<img src="'.$base64.'" alt="'.$name.'" title="'.$name.'" />'
                 );
            };
        })
];
