<?php

$app->get("/variation/:variation_id/generate", function($variation_id) use ($app, $db, $constants) {
	// $stmt = $db->query('SELECT * FROM volume WHERE NOT is_hidden ORDER BY vol_id DESC LIMIT 25');
	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// $app->render("home.twig", ["name" => $name, "volumes" => $results]);
	//
	$d16 = new D16($variation_id, $db, $constants);
	$d16->generate();
    echo "success";
    
	//echo "<br><a href='/variation/"  . $variation_id . "/get_d16'>Download</a>";

})->name('/variation/generate');
