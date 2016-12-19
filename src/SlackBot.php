<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:01 PM
 */
namespace Larikraun;
use phpDocumentor\Reflection\Types\Array_;

class SlackBot
{
    public static function getRandom($url)
    {
        $word = WordRequest::getRandom();
        $slackMessage = self::buildDefinitionMessage($word);
        $slackReq = new SlackRequest($url, json_encode($slackMessage->serialize()));
        // echo json_encode($slackMessage->serialize());
        CurlHandler::sendMessage($slackReq);
    }

    public static function getDefinition($url, $wordText)
    {
        $word = WordRequest::getDefinition($wordText);
        if ($word) {
            $slackMessage = self::buildDefinitionMessage($word);
            $slackReq = new SlackRequest($url, json_encode($slackMessage->serialize()));
        } else {
            $slackMessage = self::buildNotFoundMessage($wordText);
            $slackReq = new SlackRequest($url, json_encode($slackMessage->serialize()));
        }
        CurlHandler::sendMessage($slackReq);
    }

    private static function buildDefinitionMessage(Word $word)
    {
        $message = new SlackMessage();
        $message->setText("New Word");
        $attachment = array();
        $attachment[0]["title"] = "Word";
        $attachment[0]["text"] = $word->getWord();
        $attachment[0]["color"] = "good";

        $definitions = $word->getDefinitions();
        $definitionCount = count($definitions);

        for ($i = 1; $i <= $definitionCount; $i++) {
            /** @var Array_ $definition */
            $definition = $definitions[$i-1];

            $attachment[$i]["title"] = "Definition" . ($i > 1 ? " ({$i})" : "");
            $attachment[$i]["text"] = $definition["definition"];
            $attachment[$i]["color"] = "#aba5ed";
        }

        $message->setAttachment($attachment);
        return $message;
    }

    private static function buildNotFoundMessage($word)
    {
        $message = new SlackMessage();
        $message->setText("Sorry, I couldn't find *$word*. :disappointed: Try checking your spelling.");
        return $message;
    }
}

