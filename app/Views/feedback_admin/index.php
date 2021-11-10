<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Feedback</h3>
        </div>
        
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('/feedback_admin/create'); ?>" class="btn btn-primary">Tambah</a>
            <hr />
            
<div class="md-form mt-1">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput">
</div>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Message</th>
                    <th>Name</th>
                    <th>Email</th>
                    
                </tr>
                <tbody id="myTable">
                <?php
                $no = 1;
                foreach ($feedback as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->pesan; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->email; ?></td>
                       
                        <td>
                            <a title="Edit" href="<?= base_url("feedback_admin/edit/$row->id"); ?>" class="btn btn-info">Edit</a>
                            <a title="Delete" href="<?= base_url("feedback_admin/delete/$row->id") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<?= $this->endSection('content'); ?>