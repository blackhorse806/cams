<?php

$app->get("/variation/:variation_id/download", function($variation_id) use ($app, $db) {
    // Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        	@apache_setenv('no-gzip', 1);
            //header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			header('Content-Type: application/vnd.ms-word.document.macroEnabled.12');
            header("Content-Disposition: inline; filename=\"{$variation_id}.docm\"");
            header('Content-Transfer-Encoding: binary');
            header("Content-length: " . filesize("../generated/{$variation_id}.docm"));
            header('Accept-Ranges: bytes');

            // add these two lines
            ob_clean();   // discard any data in the output buffer (if possible)
            flush();      // flush headers (if possible)

            readfile("../generated/{$variation_id}.docm");
            exit();
    } else {
        $app->redirect('/');
    }
})->name('/variation/download');
