<?= $this->extend('template/index') ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="h2">Detail Comic</div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/cover/<?= $comic['cover'] ?>" class="img-fluid rounded-start" alt="Cover <?= $comic['title'] ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fs-3"><?= $comic['title'] ?></li>
                        <li class="list-group-item"><span class="fw-bold">Penulis :</span> <?= $comic['author'] ?></li>
                        <li class="list-group-item"><span class="fw-bold">Penerbit :</span> <?= $comic['publisher'] ?></li>
                        <li class="list-group-item mt-3">
                            <a href="/comics" class="btn btn-secondary me-2">Back</a>
                            <a href="/comics" class="btn btn-warning">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>