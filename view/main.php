<?php

include "header.php";
?>

<body>
  <div class="container mt-4">

    <?php include "aside.php"; include "movie-modal.php"; ?>

    <main class="col-md-10">
      <div class="row" id="movieList">
        <?php
        $results = $movies["results"];
        $counter = 0;
        foreach ($results as $result) { ?>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img id="movieImage-<?php echo $counter; ?>" class="bd-placeholder-img card-img-top movie_link" alt="Poster image" src="https://image.tmdb.org/t/p/w500/<?php echo $result["poster_path"]; ?>">
              <div class="card-body">
                <h2 id="movieTitle-<?php echo $counter; ?>"><?php echo $result["title"]; ?></h2>
                <p id="movieReleaseDate-<?php echo $counter; ?>"> <?php echo $result["release_date"]; ?></p>
                <p id="movieOverview-<?php echo $counter; ?>" class="card-text"><?php echo $result["overview"]; ?></p>
                <button id="movieID-<?php echo $counter; ?>" name="<?php echo $result["id"]; ?>" type="button" class="btn btn-primary stretched-link movie_link" data-toggle="modal">View</button>
              </div>
            </div>
          </div>
        <?php $counter = $counter + 1;
        } ?>
      </div>
    </main>
    <?php
    include "footer.php"; ?>