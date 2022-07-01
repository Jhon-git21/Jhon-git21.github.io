<?php

$himpunan[3] = array(0,0,10,15);
$himpunan[4] = array(10,15,15,20);
$himpunan[5] = array(15,20,30,30);



// echo "<pre>";
// print_r($himpunan);
// echo "</pre>";

$v = 30;

foreach ($himpunan as $key => $nilai) {
    $bawah = $nilai[0];
    $t1 = $nilai[1];
    $t2 = $nilai[2];
    $atas = $nilai[3];


    if( ($bawah != $t1) and ($t1==$t2) ){
        
        if($bawah < $atas){
            if(($v <= $bawah) OR ($v >= $atas)){
                $keanggotaan[5][$key] = 0;
            }
            elseif (($v > $bawah) AND ($v <= $t1)) {
                $keanggotaan[5][$key] = round(($v - $bawah)/($t1 - $bawah),2);
            }
            elseif (($v > $t1) AND ($v <= $atas)) {
                $keanggotaan[5][$key] = round(($atas - $v)/($atas - $t1),2);
            }
        }
    }elseif(($bawah!==$t1) AND ($t1!==$t2)){
        if($v >= $t1){
            $keanggotaan[5][$key] = 1;
        }elseif(($v > $bawah) AND ($v < $t1)){
            $keanggotaan[5][$key] = round(($v - $bawah)/($t1 - $bawah),2);
        }elseif($v <= $bawah){
            $keanggotaan[5][$key] = 0;
        }
    }
    elseif (($bawah==$t1) AND ($bawah !== $t2) AND ($bawah!==$atas)) {
        if($v <= $t2) {
            $keanggotaan[5][$key] = 1;
        }elseif(($v > $t2) and ($v < $atas)){
            $keanggotaan[5][$key] = round(($atas - $v)/($atas - $t2),2);
        }elseif($v >= $atas){
            $keanggotaan[5][$key] = 0;
        }
    }
}

// echo "<pre>";
// print_r($keanggotaan);
// echo "</pre>";

$rumus[1] = array(
    'nama' => 'Kurang 1%',
    'rumus' => 'x >= 1%',
    'nilai' => '4',
    'logika' => true
);

// $rumus[2] = array(
//     'nama' => 'Minimal 1%',
//     'rumus' => 'x >= 1%',
//     'nilai' => '4',
//     'logika' => true
// );

$rumus[2] = array(
    'nama' => 'Kurang 1%',
    'rumus' => 'x < 1%',
    'nilai' => '2 + ( x * 200 )',
    'logika' => false
);

$capaian['nilai'] = '0.25%';
$capaian['satuan_target'] = '%';
if($capaian['satuan_target'] == '%'){
    $nilai = (str_replace("%","",$capaian['nilai'])/100);
}else{
    $nilai = $capaian['nilai'];
}

echo "<pre>";
print_r($rumus);
echo "</pre>";

foreach($rumus as $key => $v){


    if($v['logika'] == true){
        $logika = byRumus($v['rumus']);
        $hasil = eval('return '.$logika.';');
        if($hasil){
            echo $v['nilai'];
        }
    }else{
        $logika = byRumus($v['nilai']);
        $hasil = eval('return '.$logika.';');
        if($hasil == true){
            echo $hasil;
        }
    }
    
    
}

function byRumus($v){
    $variabel = str_replace("x",'$nilai',$v);
    $persen = str_replace("%","",$variabel);
    return $persen;
}



?>