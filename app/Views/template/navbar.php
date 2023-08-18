<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><span class="text-warning">FirstProject |</span> <?= $title ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?= ($title === 'Home') ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>">Home</a>
        <a class="nav-link <?= ($title === 'Comics') ? 'active' : '' ?>" href="<?= base_url('comics') ?>">Comics</a>
        <a class="nav-link <?= ($title === 'About') ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
        <a class="nav-link <?= ($title === 'Contact') ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Contact</a>
      </div>
    </div>
  </div>
</nav>