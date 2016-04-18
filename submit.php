<?php
function checkWebsite($url){
    $wv= curl_init($url);
    curl_setopt($wv, CURL_NOBODY, true);
    curl_setopt($wv, CURLOPT_FOLLOWLOCATION, true);
    $status=  curl_getinfo($wv, CURLINFO_HTTP_CODE);
    return ($status==200)?true:false;
}
if(isset($_POST['webName'])==TRUE && empty($_POST["webName"])==FALSE){
    $url=trim($_POST["webName"]);
    if(filter_var($url, FILTER_VALIDATE_URL)==true){
        if(checkWebsite($url)==true){
            echo 'Website is up';
        }
        else{
            echo 'Website is down';
        }
    }
    else{
        echo 'Invalid Website Name';
    }
}
?>