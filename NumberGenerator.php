<?php

require_once('./GeneratorInterface.php');

class NumberGenerator implements GeneratorInterface
{
    private $_min;
    private $_max;

    function __construct(int $min, int $max)
    {
        $this->_min = $min;
        $this->_max = $max;
    }

    public function generate($how_many)
    {
        if ($how_many > 100) {
            $api_numbers = array();
            while ($how_many > 0) {
                $curl_connection = curl_init("http://www.randomnumberapi.com/api/v1.0/random?min={$this->_min}&max={$this->_max}&count={$how_many}");
                // curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $postRequest);
                curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);

                $api_response = curl_exec($curl_connection);
                curl_close($curl_connection);

                $how_many -= 100;
                $api_numbers = array_merge($api_numbers, json_decode($api_response));
            }
        } else {
            $curl_connection = curl_init("http://www.randomnumberapi.com/api/v1.0/random?min={$this->_min}&max={$this->_max}&count={$how_many}");
            // curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $postRequest);
            curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);

            $api_response = curl_exec($curl_connection);
            curl_close($curl_connection);

            $api_numbers = json_decode($api_response);
        }

        return $api_numbers;
    }
}
