<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Weather</h1>

<form class="stylechooser" method="post">
    <fieldset>
        <legend>Enter adress</legend>
        <p>
            <label for="location">Ip-adress: <br>
                <input type="text" name="location">
            </label>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </fieldset>
</form>

<div>
    <h1> Api documentation </h1>
    <p> Api calls to weather/api/[ip-adress] </p>
    <ul>
        <li><a href="weather/api/155.135.55.94">Api example call</a></li>
        <li><a href="weather/api/hey">Domain example </a></li>
    </ul>
</div>
<?php if ($data != null) : ?>
    <?php if (sizeof($data[0]) == 2) : ?>
    <p> <?= $data[0]["error"] ?></p>
    <?php else : ?>
<h1> Result </h1>
    <table>
        <th> Day </th>
        <th> Weather </th>
        <th> Min Temperature </th>
        <th> Max temperature </th>
    <?php foreach ($data[0]["daily"]["data"] as $day) : ?>
        <tr>
            <td><?= gmdate("H:i:s", $day["time"]) ?> </td>
            <td> <?= $day["summary"] ?> </td>
            <td> <?= round(($day["temperatureLow"] - 32) / 1.8, 0) ?> &#8451; </td>
            <td> <?= round(($day["temperatureHigh"] - 32) / 1.8, 0) ?> &#8451; </td>
        </tr>
    <?php endforeach; ?>
</table>

<div>
    <h2> Info location </h2>
    <p>Ip: <?= $geo[0]["ip"]?> </p>
    <p>Type: <?= $geo[0]["type"]?> </p>
    <p>Latitude: <?= $geo[0]["latitude"]?> </p>
    <p>Longitude:<?= $geo[0]["longitude"]?> </p>
    <p>Country: <?= $geo[0]["country_name"]?> </p>
</div>

<iframe width="420" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openlinkmap.org/small.php?lat=<?= $geo[0]["latitude"]?>&lon=<?= $geo[0]["longitude"]?>&zoom=5" style="border: 1px solid black"></iframe>
    <?php endif; ?>
<?php endif; ?>
