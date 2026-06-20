<?php
$tipe = $_GET['tipe'] ?? '';

// Jalur absolut langsung menuju folder di luar root web
$base_path = '/var/www/data/'; 

$file_map = [
    'kecamatan' => $base_path . 'jambi_kecamatan.geojson',
    'kelurahan' => $base_path . 'jambi_kelurahan.geojson',
    'rt'        => $base_path . 'jambi_sls.geojson'
];

if (array_key_exists($tipe, $file_map)) {
    $file_path = $file_map[$tipe];
    
    if (file_exists($file_path)) {
        header('Content-Type: application/json');
        echo file_get_contents($file_path);
        exit;
    }
}

header('HTTP/1.0 404 Not Found');
echo json_encode(['error' => 'Data tidak ditemukan']);