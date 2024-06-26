<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $id = $_GET['id'];
        $nama = $_POST['judul_buku'];
        $alamat = $_POST['pengarang'];

        $sql = "UPDATE buku SET judul_buku='$nama',pengarang='$alamat' WHERE id_buku = '$id'";
        $conn->query($sql);

        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = array(
           'judul_buku' => $nama,
            'pengarang' => $alamat,
           
        );

    }
    else {
        $result['status']['code'] = 400;
    }

    // menampilkan data json dari database
    $json = json_encode($result);
    print_r($json);
?>