<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $nama = $_POST['judul_buku'];
        $alamat = $_POST['pengarang'];
        

        $sql = "INSERT INTO `buku`(`judul_buku`, `pengarang`) VALUES ('$nama','$alamat')";
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