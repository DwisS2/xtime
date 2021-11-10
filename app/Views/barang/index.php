<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

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

<h1>Barang</h1>
<br>
<div class="md-form mt-1">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="myInput">
</div>

<table class="table">
	<thead>
		<th>No</th>
		<th>Barang</th>
		<th>Gambar</th>
		<th>Harga</th>
		<th>Aksi</th>
	</thead>
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
	<tbody id="myTable">
		<?php foreach($barangs as $index=>$barang): ?>
			<tr>
				<td><?= ($index+1) ?></td>
				<td><?= $barang->nama ?></td>
				<td>
					<img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/'.$barang->gambar) ?>" />
				</td>
				<td><?= "Rp ".number_format($barang->harga,2,',','.') ?></td>
				<td>
					
					<a href="<?= site_url('barang/update/'.$barang->id) ?>" class="btn btn-success">Update</a>
					<a href="<?= site_url('barang/delete/'.$barang->id) ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<style>
    
<?= $this->endSection() ?>