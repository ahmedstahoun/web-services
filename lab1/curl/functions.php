<?php

$allcities = json_decode(file_get_contents("./assets/city.list.json"),true);
$egyptian_cities = [];

foreach($allcities as $city) {
    if($city['country'] == "EG") {
        $egyptian_cities[] = $city;
    }
}


function toC($f) {
    $c = (($f-32)*5)/9;
    return number_format($c, 2, '.', '' );
}

?>