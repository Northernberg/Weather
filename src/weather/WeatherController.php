<?php

namespace Anax\weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    private $db = "not active";



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        $this->db = "active";
    }



    /**
     * Display the stylechooser with details on current selected style.
     *
     * @return object
     */
    public function indexAction() : object
    {
        $title = "Weather";

        $page = $this->di->get("page");
        $page->add("anax/weather/index");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function indexActionPost() : object
    {
        $title = "Weather";

        $api = file_exists(ANAX_INSTALL_PATH . "/config/api_keys.php") == true ? require ANAX_INSTALL_PATH . "/config/api_keys.php" : null;

        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $curl = $this->di->get("curlwrap");
        $session = $this->di->get("session");
        $data = [];

        $ipAdress = $curl->curl(["http://api.ipstack.com/" . $request->getPost("location") . "?access_key=" . $api["geotag"]]);
        if ($ipAdress[0]["type"] == null) {
            $session->set("flashmessage", "Not a valid ip-adress.");
        } else {
            $data = $curl->curl(["https://api.darksky.net/forecast/" . $api["darksky"] . "/" . $ipAdress[0]["latitude"] . "," . $ipAdress[0]["longitude"] . "?exclude=[currently,flags,alerts,hourly]"]);
            if (sizeof($data[0]) == 2) {
                $session->set("flashmessage", "No weather to be shown.");
            }
        }
        $page->add("anax/weather/index", [
            "data" => $data,
            "geo" => $ipAdress
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function apiActionGet() : array
    {
        $curl = $this->di->get("curlwrap");
        $data = null;

        $ipAdress = $curl->curl(["dummy"]);
        $json = [
            "Ip-info" => [
                "Ip" => "80.78.216.73",
                "type" => "ipv4",
                "Latitude" => "56.1616",
                "Longitude" => "15.5866",
                "Country" => "Sweden",
            ],
            "Weather" => "Mostly cloudy throughout the day."
        ];
        return [$json];
    }
}
