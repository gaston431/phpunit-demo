<?php 
declare(strict_types=1);

namespace Src;

class MyClass
{
    public function concatenateStrings(string $str1, string $str2): string        
    {
        return $str1 . $str2;
    }

    public function someMethod()
    {
        $result = $this->apiCallMethod();
        if ($result === true) {
            return true;
        }
        return false;
    }

    public function apiCallMethod()
    {
        // calls external API
    }

    public function getSomeValue()
    {
        // some implementation here
    }

    public function someMethodThatUsesSomeValue()
    {
        $value = $this->getSomeValue();
        return $value;
    }
}