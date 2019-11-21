<div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <?php
                foreach ($genres as $genre) { ?>
                <li class="nav-item">
                    <a class="nav-link genreBtn" href="#&with_genres=<?php echo $genre["id"]; ?>">
                        <span data-feather="file"></span>
                        <?php echo $genre["name"]; ?>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </nav>