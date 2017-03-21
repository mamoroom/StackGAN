<?php


	ini_set( 'display_errors', 1 );
$ran = makeRandStr(10);
$file = __dir__.'/data/'.$ran.'.txt';

$current = $_POST["text"];
$type = $_POST["type"];
file_put_contents($file, $current);

chdir('/home/ubuntu/StackGAN/');

if($type == "bird"){
	$command = '/bin/bash demo/birds_demo.sh';
}else if($type == "flower"){
	$command = '/bin/bash demo/flowers_demo.sh';
}
$command2json = '/home/ubuntu/anaconda3/bin/python script/dic2json.py';


$output=array();
$ret=null;
#exec ( $command, $output, $ret );
exec("$command ".$file." ".$ran." 2> /dev/null &", $output);
$py_dictionary_str = "";
foreach ($output as $line) {
    $py_dictionary_str .= $line;
    if (!preg_match("/{|}/", $line)) $py_dictionary_str .= ",";
}
#var_dump($json_string);
/*
$json_str = exec("$command2json '$py_dictionary_str'");
print_r(json_decode($json_str));
*/

echo $ran;

function makeRandStr($length) {
    $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
    $r_str = null;
    for ($i = 0; $i < $length; $i++) {
        $r_str .= $str[rand(0, count($str) - 1)];
    }
    return $r_str;
}
?>
