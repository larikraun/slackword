<?php
/**
 * This file is part of the SlackRandomWord project
 * By: omolara
 * Date: 12/10/16
 * Time: 3:33 PM
 */
include(__DIR__."/../vendor/autoload.php");
$command = "/randomword";
$text = "random";
$response_url = "";
if ($command == "/randomword") {
    if ($text == "configure") {

    } else if (\Larikraun\Util::startsWith($text, "word")) {
        Larikraun\SlackBot::getDefinition($response_url, "word");
    } else if ($text == "random") {
        \Larikraun\SlackBot::getRandom($response_url);
    } else if ($text == "help") {
    } else {
        echo "Sorry. I did not recognise that command. Try /randomword help to get valid list of commands";
    }
}