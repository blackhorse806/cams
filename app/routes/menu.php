<?php

$app->get("/menu", function() use ($app) {


	$variations = array(array(
		'id' => '1',
		'type' => 'unit',
		'code' => '300766',
		'name' => 'Hydrology',
		'owner' => 'Thomas Nixon',
		'state' => 'Edit'
	));

	$app->render("menu.twig", array("variations" => $variations));
});
