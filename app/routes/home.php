<?php

$app->get("/home", function($name = "World") use ($app, $db, $user) {
    $user['navigation']->push(["Home", $app->request->getResourceUri()]);

    // Get request object


	$app->render("/home.twig", $arrayName = array(
		'user' => $user,
	));
})->name('/home');
