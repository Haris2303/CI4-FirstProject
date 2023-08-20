<?= $this->extend('template/index') ?>
<?= $this->section('main') ?>

<?php $validate = session()->has('validation') ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="my-5 text-center">Ubah Data</h3>
            <form action="/comic/change" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $comic['id_comic'] ?>">
                <input type="hidden" name="slug" value="<?= $comic['slug'] ?>">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                    <input type="text" name="title" class="form-control <?= ($validate && session('validation')->hasError('title')) ? 'is-invalid' : "" ?>" value="<?= (old('title')) ? old('title') : $comic['title'] ?>" autocomplete="off" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= ($validate) ? session('validation')->getError('title') : "" ?>
                    </div>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Penulis</span>
                    <input type="text" name="author" class="form-control <?= ($validate && session('validation')->hasError('author')) ? 'is-invalid' : "" ?>" value="<?= (old('author')) ? old('author') : $comic['author'] ?>" autocomplete="off" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= ($validate) ? session('validation')->getError('author') : "" ?>
                    </div>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Penerbit</span>
                    <input type="text" name="publisher" class="form-control <?= ($validate && session('validation')->hasError('publisher')) ? 'is-invalid' : "" ?>" value="<?= (old('publisher')) ? old('publisher') : $comic['publisher'] ?>" autocomplete="off" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= ($validate) ? session('validation')->getError('publisher') : "" ?>
                    </div>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Sampul</span>
                    <input type="text" name="cover" class="form-control" value="<?= old('cover') ?>" autocomplete="off" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="d-grid input-group input-group-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>