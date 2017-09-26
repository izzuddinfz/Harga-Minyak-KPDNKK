<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.kpdnkk.gov.my/kpdnkk/harga-minyak-2017/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch); 

preg_match_all('/#cccccc;\">(.*)<\/div>/', $response, $matches);
echo '<h2>HARGA MINYAK PETROL RON95, RON97, DIESEL SEMASA DI MALAYSIA</h2>';
echo '<p>'.$matches[1][0].': '.$matches[1][4].'<br/>';
echo $matches[1][1].': RM'.$matches[1][5].'<br/>';
echo $matches[1][2].': RM'.$matches[1][6].'<br/>';
echo $matches[1][3].': RM'.$matches[1][7].'</p>';
$beza1 = $matches[1][5]-$matches[1][9];
$beza2 = $matches[1][6]-$matches[1][10];
$beza3 = $matches[1][7]-$matches[1][11];
echo '<h2>PERBANDINGAN DENGAN MINGGU LEPAS (tanda negatif bermaksud harga semasa lebih rendah)</h2>';
echo '<p>Beza '.$matches[1][1].': RM'.$beza1.'<br/>';
echo 'Beza '.$matches[1][2].': RM'.$beza2.'<br/>';
echo 'Beza '.$matches[1][3].': RM'.$beza3.'</p>';
