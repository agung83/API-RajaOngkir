<?php

//ambil post
$id_provinsi_terpilih = $_POST['id_provinsi'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $id_provinsi_terpilih,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 426e6b6e16fcd7eb92366e09ac0abea5"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array_distrik =  json_decode($response, TRUE);
    // echo "<pre>";
    // print_r($array_distrik);
    // echo "</pre>";
    // exit;
    $data_distrik = $array_distrik["rajaongkir"]["results"];


    echo "<option value=''>--pilih--</option>";

    foreach ($data_distrik as $key => $tiap_distrik) {



        echo "<option value=''
        id_distrik ='" . $tiap_distrik['city_id'] . "'
        nama_provinsi='" . $tiap_distrik['province'] . "'
        nama_distrik='" . $tiap_distrik['city_name'] . "'
        tipe_distrik='" . $tiap_distrik['type'] . "'
        kode_pos='" . $tiap_distrik['postal_code'] . "'
        >";
        echo $tiap_distrik["type"] . " ";
        echo $tiap_distrik["city_name"];
        echo "</option>";
    }
}
