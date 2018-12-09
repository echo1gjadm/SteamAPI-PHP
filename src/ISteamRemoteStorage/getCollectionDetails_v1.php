<?php
    /** getCollectionDetails_v1
    *   Returns the list of file IDs in a collection (this has its own fileID)
    *   in JSON format.
    *
    *   @author Lewis Dean
    *   09/12/18
    **/


    function GetCollectionDetails($fileID)
    {
        $steamKey = "YOUR_API_KEY";                                                                             //Required for most webAPI requests

        $url = 'https://api.steampowered.com/ISteamRemoteStorage/GetCollectionDetails/v1/?key='.$steamKey;   //URL
        $data = array('collectioncount' => '1', 'publishedfileids[0]' => $fileID);                           //Data to be retrieved

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

                                                                                        //Example of calling the function
    $wkItem = GetCollectionDetails(801004783);
    echo '<p>Extracts from JSON</p>';
    $result = $wkItem->response->result;
    echo '<p> Result: '.$result.'</p>';
    $resultCount = $wkItem->response->resultcount;
    echo '<p> ResultCount: '.$resultCount.'<p>';
    $collectionFileId = $wkItem->response->collectiondetails[0]->publishedfileid;
    echo '<p> Collection FileID: '.$collectionFileId.'<p>';
?>
