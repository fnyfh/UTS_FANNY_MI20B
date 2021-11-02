<?php
error_reporting(0);
$con = new mysqli("localhost", "root", "", "anggota_fanny");

$sql = "SELECT * FROM tbl_anggota";
$result = $con->query($sql);
$data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Anggota LP3I COMPUTER CLUB</title>
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <?php
    $pesan = $_GET['pesan'];
    $frm = $_GET['frm'];
    // echo $pesan;
    if ($pesan == 'success' && $frm == 'add') {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menambahkan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    } else  if ($pesan == 'success' && $frm == 'edit') {
    ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil update.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    } else  if ($pesan == 'success' && $frm == 'del') {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Data dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>
    <br>
    <h1 align="center">DATA ANGGOTA
      <!-- LP3I COMPUTER CLUB 2021/2022 -->
    </h1>
    <div align="left">
      <a href="add.php" class="btn btn-primary" title="Tambah"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <br>
    <table class="table table-bordered table-hover">
      <thead class="table-dark text-center">
        <tr>
          <td>NIM</td>
          <td>Nama Lengkap</td>
          <td>NO HP</td>
          <td>Jurusan</td>
          <td>Jabatan</td>
          <td>Aksi</td>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($result as $data) {
          if ($data['jurusan'] == "1") {
            $jurusan = "Manajemen Informatika";
          } elseif ($data['jurusan'] == "2") {
            $jurusan = "Manajemen Keuangan dan Perbankan";
          } elseif ($data['jurusan'] == "3") {
            $jurusan = "Manajemen Pemasaran";
          } elseif ($data['jurusan'] == "4") {
            $jurusan = "Administrasi Bisnis";
          } elseif ($data['jurusan'] == "5") {
            $jurusan = "Teknik Otomotif";
          }
          if ($data['jabatan'] == "1") {
            $jabatan = "Ketua";
          } elseif ($data['jabatan'] == "2") {
            $jabatan = "Wakil Ketua";
          } elseif ($data['jabatan'] == "3") {
            $jabatan = "Sekretaris 1";
          } elseif ($data['jabatan'] == "4") {
            $jabatan = "Sekretaris 2";
          } elseif ($data['jabatan'] == "5") {
            $jabatan = "Bendahara 1";
          } elseif ($data['jabatan'] == "6") {
            $jabatan = "Bendahara 2";
          } elseif ($data['jabatan'] == "7") {
            $jabatan = "Biro Pendidikan 1";
          } elseif ($data['jabatan'] == "8") {
            $jabatan = "Biro Pendidikan 2";
          } elseif ($data['jabatan'] == "9") {
            $jabatan = "Anggota";
          }
        ?>

          <tr>
            <td><?= $data["nim"]; ?></td>
            <td><?= $data["nama"]; ?></td>
            <td><?= $data["no_hp"]; ?></td>
            <td><?= $jurusan; ?></td>
            <td><?= $jabatan; ?></td>
            <td align="center">
              <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" title="Edit"><i class="fa fa-edit"></i>Edit</a>
              <a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id']; ?>" class="btn btn-secondary" title="Hapus"><i class="fa fa-trash"></i>Delete</a>
            </td>
          </tr>
          <div class="example-modal">
            <div id="deletesurat<?php echo $isi['id'] ?>" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form class="row g-3" method="post" action="delete.php" name="form1">
                    <div class="modal-header">
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                      <h3 class="modal-title">Konfirmasi Delete Data Surat</h3>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $isi['id']; ?>">
                      <h4 align="center">Apakah anda yakin ingin menghapus no surat <?php echo $isi['no_surat']; ?>
                        <strong><span class="grt"></span></strong>?
                      </h4>
                    </div>
                    <div class="modal-footer">
                      <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>