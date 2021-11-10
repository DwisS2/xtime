<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Feedback</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('Feedbackadmin/store') ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                <label for="pesan">Message</label>
                    <input type="text" class="form-control" id="pesan" name="pesan" value="<?= old('pesan'); ?>">
                </div>

                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ?>" />
                </div>


                       

                        
            

                        <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>