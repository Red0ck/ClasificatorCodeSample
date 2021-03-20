<?php

class Classifier
{

    public function __construct()
    {
    }

    public function classify(array $items1, array $items2)
    {
        $classified_items = array();
        for ($i = 0; $i < count($items1); $i++) {
            $classified_items[] = array(
                'x' => $this->classificationX($items1[$i], $items2[$i]),
                'y' => $this->classificationY($items1[$i], $items2[$i]),
                'z' => $this->classificationZ($items1[$i], $items2[$i])
            );
        }

        return $classified_items;
    }

    public function classificationX(int $item1, string $item2)
    {
        if ($item1 > strlen($item2))
            return 1;
        elseif ($item1 < strlen($item2))
            return 2;
        else
            return 'Classification rules are not compatible with this pair.';
    }

    public function classificationY(int $item1, string $item2)
    {
        if (strlen(filter_var($item2, FILTER_SANITIZE_NUMBER_INT)) > $item2)
            return 1;
        else
            return 2;
    }

    public function classificationZ(int $item1, string $item2)
    {
        if ($item1 < 15)
            return 3;
        elseif ($item1 > 37)
            return 7;
        else
            return 'Classification rules are not compatible with this pair.';
    }
}
