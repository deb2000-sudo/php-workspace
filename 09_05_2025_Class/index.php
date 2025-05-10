<?php

$name="             Debashis Nayak                  ";
$nametrimmed=trim($name);
echo $name."\n";
echo $nametrimmed."\n";
$nameLen=strlen($name);
echo $nameLen."\n";
$nametrimmedLen=strlen($nametrimmed);
echo $nametrimmedLen."\n";
$test="H          e l l o";
$word_count=str_word_count($test,0,$nametrimmedLen);
echo $word_count."\n";

?>