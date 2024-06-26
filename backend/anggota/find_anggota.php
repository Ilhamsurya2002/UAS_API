<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM anggota where id_anggota = '$id'";
        $data = $conn->query($sql);
        $dataUser = array();
        while($row = $data->fetch_assoc()){
            $dataUser[] = $row;
        }
        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = $dataUser;
    }else{
        $result['status']['success'] = true;
        $result['status']['code'] = 400;
        $result['status']['description'] = 'Request Not Valid'; 
        $result['hasil'] = array(
            'dataBuku' => "tidak ada",
        );
    }
    $json = json_encode($result);
    print_r($json);

?>