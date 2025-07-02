<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Edit Homestay</h2>
    <form action="/admin/homestay/update/<?= $homestay['id_homestay'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Homestay</label>
            <input type="text" name="nama_homestay" value="<?= $homestay['nama_homestay'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?= $homestay['deskripsi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Harga Per Malam</label>
            <input type="number" name="harga_per_malam" value="<?= $homestay['harga_per_malam'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <img src="/uploads/homestay/<?= $homestay['gambar'] ?>" width="100"><br>
            <input type="file" name="gambar" class="form-control mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
<?= $this->endSection() ?>