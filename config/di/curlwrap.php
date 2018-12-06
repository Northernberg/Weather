<?php
/**
 * Configuration file to add as service in the Di container.
 */
return [

    // Services to add to the container.
    "services" => [
        "curlwrap" => [
            "shared" => true,
            "callback" => function () {
                $curl = new \Anax\Models\curlWrap();
                return $curl;
            }
        ],
    ],
];
