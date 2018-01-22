<?php

$app->get("/variation/:variation_id/view", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["View", $app->request->getResourceUri()]);
    // Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
		$core = $unit->attribute('core')->get();

		$responsible_schools = $unit->attribute('responsible_schools')->get();
		$school_contacts = [];
		if ($responsible_schools != null) {
			foreach ($responsible_schools as $school) {
				if ($school["school"] != $core["school"]) {
					array_push($school_contacts, $school);
				}
			}
		}

        $app->render("/variation/view.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'variation' => $core,
			'courses' => $unit->attribute('courses')->get(),
            'prerequisite' => $unit->attribute('prerequisite')->get(),
            'corequisite' => $unit->attribute('corequisite')->get(),
			'equivalent' => $unit->attribute('equivalent')->get(),
            'incompatible' => $unit->attribute('incompatible')->get(),
            'outcomes' => $unit->attribute('outcomes')->get(),
            'assessments' => $unit->attribute('assessments')->get(),
			'wil' => $unit->attribute('work_integrated_learning')->get(),
            'readings' => $unit->attribute('readings')->get(),
			'levels' => $constants['levels'],
			'accreditation' => $unit->attribute('accreditation')->get(),
			'discontinuation' => $unit->attribute('discontinuation')->get(),
			'discontinuation_arrangements' => $unit->attribute('discontinuation_arrangements')->get(),
			'offerings' => $unit->attribute('offerings')->get(),
			'timetabling' => $unit->attribute('timetabling')->get(),
			'responsible_schools' => $responsible_schools,
			'school_contacts' => $school_contacts,
			'user' => $user,
        ));
    }
})->name('/variation/view');
