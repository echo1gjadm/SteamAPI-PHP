<?php
    /** GetNewsForApp_v2
    *   Returns recent news articles for a gien appID
    *
    *   Lewis Dean
    *   14/11/18
    **/

//////////////////////////////////////////_Possible Parameters_//////////////////////////////////////////
//appid
//uint32		AppID to retrieve news for

//maxlength
//uint32		Maximum length for the content to return. If this is 0 the full content is returned, if it's less then a blurb is generated to fit.

//enddate
//uint32		Retrieve posts earlier than this date (unix epoch timestamp)

//count
//uint32		# of posts to retrieve (default 20)

//feeds
//string		Comma-separated list of feed names to return news for

//tags
//string		Comma-separated list of tags to filter by (e.g. 'patchnodes')

    function GetNewsForApp($appID)
    {
        $steamKey = "YOUR_API_KEY";     //Required for most webAPI requests

        $url = 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v2/?key='.$steamKey.'&appID='.$appID;   //URL

        $result = file_get_contents($url);

        if ($result === FALSE)
            {
                $result = "Failed!";        // Handle error
            }

        //For demonstration; show full return
        echo $result;
        //

        return $resultDecode;
    }

    //Example of calling the function and retrieving details
    $func = GetNewsForApp(400);
?>
