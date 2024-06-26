<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $id = $_GET['id'];
        $nama = $_POST['nama_pustakawan'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE pustakawan SET nama_pustakawan='$nama',alamat='$alamat' WHERE id_pustakawan = '$id'";
        $conn->query($sql);

        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = array(
           'nama_pustakawan' => $nama,
            'alamat' => $alamat,
           
        );

    }
    else {
        $result['status']['code'] = 400;
    }

    // menampilkan data json dari database
    $json = json_encode($result);
    print_r($json);
?>