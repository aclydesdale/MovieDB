<?php
require("../model/MovieGenre.php");

$json_data = file_get_contents('../config.json');
$json = json_decode($json_data, true);
$api_key = $json["api_key"];

$action = filter_input(INPUT_POST, "action");
if ($action == NULL) {
    $action = filter_input(INPUT_GET, "action");
    if ($action == NULL) {
        $action = "genre";
    }
}

switch ($action) {
    case "genre": {
            $genre = filter_input(INPUT_GET, "with_genres");
            if ($genre == NULL) 
                $genre = "28";
            $movies = getMovieByGenre($api_key, $genre);
            $genres = getMovieGenres($api_key);
            include "../view/main.php";
            break;
        }
}
