<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">about</a>
                </li>
                <?php if (isLoggedIn()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/patients">Patients</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="d-flex gap-1">
            <?php
            if (!isLoggedIn()) { ?>
                <a class="btn btn-primary" href="/doctors/login" role="button">Log In</a>
                <a class="btn btn-primary" href="/doctors/register" role="button">Register</a>
            <?php } else { ?>
                <a class="btn btn-primary" href="/doctors/logout" role="button">Log out</a>
            <?php } ?>

        </div>

    </div>
</nav>