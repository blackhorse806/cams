<?php

$app->get("/variation/import_select", function() use ($app, $db, $user) {
	$user['navigation']->push(["Import", $app->request->getResourceUri()]);
    $lgms_db = new PDO(
            "mysql:host=127.0.0.1" .
            ";dbname=lg",
            "root",
            "",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
    $units = null;
    $stmt = $lgms_db->query("SELECT unit_code, unit_name FROM unit ORDER BY unit_code");
    if ($stmt != false) {
        $units = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $app->render("/variation/import_select.twig", $arrayName = array(
            'units' => $units,
			'user' => $user,
        ));

})->name('/variation/import_select');
