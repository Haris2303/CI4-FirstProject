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
                        <li class="list-group-item">
                            <form action="/comic/<?= $comic['id_comic'] ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger me-2">Hapus</button>
                            </form>
                            <a href="/comic/update/<?= $comic['slug'] ?>" class="btn btn-warning">Edit</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/comics" class="btn badge btn-dark d-block">Kembali</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>