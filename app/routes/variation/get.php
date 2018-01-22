<?php
//
// // ************************************************************************************
// // Courses
// // ************************************************************************************
//
//
// $app->get("/variation/:variation_id/get/courses", function($variation_id) use ($app, $db) {
// 	// $stmt = $db->query('SELECT * FROM volume WHERE NOT is_hidden ORDER BY vol_id DESC LIMIT 25');
// 	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	// $app->render("home.twig", ["name" => $name, "volumes" => $results]);
// 	//
// 	$unit = new Unit($variation_id, $db);
// 	$courses = $unit->attribute('courses')->get();
//
// 	echo json_encode($courses);
//
// })->name('/variation/get/courses');
//
// $app->post("/variation/:variation_id/put/courses", function($variation_id) use ($app, $db) {
// 	// $stmt = $db->query('SELECT * FROM volume WHERE NOT is_hidden ORDER BY vol_id DESC LIMIT 25');
// 	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	// $app->render("home.twig", ["name" => $name, "volumes" => $results]);
// 	//
//
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('courses')->save($data);
// 	$unit->attribute('courses')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/courses');
//
//
// // ************************************************************************************
// // Assessments
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/assessments", function($variation_id) use ($app, $db) {
// 	// $stmt = $db->query('SELECT * FROM volume WHERE NOT is_hidden ORDER BY vol_id DESC LIMIT 25');
// 	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	// $app->render("home.twig", ["name" => $name, "volumes" => $results]);
// 	//
// 	$unit = new Unit($variation_id, $db);
// 	$assessments = $unit->attribute('assessments')->get();
//
// 	echo json_encode($assessments);
//
// })->name('/variation/get/assessments');
//
// $app->post("/variation/:variation_id/put/assessments", function($variation_id) use ($app, $db) {
// 	// $stmt = $db->query('SELECT * FROM volume WHERE NOT is_hidden ORDER BY vol_id DESC LIMIT 25');
// 	// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	// $app->render("home.twig", ["name" => $name, "volumes" => $results]);
// 	//
//
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('assessments')->save($data);
// 	$unit->attribute('assessments')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/assessments');
//
//
//
// // ************************************************************************************
// // Unit Outcomes
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/outcomes", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$outcomes = $unit->attribute('outcomes')->get();
// 	echo json_encode($outcomes);
// })->name('/variation/get/outcomes');
//
// $app->post("/variation/:variation_id/put/outcomes", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('outcomes')->save($data);
// 	$unit->attribute('outcomes')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/outcomes');
//
//
// // ************************************************************************************
// // Prerequisite
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/prerequisite", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$prerequisite = $unit->attribute('prerequisite')->get();
// 	if ($prerequisite != null) {
// 		echo json_encode($prerequisite);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/prerequisite');
//
// $app->post("/variation/:variation_id/put/prerequisite", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('prerequisite')->save($data);
// 	$unit->attribute('prerequisite')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/prerequisite');
//
//
// // ************************************************************************************
// // Corequisite
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/corequisite", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$corequisite = $unit->attribute('corequisite')->get();
// 	if ($corequisite != null) {
// 		echo json_encode($corequisite);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/corequisite');
//
// $app->post("/variation/:variation_id/put/corequisite", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('corequisite')->save($data);
// 	$unit->attribute('corequisite')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/corequisite');
//
//
// // ************************************************************************************
// // Equivalent
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/equivalent", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$equivalent = $unit->attribute('equivalent')->get();
// 	if ($equivalent != null) {
// 		echo json_encode($equivalent);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/equivalent');
//
// $app->post("/variation/:variation_id/put/equivalent", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('equivalent')->save($data);
// 	$unit->attribute('equivalent')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/equivalent');
//
//
//
// // ************************************************************************************
// // Incompatible
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/incompatible", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$incompatible = $unit->attribute('incompatible')->get();
// 	if ($incompatible != null) {
// 		echo json_encode($incompatible);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/incompatible');
//
// $app->post("/variation/:variation_id/put/incompatible", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('incompatible')->save($data);
// 	$unit->attribute('incompatible')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/incompatible');
//
//
// // ************************************************************************************
// // Accreditation
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/accreditation", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$accreditation = $unit->attribute('accreditation')->get();
// 	if ($accreditation != null) {
// 		echo json_encode($accreditation);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/accreditation');
//
// $app->post("/variation/:variation_id/put/accreditation", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('accreditation')->save($data);
// 	$unit->attribute('accreditation')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/accreditation');
//
//
// // ************************************************************************************
// // Discontinuation
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/discontinuation", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$discontinuation = $unit->attribute('discontinuation')->get();
// 	if ($discontinuation != null) {
// 		echo json_encode($discontinuation);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/discontinuation');
//
// $app->post("/variation/:variation_id/put/discontinuation", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('discontinuation')->save($data);
// 	$unit->attribute('discontinuation')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/discontinuation');
//
//
// // ************************************************************************************
// // Discontinuation Arrangements
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/discontinuation_arrangements", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$discontinuation_arrangements = $unit->attribute('discontinuation_arrangements')->get();
// 	if ($discontinuation_arrangements != null) {
// 		echo json_encode($discontinuation_arrangements);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/discontinuation_arrangements');
//
// $app->post("/variation/:variation_id/put/discontinuation_arrangements", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('discontinuation_arrangements')->save($data);
// 	$unit->attribute('discontinuation_arrangements')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/discontinuation_arrangements');
//
//
// // ************************************************************************************
// // Offerings
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/offerings", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$offerings = $unit->attribute('offerings')->get();
// 	if ($offerings != null) {
// 		echo json_encode($offerings);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/offerings');
//
// $app->post("/variation/:variation_id/put/offerings", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('offerings')->save($data);
// 	$unit->attribute('offerings')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/offerings');
//
//
// // ************************************************************************************
// // Timetabling
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/timetabling", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$timetabling = $unit->attribute('timetabling')->get();
// 	if ($timetabling != null) {
// 		echo json_encode($timetabling);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/timetabling');
//
// $app->post("/variation/:variation_id/put/timetabling", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('timetabling')->save($data);
// 	$unit->attribute('timetabling')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/timetabling');
//
//
//
// // ************************************************************************************
// // Timetabling
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/schools", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$schools = $unit->attribute('responsible_schools')->get();
// 	if ($schools != null) {
// 		echo json_encode($schools);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/schools');
//
// $app->post("/variation/:variation_id/put/schools", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('responsible_schools')->save($data);
// 	$unit->attribute('responsible_schools')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/schools');
//
//
// // ************************************************************************************
// // Work Integrated Learning
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/wil", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$wil = $unit->attribute('work_integrated_learning')->get();
// 	if ($wil != null) {
// 		echo json_encode($wil);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/wil');
//
// $app->post("/variation/:variation_id/put/wil", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('work_integrated_learning')->save($data);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/wil');
//
//
// // ************************************************************************************
// // Readings
// // ************************************************************************************
//
// $app->get("/variation/:variation_id/get/readings", function($variation_id) use ($app, $db) {
// 	$unit = new Unit($variation_id, $db);
// 	$readings = $unit->attribute('readings')->get();
// 	if ($readings != null) {
// 		echo json_encode($readings);
// 	} else{
// 		echo "null";
// 	}
// })->name('/variation/get/readings');
//
// $app->post("/variation/:variation_id/put/readings", function($variation_id) use ($app, $db) {
//
// 	// Get date from post
// 	$data = json_decode($app->request->post('data'),true);
// 	$delete = json_decode($app->request->post('delete'),true);
//
// 	// Make sure everything worked
// 	$success = true;
//
// 	$unit = new Unit($variation_id, $db);
// 	$unit->attribute('readings')->save($data);
// 	$unit->attribute('readings')->delete($delete);
//
// 	// Send response
// 	echo "success";
//
// })->name('/variation/put/readings');

// ************************************************************************************
// Unit Code and Name
// ************************************************************************************

$app->get("/variation/:variation_id/get/core", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$courses = $unit->attribute('courses')->get();
	$outcomes = $unit->attribute('outcomes')->get();
	$core["courses"] = $courses;
	$core["outcomes"] = $outcomes;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/core');

$app->post("/variation/:variation_id/put/core", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('unit_code', $data["unit_code"]);
	$unit->attribute('core')->save_attribute('unit_name', $data["unit_name"]);
	$unit->attribute('core')->save_attribute("new_unit_rationale", $data["new_unit_rationale"]);
	$unit->attribute('core')->save_attribute("variation_changes", $data["variation_changes"]);
	$unit->attribute('core')->save_attribute("variation_rationale", $data["variation_rationale"]);
	$unit->attribute('core')->save_attribute("variation_impact", $data["variation_impact"]);
	$unit->attribute('core')->save_attribute("implementation_session", $data["implementation_session"]);
	$unit->attribute('core')->save_attribute("implementation_year", $data["implementation_year"]);
	$unit->attribute('core')->save_attribute("school", $data["school"]);
	$unit->attribute('core')->save_attribute("discipline_code", $data["discipline_code"]);
	$unit->attribute('core')->save_attribute("handbook_summary", $data["handbook_summary"]);
	$unit->attribute('courses')->save($data["courses"]);
	$unit->attribute('courses')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/core');


// ************************************************************************************
// Section2-1
// ************************************************************************************

$app->get("/variation/:variation_id/get/section2-1", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$outcomes = $unit->attribute('outcomes')->get();
	$core["outcomes"] = $outcomes;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section2-1');

$app->post("/variation/:variation_id/put/section2-1", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('unit_level', $data["unit_level"]);
	$unit->attribute('core')->save_attribute('credit_points', $data["credit_points"]);
	$unit->attribute('core')->save_attribute("credit_points_rationale", $data["credit_points_rationale"]);
	$unit->attribute('core')->save_attribute("unit_content", $data["unit_content"]);
	$unit->attribute('outcomes')->save($data["outcomes"]);
	$unit->attribute('outcomes')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/section2-1');


// ************************************************************************************
// Section2-5
// ************************************************************************************

$app->get("/variation/:variation_id/get/section2-5", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$assessments = $unit->attribute('assessments')->get();
	$core["assessments"] = $assessments;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section2-5');

$app->post("/variation/:variation_id/put/section2-5", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('three_hour_exam', $data["three_hour_exam"]);
	$unit->attribute('core')->save_attribute('unit_threshold', $data["unit_threshold"]);
	$unit->attribute('core')->save_attribute("assessments_not_mandatory", $data["assessments_not_mandatory"]);
	$unit->attribute('core')->save_attribute("attendance_requirements", $data["attendance_requirements"]);
	$unit->attribute('assessments')->save($data["assessments"]);
	$unit->attribute('assessments')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/section2-5');


// ************************************************************************************
// Section2-6
// ************************************************************************************

$app->get("/variation/:variation_id/get/section2-6", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$prerequisite = $unit->attribute('prerequisite')->get();
	$corequisite = $unit->attribute('corequisite')->get();
	$equivalent = $unit->attribute('equivalent')->get();
	$incompatible = $unit->attribute('incompatible')->get();
	$core["prerequisite"] = $prerequisite;
	$core["corequisite"] = $corequisite;
	$core["equivalent"] = $equivalent;
	$core["incompatible"] = $incompatible;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section2-6');

$app->post("/variation/:variation_id/put/section2-6", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('assumed_knowledge', $data["assumed_knowledge"]);
	$unit->attribute('core')->save_attribute('enrolment_restrictions', $data["enrolment_restrictions"]);
	$unit->attribute('core')->save_attribute("legislative_prerequisites", $data["legislative_prerequisites"]);
	$unit->attribute('core')->save_attribute("essential_equipment", $data["essential_equipment"]);
	$unit->attribute('prerequisite')->save($data["prerequisite"]);
	$unit->attribute('prerequisite')->delete($delete['prerequisite']);
	$unit->attribute('corequisite')->save($data["corequisite"]);
	$unit->attribute('corequisite')->delete($delete['corequisite']);
	$unit->attribute('equivalent')->save($data["equivalent"]);
	$unit->attribute('equivalent')->delete($delete['equivalent']);
	$unit->attribute('incompatible')->save($data["incompatible"]);
	$unit->attribute('incompatible')->delete($delete['incompatible']);


	// Send response
	echo "success";

})->name('/variation/put/section2-6');


// ************************************************************************************
// Section2-13
// ************************************************************************************

$app->get("/variation/:variation_id/get/section2-13", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$wil = $unit->attribute('work_integrated_learning')->get();
	if ($wil != null) {
		echo json_encode($wil);
	} else{
		echo "null";
	}
})->name('/variation/get/section2-13');

$app->post("/variation/:variation_id/put/section2-13", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('work_integrated_learning')->save($data);

	// Send response
	echo "success";

})->name('/variation/put/section2-13');


// ************************************************************************************
// Section2-14
// ************************************************************************************

$app->get("/variation/:variation_id/get/section2-14", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$accreditation = $unit->attribute('accreditation')->get();
	$core["accreditation"] = $accreditation;

	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section2-14');

$app->post("/variation/:variation_id/put/section2-14", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('sustainability', $data["sustainability"]);
	$unit->attribute('core')->save_attribute('sustainability_content_items', $data["sustainability_content_items"]);
	$unit->attribute('core')->save_attribute("atsi_graduate_attributes", $data["atsi_graduate_attributes"]);
	$unit->attribute('core')->save_attribute("atsi_content_items", $data["atsi_content_items"]);
	$unit->attribute('core')->save_attribute("accreditation_information", $data["accreditation_information"]);
	$unit->attribute('core')->save_attribute("accreditation_dap_consultation", $data["accreditation_dap_consultation"]);
	$unit->attribute('accreditation')->save($data["accreditation"]);
	$unit->attribute('accreditation')->delete($delete);


	// Send response
	echo "success";

})->name('/variation/put/section2-14');


// ************************************************************************************
// Section3-1
// ************************************************************************************

$app->get("/variation/:variation_id/get/section3-1", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$discontinuation = $unit->attribute('discontinuation')->get();
	$discontinuation_arrangements = $unit->attribute('discontinuation_arrangements')->get();
	$core["discontinuation"] = $discontinuation;
	$core["discontinuation_arrangements"] = $discontinuation_arrangements;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section3-1');

$app->post("/variation/:variation_id/put/section3-1", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('discontinuation')->save($data["discontinuation"]);
	$unit->attribute('discontinuation')->delete($delete['discontinuation']);
	$unit->attribute('discontinuation_arrangements')->save($data["discontinuation_arrangements"]);
	$unit->attribute('discontinuation_arrangements')->delete($delete['discontinuation_arrangements']);


	// Send response
	echo "success";

})->name('/variation/put/section3-1');


// ************************************************************************************
// Section3-2
// ************************************************************************************

$app->get("/variation/:variation_id/get/section3-2", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$offerings = $unit->attribute('offerings')->get();
	$timetabling = $unit->attribute('timetabling')->get();
	$core["offerings"] = $offerings;
	$core["timetabling"] = $timetabling;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section3-2');

$app->post("/variation/:variation_id/put/section3-2", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('unit_international_available', $data["unit_international_available"]);
	$unit->attribute('core')->save_attribute('international_unit_offering', $data["international_unit_offering"]);
	$unit->attribute('offerings')->save($data["offerings"]);
	$unit->attribute('offerings')->delete($delete['offerings']);
	$unit->attribute('timetabling')->save($data["timetabling"]);
	$unit->attribute('timetabling')->delete($delete['timetabling']);


	// Send response
	echo "success";

})->name('/variation/put/section3-2');


// ************************************************************************************
// Section3-3
// ************************************************************************************

$app->get("/variation/:variation_id/get/section3-3", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$readings = $unit->attribute('readings')->get();
	$core["readings"] = $readings;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section3-3');

$app->post("/variation/:variation_id/put/section3-3", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('equivalent_learning_experience', $data["equivalent_learning_experience"]);
	$unit->attribute('core')->save_attribute('non_university_facilities', $data["non_university_facilities"]);
	$unit->attribute('core')->save_attribute('clinical_placement', $data["clinical_placement"]);
	$unit->attribute('core')->save_attribute('industrial_experience', $data["industrial_experience"]);
	$unit->attribute('core')->save_attribute('practice_teaching', $data["practice_teaching"]);
	$unit->attribute('core')->save_attribute('other_educational_activities', $data["other_educational_activities"]);
	$unit->attribute('core')->save_attribute('internships', $data["internships"]);
	$unit->attribute('core')->save_attribute('teach_external_partner', $data["teach_external_partner"]);
	$unit->attribute('core')->save_attribute('external_monitor_activities', $data["external_monitor_activities"]);
	$unit->attribute('core')->save_attribute('external_delivery_arrangements', $data["external_delivery_arrangements"]);
	$unit->attribute('readings')->save($data["readings"]);
	$unit->attribute('readings')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/section3-3');


// ************************************************************************************
// Section3-7
// ************************************************************************************

$app->get("/variation/:variation_id/get/section3-7", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$responsible_schools = $unit->attribute('responsible_schools')->get();
	$core["responsible_schools"] = $responsible_schools;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section3-7');

$app->post("/variation/:variation_id/put/section3-7", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('admin_school', $data["admin_school"]);
	$unit->attribute('core')->save_attribute('admin_contact', $data["admin_contact"]);
	$unit->attribute('core')->save_attribute('admin_extension', $data["admin_extension"]);
	$unit->attribute('core')->save_attribute('admin_email', $data["admin_email"]);
	$unit->attribute('responsible_schools')->save($data["responsible_schools"]);
	$unit->attribute('responsible_schools')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/section3-7');


// ************************************************************************************
// Section4-1
// ************************************************************************************

$app->get("/variation/:variation_id/get/section4-1", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section4-1');

$app->post("/variation/:variation_id/put/section4-1", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);

	$unit->attribute('core')->save_attribute('checklist_school', $data["checklist_school"]);
	$unit->attribute('core')->save_attribute('checklist_contact', $data["checklist_contact"]);
	$unit->attribute('core')->save_attribute('checklist_extension', $data["checklist_extension"]);
	$unit->attribute('core')->save_attribute('checklist_email', $data["checklist_email"]);
	$unit->attribute('core')->save_attribute('checklist1', $data["checklist1"]);
	$unit->attribute('core')->save_attribute('checklist2', $data["checklist2"]);
	$unit->attribute('core')->save_attribute('checklist3', $data["checklist3"]);
	$unit->attribute('core')->save_attribute('checklist4', $data["checklist4"]);
	$unit->attribute('core')->save_attribute('checklist5', $data["checklist5"]);
	$unit->attribute('core')->save_attribute('checklist6', $data["checklist6"]);
	$unit->attribute('core')->save_attribute('checklist7', $data["checklist7"]);
	$unit->attribute('core')->save_attribute('checklist8', $data["checklist8"]);

	// Send response
	echo "success";

})->name('/variation/put/section4-1');


// ************************************************************************************
// Section4-2
// ************************************************************************************

$app->get("/variation/:variation_id/get/section4-2", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();



	if ($core != null) {
		if ($core["deans_endorsement_date"] != null) {
			$core["deans_endorsement_date"] = date_format(date_create_from_format('Y-m-d', $core["deans_endorsement_date"]), 'd/m/Y');
		}
		if ($core["sac_meeting_date"] != null) {
			$core["sac_meeting_date"] = date_format(date_create_from_format('Y-m-d', $core["sac_meeting_date"]), 'd/m/Y');
		}
		if ($core["apcac_meeting_date"] != null) {
			$core["apcac_meeting_date"] = date_format(date_create_from_format('Y-m-d', $core["apcac_meeting_date"]), 'd/m/Y');
		}
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/section4-2');

$app->post("/variation/:variation_id/put/section4-2", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);

	// Variables for dates
	$dean_date = null;
	$apcac_date = null;
	$sac_date = null;

	// Conevrt dates into sql dates
	if ($data["deans_endorsement_date"] != null && $data["deans_endorsement_date"] != "") {
        $date = date_create_from_format('d/m/Y', $data["deans_endorsement_date"]);
		$dean_date = $date->format('Y-m-d');
	}
	if ($data["sac_meeting_date"] != null && $data["sac_meeting_date"] != "") {
        $date = date_create_from_format('d/m/Y', $data["sac_meeting_date"]);
		$sac_date = $date->format('Y-m-d');
	}
	if ($data["apcac_meeting_date"] != null && $data["apcac_meeting_date"] != "") {
        $date = date_create_from_format('d/m/Y', $data["apcac_meeting_date"]);
		$apcac_date = $date->format('Y-m-d');
	}
	$unit->attribute('core')->save_attribute('deans_school', $data["deans_school"]);
    $unit->attribute('core')->save_attribute('deans_acting', $data["deans_acting"]);
	$unit->attribute('core')->save_attribute('deans_name', $data["deans_name"]);
	$unit->attribute('core')->save_attribute('deans_endorsement_date', $dean_date);
	$unit->attribute('core')->save_attribute('deans_trim_ref', $data["deans_trim_ref"]);
    $unit->attribute('core')->save_attribute('sac_acting', $data["sac_acting"]);
	$unit->attribute('core')->save_attribute('sac_name', $data["sac_name"]);
	$unit->attribute('core')->save_attribute('sac_meeting_date', $sac_date);
	$unit->attribute('core')->save_attribute('sac_trim_ref', $data["sac_trim_ref"]);
	$unit->attribute('core')->save_attribute('apcac_name', $data["apcac_name"]);
	$unit->attribute('core')->save_attribute('apcac_meeting_date', $apcac_date);
	$unit->attribute('core')->save_attribute('apcac_trim_ref', $data["apcac_trim_ref"]);

	// Send response
	echo "success";

})->name('/variation/put/section4-2');


// ************************************************************************************
// Unit Code and Name
// ************************************************************************************

$app->get("/variation/:variation_id/get/initial_details", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/initial_details');

$app->post("/variation/:variation_id/put/initial_details", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('unit_code', $data["unit_code"]);
	$unit->attribute('core')->save_attribute('unit_name', $data["unit_name"]);
	$unit->attribute('core')->save_attribute("school", $data["school"]);
    $unit->attribute('core')->save_attribute("proposal_type", "New Unit");

	// Send response
	echo "success";

})->name('/variation/put/initial_details');


// ************************************************************************************
// Library
// ************************************************************************************

$app->get("/variation/:variation_id/get/library", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$readings = $unit->attribute('readings')->get();
	$core["readings"] = $readings;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/library');

$app->post("/variation/:variation_id/put/library", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('variation_changes', $data['variation_changes']);
	$unit->attribute('core')->save_attribute('variation_rationale', $data['variation_rationale']);
	$unit->attribute('core')->save_attribute('variation_impact', $data['variation_impact']);
	$unit->attribute('core')->save_attribute('implementation_session', $data['implementation_session']);
	$unit->attribute('core')->save_attribute('implementation_year', $data['implementation_year']);
	$unit->attribute('readings')->save($data["readings"]);
	$unit->attribute('readings')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/library');


// ************************************************************************************
// Timetable
// ************************************************************************************

$app->get("/variation/:variation_id/get/timetable", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$core = $unit->attribute('core')->get();
	$offerings = $unit->attribute('offerings')->get();
	$timetabling = $unit->attribute('timetabling')->get();
	$core["offerings"] = $offerings;
	$core["timetabling"] = $timetabling;
	if ($core != null) {
		echo json_encode($core);
	} else{
		echo "null";
	}
})->name('/variation/get/timetable');

$app->post("/variation/:variation_id/put/timetable", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('core')->save_attribute('variation_changes', $data['variation_changes']);
	$unit->attribute('core')->save_attribute('variation_rationale', $data['variation_rationale']);
	$unit->attribute('core')->save_attribute('variation_impact', $data['variation_impact']);
	$unit->attribute('core')->save_attribute('implementation_session', $data['implementation_session']);
	$unit->attribute('core')->save_attribute('implementation_year', $data['implementation_year']);
	$unit->attribute('offerings')->save($data["offerings"]);
	//$unit->attribute('offerings')->delete($delete['offerings']);
	$unit->attribute('timetabling')->save($data["timetabling"]);
	//$unit->attribute('timetabling')->delete($delete['timetabling']);

	// Send response
	echo "success";

})->name('/variation/put/timetable');

// ************************************************************************************
// Editors
// ************************************************************************************

$app->get("/variation/:variation_id/get/editors", function($variation_id) use ($app, $db) {
	$unit = new Unit($variation_id, $db);
	$editors = $unit->attribute('editors')->get();
	if ($editors != null) {
		echo json_encode($editors);
	} else{
		echo "null";
	}
})->name('/variation/get/editors');

$app->post("/variation/:variation_id/put/editors", function($variation_id) use ($app, $db) {

	// Get date from post
	$data = json_decode($app->request->post('data'),true);
	$delete = json_decode($app->request->post('delete'),true);

	// Make sure everything worked
	$success = true;

	$unit = new Unit($variation_id, $db);
	$unit->attribute('editors')->save($data);
	$unit->attribute('editors')->delete($delete);

	// Send response
	echo "success";

})->name('/variation/put/editors');
