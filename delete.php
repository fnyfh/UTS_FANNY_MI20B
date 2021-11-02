<?php

$con = new mysqli("localhost", "root", "", "anggota_fanny");


if (isset($_POST['delete'])) {
  $id = $_POST['id'];

  $result = mysqli_query($con, "DELETE FROM `tbl_anggota` WHERE `tbl_anggota`.`id` = $id");
  header("Location:view.php?pesan=success&&frm=del");
}
