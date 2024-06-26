<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $_POST['id_buku'];
        $id_pustakawan = $_POST['id_pustakawan'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST[tanggal_pengembalian'];
        

        $sql = "INSERT INTO `peminjaman`(`id_anggota`,`id_buku`,`id_pustakawan`,`tanggal_peminjaman`,`tanggal_pengembalian`) VALUES ('$id_anggota','$id_buku','$id_pustakawan','$tanggal_peminjaman','$tanggal_pengembalian')";
        $conn->query($sql);

        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = array(
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'id_pustakawan' => $id_pustakawan,
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggal_pengembalian,
        );

    }
    else {
        $result['status']['code'] = 400;
    }

    // menampilkan data json dari database
    $json = json_encode($result);
    print_r($json);
?>