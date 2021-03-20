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
        $c_url_connection = curl_init("http://www.randomnumberapi.com/api/v1.0/random?min={$this->_min}&max={$this->_max}&count={$how_many}");
        // curl_setopt($c_url_connection, CURLOPT_POSTFIELDS, $postRequest);
        curl_setopt($c_url_connection, CURLOPT_RETURNTRANSFER, true);

        $api_response = curl_exec($c_url_connection);
        curl_close($c_url_connection);

        return json_decode($api_response);
    }
}
