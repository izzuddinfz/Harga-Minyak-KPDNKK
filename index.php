<?php
function checkinc($no1, $no2)
{
    $diff = abs($no1-$no2);
    if($no1>$no2){
        $echo = 'naik';
        $color = '#FF0000';
    } else {
        $echo = 'turun';
        $color = '#008000';
    }
    return '<span style="color:'.$color.'">('. $echo .' '.($diff).')</span>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.kpdnkk.gov.my/kpdnkk/harga-minyak-2017/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch); 
$data = preg_match_all('/#cccccc;\">(.*)<\/div>/', $response, $matches);
echo '<h2>HARGA MINYAK PETROL RON95, RON97, DIESEL SEMASA DI MALAYSIA</h2>';
echo '<p>'.strip_tags($matches[1][0]).': '.$matches[1][$data-4].'<br/>';
echo strip_tags($matches[1][1]).': RM'.$matches[1][$data-3].' '.checkinc($matches[1][$data-3],$matches[1][$data-7]).'<br/>';
echo strip_tags($matches[1][2]).': RM'.$matches[1][$data-2].' '.checkinc($matches[1][$data-2],$matches[1][$data-6]).'<br/>';
echo strip_tags($matches[1][3]).': RM'.$matches[1][$data-1].' '.checkinc($matches[1][$data-1],$matches[1][$data-5]).'</p>';
