<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {

            // $emotes = glob(__DIR__ . '/assets/superemoticons_latest/*.{jpg,png,gif}', GLOB_BRACE);
            $assets_path = '/assets/extensions/kanni-ext-supertopic/superemoticons_latest/';
            $emotes_data_file = __DIR__ . '/emotes.json';
            $emotes_data = json_decode(file_get_contents($emotes_data_file));

            foreach ($emotes_data as $command => $filename) {
                $config->Emoticons->add(
                    $command,
                    '<img src="' . $assets_path . $filename . '" alt="'.$command.'" title="'.$command.'" />'
                 );
            }

            // foreach ($emotes as $emote) {
            //     $path_parts = pathinfo($emote);
            //     $name = $path_parts['filename'];
            //     $type = $path_parts['extension'];
                

                
            //     $config->Emoticons->add(
            //         ':' . $name,
            //         '<img src="' . $assets_path . $name . '.' . $type . '" alt="'.$name.'" title="'.$name.'" />'
            //      );
            // };
        })
];
