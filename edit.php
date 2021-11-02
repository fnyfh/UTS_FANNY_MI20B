<?php
error_reporting(0);
$con = new mysqli("localhost", "root", "", "anggota_fanny");
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM tbl_anggota where id = '$id'");
$isiAnggota = $query->fetch_assoc();
$query2 = mysqli_query($con, "SELECT * FROM tbl_jurusan");
$isi = $query2->fetch_assoc();
$query3 = mysqli_query($con, "SELECT * FROM tbl_jabatan");
$isiJabatan = $query3->fetch_assoc();

if ($isi['jurusan'] == 1) {
  $jj = 'Manajemen Informatika';
} else if ($isi['jurusan'] == 2) {
  $jj = 'Manajemen Pemasaran';
} else if ($isi['jurusan'] == 3) {
  $jj = 'Manajemen Keuangan dan Perbankan';
} else if ($isi['jurusan'] == 4) {
  $jj = 'Administrasi Bisnis';
} else if ($isi['jurusan'] == 5) {
  $jj = 'Teknik Otomotif';
} else {
  $jj = 'Jenis Surat Tidak Terdaftar';
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Update</title>

  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">
      <div class="section-title text-center">
        <h2>Edit Data</h2>
      </div>
      <div class="container">
        <row>
          <div class="card">
            <div class="card-body">
              <form class="row g-3" method="post" action="edit.php?id=<?php echo $isi['id'] ?>" name="form1">
                <div class="col-md-12">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $isi['nim'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $isi['nama'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="no_hp" class="form-label">NO HP</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $isi['no_hp'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $isi['alamat'] ?>">
                </div>
                <div class="col-md-4">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <select id="jurusan" class="form-select" name="jurusan">
                    <option selected value="<?php echo $isi['jurusan'] ?>"><?php echo $js ?>---</option>
                    <option value="1">Manajemen Informatika</option>
                    <option value="2">Manajemen Pemasaran</option>
                    <option value="3">Manajemen Keuangan dan Perbankan</option>
                    <option value="4">Administrasi Bisnis</option>
                    <option value="5">Teknik Otomotif</option>
                  </select>
                </div>
                <div d-grid gap-2 d-md-block>
                  <button type="submit" class="btn btn-primary" name="update">Update</button>
                  <button type="submit" class="btn btn-danger" name="batal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </row>
      </div>
      <?php
      if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $jurusan = $_POST['jurusan'];
        $jabatan = $_POST['jabatan'];

        $result = mysqli_query($con, "UPDATE `tbl_anggota` SET
    `nim`='$nim',
    `nama`='$nama',
    `no_hp`='$no_hp',
    `alamat`='$alamat',
    `jurusan`='$jurusan',
    `jabatan`='$jabatan'
    WHERE
    `id`='$id';
  ");
        header("Location:view.php?pesan=success&&frm=view");
      }
      ?>

</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>