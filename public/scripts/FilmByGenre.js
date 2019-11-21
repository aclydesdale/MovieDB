$(document).ready(function () {
    console.log("Ready.");
    api_key = ""; // API key goes here

    $(".genreBtn").click(function (e) {
        genre = $(this).attr("href").replace("#", "");
        e.preventDefault();
        $.ajax({
            url: `https://api.themoviedb.org/3/discover/movie?api_key=${api_key}&sort_by=popularity.desc&include_adult=false&include_video=false${genre}`,
            dataType: "json",
            success: function (result) {
                for (i = 0; i < result["results"].length; i++) {
                    $("#movieID-" + i).attr("name", result["results"][i]["id"]);
                    $("#movieImage-" + i).attr("src", "https://image.tmdb.org/t/p/w500/" + result["results"][i]["poster_path"]);
                    $("#movieTitle-" + i).html(result["results"][i]["title"]);
                    $("#movieReleaseDate-" + i).html(result["results"][i]["release_date"]);
                    $("#movieOverview-" + i).html(result["results"][i]["overview"]);
                }
            }
        });
    });

    $(".stretched-link").on("click", function () {
        movie = $(this).attr("name");
        $.ajax({
            url: `https://api.themoviedb.org/3/movie/${movie}?api_key=${api_key}`,
            dataType: "json",
            success: function (result) {
                $("#modalMovieImage").attr("src", "https://image.tmdb.org/t/p/w500/" + result["poster_path"]);
                $("#modalMovieTitle").html(result["title"]);
                $("#modalMovieOverview").html(result["overview"]);
                $("#modalTagline").html(result["tagline"]);
                $("#modalVote").html(result["vote_average"]);
                $("#modalMovie").modal("show");
            }
        });
    });
});