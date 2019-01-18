<?php


$flat = [
    ['id' => '1', 'title' => 'title 1', 'parent' => 0],
    ['id' => '2', 'title' => 'title 2', 'parent' => 1],
    ['id' => '3', 'title' => 'title 3', 'parent' => 0]
];

function three($flat, $root = 0)
{
    $three_array = [];
    foreach ($flat as $key => $value) {
        if ($value['parent'] == $root) {
            //unset($flat[$key]);
            $three_array[$value['id']] = [
                'id' => $value['id'],
                'title' => $value['title'],
                'parent' => $value['parent'],
                'child' => three($flat, $value['id'])
            ];
        }
    }
    return $three_array;
}

$three = three($flat);
print_r($three);

//factorial(6);



