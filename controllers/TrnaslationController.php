<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Request;

class TrnaslationController 
{
    public function setTranslation(Request $request)
    {
        $fileName = explode('.',$request->input('wordWithFile'))[0];
        $word = explode('.',$request->input('wordWithFile'))[1];
        
        $avilableLocale = ["ar","en"];

        foreach($avilableLocale as $locale)
        {
            $fullPathFile = TRANSLATION_PATH.$locale.'/'.$fileName.'.json';
            if(file_exists($fullPathFile)){
                $contentFileArray = json_decode(file_get_contents($fullPathFile),true,512,JSON_UNESCAPED_UNICODE);                
                $contentFileArray[$word] = $word;
                //FILE_APPEND | LOCK_EX
                file_put_contents($fullPathFile,json_encode($contentFileArray),JSON_UNESCAPED_UNICODE);
            }
        }

        return $this->responseJson(['status' => true,'translatedWord' => $word],200);

    }


    public function responseJson(array $data,int $statusCode)
    {
        http_response_code($statusCode);
        return json_encode($data);
    }
}