<?php
/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 4:57 PM
 */
include("vendor/autoload.php");
$command = $_GET["command"];
$text = $_GET["text"];
$response_url = $_GET["response_url"];
if ($command == "/randomword") {

    if ($text == "(configure)") {

        //TODO configure

    } else if (\Larikraun\Util::startsWith($text, "word")) {

        $word = explode(" ", $text);
        Larikraun\SlackBot::getDefinition($response_url, $word[1]);

    } else if ($text == "") {

        \Larikraun\SlackBot::getRandom($response_url);

    } else if ($text == "(help)") {

        echo "List of commands:\n(help)\n(configure)\nany other thing";

    } else {

        Larikraun\SlackBot::getDefinition($response_url, $text);

    }

}
