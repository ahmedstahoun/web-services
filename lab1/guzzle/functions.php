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
function showResults($data_arr){

    echo "<p>" . date("l g:i A") . "</p>";
    echo "<p>" . date("jS F, Y") . "</p>";
    echo "<p>" . $data_arr['weather'][0]['description'] . "</p>";
    echo "<p>" . toC($data_arr['main']['temp_min']) . "°C " . toC($data_arr['main']['temp_max']) . "°C" . "</p>";
    echo "<p>" . "Humidity: " . $data_arr['main']['humidity'] . " % </p>";
    echo "<p>" . "Wind: " . $data_arr['wind']['speed'] . " Km/h </p>";
}

?>