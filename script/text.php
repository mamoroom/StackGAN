<?php
$command2json = '/home/ubuntu/anaconda3/bin/python dic2json.py';

$input='{ doc_length : 201, filenames : "/home/ubuntu/StackGAN/Data/birds/example_captions.t7", queries : "/home/ubuntu/StackGAN/Data/birds/example_captions.txt", net_txt : "/home/ubuntu/StackGAN/models/text_encoder/lm_sje_nc4_cub_hybrid_gru18_a1_c512_0.00070_1_10_trainvalids.txt_iter30000.t7"}';
$ret = exec("$command2json '$input'", $json);
#print_r($ret);
var_dump(json_decode($ret));
?>
