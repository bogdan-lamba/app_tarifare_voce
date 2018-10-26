<?php
$errors = array();

for ($i=date('Y')-4; $i<=date('Y'); $i++){
    $years[]=$i;
}
rsort($years);

$months=array(
    '01' => '01 Ianuarie',
    '02' => '02 Februarie',
    '03' => '03 Martie',
    '04' => '04 Aprilie',
    '05' => '05 Mai',
    '06' => '06 Iunie',
    '07' => '07 Iulie',
    '08' => '08 August',
    '09' => '09 Septembrie',
    '10' => '10 Octombrie',
    '11' => '11 Noiembrie',
    '12' => '12 Decembrie',
);

$exclude=array('lte_test', 'Vipnet', 'gts', 'iristel', 'euroweb', 'INES', 'dial-interconect', 'intersat', 'mediasat',
    'radiocom', 'netconnect', 'vivatelecom', 'rds', 'RTC', 'COSM', 'ORG', 'VDF', 'UPC');
$exclude = implode('\',\'',$exclude);
$exclude = "('{$exclude}')";

$acc = $pdo_cdr->query("
                  SELECT * 
                  FROM trf_accounts 
                  WHERE account NOT LIKE 'MSC_%' AND account!='' AND account NOT LIKE '%MVNO%' AND account NOT IN {$exclude} 
                  ORDER BY account ASC
                  ");//fara rds si %mvno% fara nter tot ce e la reports trafic_voce
while($row=$acc->fetch())
{
    $accounts[] = $row['account'];
}

$file_path=__DIR__.'/../storage/csv/';


