<?php
    /** GetPublishedFileDetails
    *   Returns the file details for a UGC / workshop item
    *   in JSON format.
    *
    *   Lewis Dean
    *   14/11/18
    **/


    function GetPublishedFileDetails($fileID)
    {
        $steamKey = "YOUR_API_KEY";                                                                             //Required for most webAPI requests

        $url = 'https://api.steampowered.com/ISteamRemoteStorage/GetPublishedFileDetails/v1/?key='.$steamKey;   //URL
        $data = array('itemcount' => '1', 'publishedfileids[0]' => $fileID);                                    //Data to be retrieved

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, true, $context);
        $resultDecode = json_decode($result);

        if ($result === FALSE)
            {
                $resultDecode = "Failed to retrieve steam workshop statistics";        // Handle error
            }

        //For demonstration; show full JSON return
        echo $result;
        //
           
        return $resultDecode;
    }

                                                                                        //Example of calling the function and retrieving details
    $wkItem = GetPublishedFileDetails(1512154658);
    $preview_url = $wkItem->response->publishedfiledetails[0]->preview_url;
    $views = $wkItem->response->publishedfiledetails[0]->views;
    $subs = $wkItem->response->publishedfiledetails[0]->subscriptions;
    $favourited = $wkItem->response->publishedfiledetails[0]->favorited;
?>
