<?php
/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 5:21 PM
 */

namespace Larikraun;


class CurlHandler
{
    public static function sendMessage(SlackRequest $req)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $req->getUrl());
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req->getBody());
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $result;
    }

    public static function callAPI(WordRequest $req)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $req->getUrl());
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $req->getHeader());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status==404) {
            return false;
        }
        
        $result = json_decode($result, true);
        return $result;
    }
}