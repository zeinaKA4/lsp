<?php 
//file koneksi php dengan mysql/database
$host="localhost";
$user="root";
$pass="";
$db="lsp1";

$koneksi=mysqli_connect($host, $user, $pass, $db);

if( !$koneksi) {
    die ("Koneksi Gagal");
}
