<?php

$app->get("/variation/:variation_id/get_d16", function($variation_id) use ($app, $db) {
	//check_login($app);

	//header("Content-length: " . filesize('config.ini'));
	//header("Content-Disposition: attachment; filename=\"{$_GET['name']}\" ");
	//header("Content-Disposition: attachment; filename=test.pdf");
	//header('Content-type: application/zip');
	@apache_setenv('no-gzip', 1);
	header("Content-type: application/docm");
	header("Content-Disposition: inline; filename=\"{$variation_id}.docm\"");
	header('Content-Transfer-Encoding: binary');
	header("Content-length: " . filesize("../generated/{$variation_id}.docm"));
	header('Accept-Ranges: bytes');

	// add these two lines
	ob_clean();   // discard any data in the output buffer (if possible)
	flush();      // flush headers (if possible)

	readfile("../generated/{$variation_id}.docm");
	exit();

})->name('/variation/get_d16');
