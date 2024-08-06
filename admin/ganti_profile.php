<?php include ("inc_header.php") ?>
<?php
    $err = "";
    $sukses = "";
if (isset($_POST['simpan'])) {
    $password_lama = $_POST['password_lama'];
    $password_ = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $sql1 = "select * from admin where username = '" . $_SESSION['admin_username'] . "'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if (md5($password_lama) != $r1['password']) {
    $err .= "<li>Password lama tidak sesuai </li>";
    }
    if ($password_lama == '' or $konfirmasi_password == '' or $password == '') {
        $err .= "<li>Semua password harus diisi </li>";
    }

    if ($password != $konfirmasi_password) {
        $err .= "<li>Password dan Konfirmasi Password harus sama </li>";
    }

    if (strlen($password) < 6) {
        $err .= "<li>Password minimal 6 karakter </li>";
    }


    if(empty($err)){
        $sql1 = "update admin set password = md5(password) where username = '".$_SESSION['admin_username']."'";
        mysqli_query($koneksi, $sql1);
        $sukses = "Password berhasil diubah.";
    }
}
?>
<h1>Ganti password akun</h1>
<?php 
if ($sukses){
    ?>
<div class="alert alert-primary">
    <?php echo $sukses?>
</div>
<?php
}
?>

<?php 
if ($err){
    ?>
<div class="alert alert-danger">
    <ul><?php echo $err?></ul>
</div>
<?php
}
?>
<form action="" method="POST">
    <div class="mb-3row">
        <label for="password_lama" class="col-sm-3-com-form-label">Password Lama</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password_lama" name="password_lama" />
        </div>
    </div>
    <div class="mb-3row">
        <label for="password" class="col-sm-3-com-form-label">Password Baru</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" />
        </div>
    </div>
    <div class="mb-3row">
        <label for="konfirmasi_password" class="col-sm-3-com-form-label">konfirmasi Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" />
        </div>
    </div>
    <div class="mb-3row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <input type="submit" class="btn btn-primary" name="simpan" value="Ganti Password Baru" />
        </div>
    </div>
</form>

<?php include ("inc_footer.php") ?>