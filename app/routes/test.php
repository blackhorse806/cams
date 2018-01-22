<?php

$app->get("/test", function() use ($app, $db) {
	
//    preg_match("/\d\d/i", "PHP is the 11 web scripting 1523 language of choice.", $result, PREG_OFFSET_CAPTURE);
//    var_dump($result);
//    
//    if ($result) {
//        echo "A match was found.";
//    } else {
//        echo "A match was not found.";
//    }
//    die();
    
//    $lastpos = 0;
//    $str = "200189 - Concepts of Mathematics, 200031 - Mathematics for Business, 300672 - Mathematics 1A, 300673 - Mathematics 1B, 200191 - Fundamentals of Mathematics, 300743 - Mathematics for Engineers Preliminary. 200191 or 300743 may be attempted prior to successful completion of 200237, BUT NOT after. Students may NOT enrol in both 200191 or 300743 and 200237 in the same semester.";
//    while (strlen($str) > 0) {
//        preg_match("/\d\d\d\d\d\d/i", $str, $result, PREG_OFFSET_CAPTURE);
//        if ($result) {
//            $pos = $result[0][1];
//            $newstr = substr($str, $lastpos, $pos);
//            echo $result[0][0] . ": " . $newstr . "<br>";
//            $str = substr($str, $pos + 6, strlen($str));
//        } else {
//            echo $str;
//            $str = null;
//        }
//        
//    }

    // Template processor instance creation
    
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('d16.docm');

    // Will clone everything between ${tag} and ${/tag}, the number of times. By default, 1.
    
    //$templateProcessor->deleteBlock('CLONEME');
    $templateProcessor->cloneBlock('CLONEME', 3);
    //var_dump($templateProcessor->getVariables());
//    $templateProcessor->setValue('CLONEME', "HELLO");
//    $templateProcessor->setValue('/CLONEME', "BYE");
    
    // Everything between ${tag} and ${/tag}, will be deleted/erased.
    //$templateProcessor->deleteBlock('DELETEME');

//    $templateProcessor->cloneRow("alt_num", 3);
//    $templateProcessor->cloneRow("d1", 3);
//    
//    $templateProcessor->setValue("alt_num#1", "1", 1);
//    $templateProcessor->setValue("alt_num#2", "2", 1);
//    $templateProcessor->setValue("alt_num#3", "2", 1);
//    $templateProcessor->setValue("d1", "and again", 1);
    
    $templateProcessor->saveAs('d16-out.docm');

    $unit = new Unit("1", $db);

    echo "<plaintext>";
    var_dump($unit->attribute('assessments')->get());
});