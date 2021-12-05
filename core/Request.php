<?php
declare(strict_types=1);

namespace app\core;


class Request
{
    public array $requestBody = [];
    
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if($position === false){

            return $path;
        }

        return substr($path,0,$position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function all()
    {
        if($this->IsMethod("get"))
        {
            foreach($_GET as $key => $value)
            {
                $this->requestBody[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }elseif($this->IsMethod("post")){
            foreach($_POST as $key => $value)
            {
                $this->requestBody[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $this->requestBody;
    }

    public function IsMethod(string $method)
    {
        return ($this->getMethod() === strtolower($method)) ? true : false;   
    }

    public function input(string $input)
    {
        return ($this->all()[$input]) ?? null;
    }

    public function add(array $inputs)
    {
        $originalData = $this->all();
        foreach($inputs as $key => $value) 
        {
            $originalData[$key] = $value;
        }
        return $this->requestBody = $originalData;
    }

    public function except($inputs)
    {
        $originalData = $this->all();
        foreach((array) $inputs as $value) 
        {
            unset($originalData[$value]);
            $this->requestBody = $originalData;
        }    
        return $this->requestBody;
    }

    public function only(array $inputs)
    {
        $askedInputs = [];
        foreach((array) $inputs as $name) 
        {
            if(array_key_exists($name,$this->all()))
            {
                $askedInputs[$name] = $this->all()[$name];
            }
        }    
        return $askedInputs;
    }

    /**
     * debug request info 
     */
    public function dd()
    {
        return dd($this->all());
    }
}