<?php


if(!function_exists("__()"))
{
    function __(string $key)
    {
        $fileName = explode('.',$key)[0];
        $word = explode('.',$key)[1];

        $fullPathFile = TRANSLATION_PATH.USER_LOCALE.'/'.$fileName.'.json';
        
        if(file_exists($fullPathFile)){
            $contentFileArray = json_decode(file_get_contents($fullPathFile),true,512,JSON_UNESCAPED_UNICODE);                
            return (isset($contentFileArray[$word])) ? $contentFileArray[$word] : $key;
        }
        
        return $key;
    }
}