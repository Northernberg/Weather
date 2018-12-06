<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Weather",
            "mount" => "weather",
            "handler" => "\Anax\weather\WeatherController",
        ],
    ]
];
