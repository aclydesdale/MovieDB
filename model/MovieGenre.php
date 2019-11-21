<?php

function getMovieGenres($api_key)
{
    $request_url = "https://api.themoviedb.org/3/genre/movie/list?api_key=";
    $filters = "&language=en";
    $tmdbcurl = $request_url . $api_key . $filters;

    // cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tmdbcurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
    $json_reply = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($json_reply, TRUE);

    return $json["genres"];
}

function getMovieByGenre($api_key, $genre)
{
    $request_url = "https://api.themoviedb.org/3/discover/movie?api_key=";
    $filters = "&sort_by=popularity.desc&include_adult=false&include_video=false&language=en&with_genres=";
    $tmdbcurl = $request_url . $api_key . $filters . $genre;

    // cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tmdbcurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
    $json_reply = curl_exec($ch);
    curl_close($ch);

    return json_decode($json_reply, TRUE);
}
