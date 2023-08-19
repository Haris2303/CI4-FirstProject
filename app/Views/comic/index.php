<?= $this->extend('template/index') ?>
<?= $this->section('main') ?>

<div class="container mt-4">
    <h2 class="mb-3">Comics</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $comics as $comic ) : ?>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="/img/cover/<?= $comic['cover'] ?>" alt="<?= $comic['title'] ?>" width="80"></td>
                    <td><?= $comic['title'] ?></td>
                    <td><?= $comic['author'] ?></td>
                    <td><?= $comic['publisher'] ?></td>
                    <td><a href="/comic/<?= $comic['slug'] ?>" class="btn btn-dark">Detail</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>