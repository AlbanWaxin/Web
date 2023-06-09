<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/patients/index">Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href= "/pages/about">About</a>
        </li>
      </ul>
    </div>
    <div class = "d-flex gap-1">
      <ul class="navbar-nav">

        <?php if (isLoggedIn()) { ?>
          <li class="nav-item">
            <a class="nav-link" href="/doctors/log_out">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
          <a class="nav-link" href="/doctors/login">Login</a>
        </li> 
          <li class="nav-item">
          <a class="nav-link" href="/doctors/register">Register</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>