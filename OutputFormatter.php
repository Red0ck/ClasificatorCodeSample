<?php

class OutputFormatter
{
    public function __construct()
    {
    }

    public function showAsTable(array $items1, array $items2, array $classified)
    {
        $table = "<div class='col-12 row'><div class='col-2'></div>
                    <div class='col-8'>
                        <table class='table table-striped table-bordered'>
                            <tr class='table-info text-center'>
                                <th>no.</th>
                                <th>Number</th>
                                <th>String</th>
                                <th>Classification X</th>
                                <th>Classification Y</th>
                                <th>Classification Z</th>
                            </tr>";
        for ($i = 0; $i < count($items1); $i++) {
            $table .= "<tr class='text-center'>
                            <th>" . $i + 1 . "</th>
                            <th>{$items1[$i]}</th>
                            <th>{$items2[$i]}</th>
                            <th>{$classified[$i]['x']}</th>
                            <th>{$classified[$i]['y']}</th>
                            <th>{$classified[$i]['z']}</th>
                        </tr>";
        }

        $table .= "</table></div></div>";

        return $table;
    }
}
