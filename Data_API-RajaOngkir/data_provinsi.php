<?php

$curl = curl_init();


curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
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
    //dapat data nya dalam bentuk json
    //kita konversikan ke array doloe
    $array_response = json_decode($response, TRUE);
    $data_provinsi  = $array_response['rajaongkir']['results'];

    echo "<option value=''>--Pilih Provinsi--</option>";
    foreach ($data_provinsi as $key => $tiap_provinsi) {


        echo "<option value='" . $tiap_provinsi['province_id'] . "' id_provinsi='" . $tiap_provinsi['province_id'] . "' >";
        echo $tiap_provinsi['province'];
        echo "</option>";
    }
}
