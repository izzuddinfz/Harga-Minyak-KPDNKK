<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.kpdnkk.gov.my/kpdnkk/harga-minyak-2017/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch); 

preg_match_all('/#cccccc;\">(.*)<\/div>/', $response, $matches);

echo '<p>'.$matches[1][0].': '.$matches[1][4].'<br/>';
echo $matches[1][1].': RM'.$matches[1][5].'<br/>';
echo $matches[1][2].': RM'.$matches[1][6].'<br/>';
echo $matches[1][3].': RM'.$matches[1][7].'</p>';
