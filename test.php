<?php
// Array keluarga
$data = array();

$kakek = array(
  "nama" => "Irfan",
  "nama" => "irhan"
);

$ayah = array(
  "nama" => "Rizal",
  "umur" => 50,
  "jenis_kelamin" => "Laki-laki",
  "hobi" => "Membaca"
);

$ibu = array(
  "nama" => "Rina",
  "umur" => 45,
  "jenis_kelamin" => "Perempuan",
  "hobi" => "Membaca"
);

$anak = array(
  "nama" => "Rizky",
  "umur" => 19,
  "jenis_kelamin" => "Laki-laki",
  "hobi" => "Membaca"
);

// $data['data'] = array(
//   "kakek" => $kakek,
//   "ayah" => $ayah,
//   "ibu" => $ibu,
//   "anak" => $anak
// );
// $data['data']['kakek'] = array(
//   "nama-kakek" => $kakek
// );
// $data['data']['kakek']['ayah']['anak'] = array(
//   $anak
// );

$kakek = array(
  "nama-kakek" => "Irfan",
  "orangtua" => array(
    "ayah" => array(
      "nama" => "Rizal",
      "umur" => 50,
      "jenis_kelamin" => "Laki-laki",
      "hobi" => "Membaca"
    ),
    "ibu" => array(
      "anak" => array(
        "nama" => "Rizky",
        "umur" => 19,
        "jenis_kelamin" => "Laki-laki",
        "hobi" => "Membaca"
      )
    )
  )
);

$data['data'] = array(
  "kakek" => $kakek
);

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
