<?= $this->extend('halaman_stafdesainer/halaman_user/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Edit Data User</h1>
    </div>
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="/user/updateData/<?= $id["id"]; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" id="inputHidden" value="<?= $id['id']; ?>">
                            <input type="hidden" name="gambarLama" id="inputHidden" value="<?= $id['file_path']; ?>">
                            <div class="form-group row">
                                <label for="inputNamaUser" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" id="inputNamaUser" placeholder="Nama User Baru" name="nama_user" value="<?= $id['nama']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_user'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNoTelp" class="col-sm-2 col-form-label">No. Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="inputNoTelp" placeholder="Nomor Telepon" name="no_telp" value="<?= $id['no_telp']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telp'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="inputUsername" placeholder="Username" name="username" value="<?= $id['username']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="inputPassword" placeholder="Password Baru" name="password" value="">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jabatan">
                                        <option value="2">Staf Desainer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-2 col-form-label">Pilih Gambar</label>
                                <div class="col-sm-2 mb-2">
                                    <img src="/img/user/<?= $id['file_path']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="imgPreview()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                        <label for="gambar" class="custom-file-label"><?= $id['file_path']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/dataUser/" class="btn btn-secondary btn-user btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Form -->
</div>

<?= $this->endSection(); ?>