<?php

require_once('./Interface/GeneratorInterface.php');

class StringGenerator implements GeneratorInterface
{
    private $_min_length;
    private $_max_length;

    public function __construct(int $min_length, int $max_length)
    {
        $this->_min_length = $min_length;
        $this->_max_length = $max_length;
    }

    public function generate($howMany)
    {
        $generated_strings = array();
        for ($i = 0; $i < $howMany; $i++) {
            $generated_strings[] = $this->generateString();
        }
        return $generated_strings;
    }

    private function generateString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);

        $generated_string_length = rand($this->_min_length, $this->_max_length);

        $random_string = '';
        for ($i = 0; $i < $generated_string_length; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }

        return $random_string;
    }
}
