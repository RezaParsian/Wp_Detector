<?php
header("Content-type: application/json; charset=utf-8");

$site=isset($_GET["site"]) ? $_GET["site"] : "I Think You Miss Some Parameter";
$re = '/themes\/(?<Theme_Name>.*?)\//ms';
$re1 = '/<meta name="generator" content="(?<Wpv>.*?)" \/>/ms';

$Result;

if($site=="I Think You Miss Some Parameter"){
    $Result=array(
        'Error'=>$site
    );
}else {
    $file=file_get_contents($site);

    preg_match($re1,$file,$matches1);
    preg_match($re,$file,$matches);
    $Result=array(
        'WordPress_Version'=>$matches1['Wpv'],
        'WordPress_Theme'=>$matches['Theme_Name']
    );
    
}
$myJSON =json_encode($Result);

echo $myJSON;