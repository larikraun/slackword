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
    public static function getRandom($url)
    {
        $word = WordRequest::getRandom();
        $slackMessage = self::buildMessage($word);
        $slackReq = new SlackRequest($url, json_encode($slackMessage->serialize()));
        //  echo json_encode($slackMessage->serialize());
        CurlHandler::sendMessage($slackReq);
    }

    public static function getDefinition($url, $word)
    {
        $word = WordRequest::getDefinition($word);
        $slackMessage = self::buildMessage($word);
        $slackReq = new SlackRequest($url, json_encode($slackMessage->serialize()));
        CurlHandler::sendMessage($slackReq);
    }

    private static function buildMessage(Word $word)
    {
        $message = new SlackMessage();
        $message->setText("New Word");
        $attachment = array();
        $attachment[0]["title"] = "Word";
        $attachment[0]["text"] = $word->getWord();
        $attachment[0]["color"] = "good";
        $attachment[1]["title"] = "Definition";
        $attachment[1]["text"] = $word->getDefintion();
        $attachment[1]["color"] = "#aba5ed";
        $message->setAttachment($attachment);
        return $message;
    }
}

