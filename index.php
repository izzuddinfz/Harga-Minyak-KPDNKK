<?php
function checkinc($no1, $no2)
{
    $diff = abs($no1-$no2);
    if($no1>$no2){
        $echo = '+';
        $color = '#FF0000';
    } else {
        $echo = '-';
        $color = '#008000';
    }
    return '<span style="color:'.$color.'">('. $echo .' '.($diff).')</span>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.kpdnkk.gov.my/kpdnkk/harga-minyak-2017/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch); 
$data = preg_match_all('/#cccccc;\">(.*)<\/div>/', $response, $matches);
?>
<body>
    <table>
        <tr>
            <th colspan="2">Harga Petrol</th>
        </tr>
        <tr>
            <td>RON 95</td>
            <td>RM<? echo number_format((float)$matches[1][$data-2], 2, '.', '') . ' ' . checkinc($matches[1][$data-2],$matches[1][$data-6]) ?></td>
        </tr>
        <tr>
            <td>RON 97</td>
            <td>RM<? echo number_format((float)$matches[1][$data-3], 2, '.', '') . ' ' . checkinc($matches[1][$data-3],$matches[1][$data-7]) ?></td>
        </tr>
        <tr>
            <td>RON 100</td>
            <td></td>
        </tr>
        <tr>
            <td>VPR</td>
            <td>RM<? echo number_format(((float)$matches[1][$data-3])+0.70, 2, '.', '') ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <th colspan="2">Harga Diesel</th>
        </tr>
        <tr>
            <td>EURO 2M</td>
            <td>RM<? echo number_format((float)$matches[1][$data-1], 2, '.', '') . ' ' . checkinc($matches[1][$data-1],$matches[1][$data-5]) ?></td>
        </tr>
        <tr>
            <td>EURO 5</td>
            <td>RM<? echo number_format(((float)$matches[1][$data-1])+0.10, 2, '.', '') . ' ' . checkinc($matches[1][$data-1],$matches[1][$data-5]) ?></td>
        </tr>
    </table>
    <p>Harga Minyak Bagi Tempoh <span style="text-transform: capitalize;"><? echo strtolower($matches[1][$data-4]) ?></span>.</p>
</body>
