<?php
/**
 * This file is part of the SlackRandomWord project
 * By: omolara
 * Date: 12/10/16
 * Time: 3:33 PM
 */
include(__DIR__."/../vendor/autoload.php");
$command = "/randomword";
$text = "";
$response_url = "";
if ($command == "/randomword") {
    if ($text == "(configure)") {

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
