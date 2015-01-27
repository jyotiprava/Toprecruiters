<?php

$filename="madhusmita.docx";
	$TXTfilename = $filename . ".txt";
	$word = new COM("word.application") or die("Unable to instantiate Word object");
	$word->Documents->Open($filename);	
	$word->Documents[1]->SaveAs($TXTfilename ,2);
	$word->Documents[1]->Close(false);
	$word->Quit();
    $word->Release();
	$word = NULL;
	
	$content = file_get_contents($TXTfilename);
	
	echo  $content;
?>