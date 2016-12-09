<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:01 PM
 */
namespace Larikraun;
class SlackBot
{
    private static $URL = "https://hooks.slack.com/services/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";

    public static function buildRequest($fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, SELF::$URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return json_decode($result, true);
    }

    public static function doGet()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $result = json_decode($result, true);
        $response = array();

        return $response;
    }

    public static function sendData()
    {
        $word = WordAPI::getRandom();
        $slackMessage = self::buildMessage($word);
        echo $slackMessage->toString();
        // self::buildRequest(json_encode($data));
    }

    private static function buildMessage(Word $word)
    {
        $message = new SlackMessage();
        $message->setText("New Word");
        $attachment = array();
        $attachment[0]["title"] = "Word";
        $attachment[0]["value"] = $word->getWord();
        $attachment[0]["short"] = false;
        $attachment[1]["title"] = "Definition";
        $attachment[1]["value"] = $word->getDefintion();
        $attachment[1]["short"] = false;
        $message->setAttachment($attachment);
        return $message;
    }
}



/*$command = $_GET["command"];
$text = $_GET["text"];
/*array(10) {
    ["token"]=>
 string(24) "uGcVAfwj73Oyls7CHUAuyUQD"
    ["team_id"]=>
 string(9) "T2B7WM9DF"
    ["team_domain"]=>
 string(15) "omolaraadeyinka"
    ["channel_id"]=>
 string(9) "D2B7L5938"
    ["channel_name"]=>
 string(13) "directmessage"
    ["user_id"]=>
 string(9) "U2B7SUWAH"
    ["user_name"]=>
 string(7) "omolara"
    ["command"]=>
 string(11) "/randomword"
    ["text"]=>
 string(5) "hello"
    ["response_url"]=>
 string(80) "https://hooks.slack.com/commands/T2B7WM9DF/115470074279/rHB3BaxZFQvuhAX4noZcql9X"
}
if ($command == "/randomword") {
    if ($text == "configure") {

    } else if ($text == "word") {

    } else if ($text == "random") {
        SlackNewWord::sendData();
    }
}*/
