<?php
/**
 * Created by PhpStorm.
 * User: ronal
 * Date: 10/21/2017
 * Time: 10:31 AM
 */

namespace App;


class ApiHandler
{

    public function __construct()
    {
    }

    public function apiHandler()
    {
        return new ApiHandler();
    }

    public function sendApiCall($apiName, $chapter, $beginVerse, $endVerse)
    {

        //Make API Call
        $apiResponse = file_get_contents('https://bijbel.eo.nl/api/' . $apiName . '/' . $chapter . '/' . $beginVerse);
        //Remove callback from JSON
        $apiResponse = str_replace(array('/**/callback(', ');'), '', $apiResponse);
        //Decode JSON
        $resultObject = json_decode($apiResponse);
        //Parse data
        return $resultObject[0]->_source->flat_content;
    }

    /*
     * Get verse of the day from the OneSignal API
     */
    public function getVerseOfTheDay()
    {
        $limit = 1;
        $offset = 1287; // vanaf 1287 zijn er teksten van de dag (135)
        $json = [];

        /*
         * optie 1 random tussen 1287 en max (eerst een call doen om max te achterhalen)
         * optie 2 max -1
         */

        $npo = $this->getNotification(0);
        $total = $npo->total_count;

        $optie = '1';
        if ($optie == '1') {
            // random
            $min = 1287;
            $offset = rand($min, $total - 1);
        } else {
            // laatste
            $offset = $total - 1;
        }
        $found = false;
        do {
            $npo = $this->getNotification($offset++);

            if (is_object($npo->notifications[0]->data)) {
                //object data this must be welcome notification
            } else {
                $found = true;

                // heading
                $json['header'] = $npo->notifications[0]->headings->en;
                // text
                $json['content'] = $npo->notifications[0]->contents->en;
                // url
                $json['url'] = $npo->notifications[0]->url;
            }
        } while ($found == false);
        return json_encode($json);
    }

    private function getNotification($offset, $limit = 1)
    {
        $appId = env("ONE_SIGNAL_APP_ID");
        $key = env("ONE_SIGNAL_KEY");
        $url = 'https://onesignal.com/api/v1/notifications?app_id='.$appId;
        $url .= '&limit=' . $limit . '&offset=' . $offset;
        $headers = array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.$key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);

        if (curl_errno($ch)) {
            error_log(curl_error($ch) . '  One Signal API something went wrong..... try later');
        } else {
            curl_close($ch);
        }

        $npo = json_decode($data);
        return $npo;
    }

}