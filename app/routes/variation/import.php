<?php

class LGMSUnit {

	private $unit_code = null;
	private $db = null;

	// Arrays of data
	private $unit_details = null;
	private $approaches = null;
	private $readings = null;
	private $assessments = null;
	private $content = null;
	private $courses = null;
	private $clos = null;
	private $marking_criteria = null;
	private $session_weeks = null;
	private $activity_data = null;
	private $activity_columns = null;
	private $activity_assessments = null;
	private $checklist = null;
	private $attribute = [];

	public function __construct($unit_code = null) {
		$this->unit_code = $unit_code;
		$this->db = new PDO(
            "mysql:host=127.0.0.1" .
            ";dbname=lg",
            "root",
            "",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
		$this->attribute["outcomes"] = new LGMSAttribute("unit_outcomes", $this->unit_code, $this, $this->db);
		$this->attribute["content"] = new LGMSAttribute("unit_content", $this->unit_code, $this, $this->db);
		$this->attribute["modes_of_delivery"] = new LGMSModesOfDelivery("unit_delivery", $this->unit_code, $this, $this->db);
		$this->attribute["readings"] = new LGMSAttribute("unit_readings", $this->unit_code, $this, $this->db);
		$this->attribute["assessments"] = new LGMSAttribute("unit_assessments", $this->unit_code, $this, $this->db);
		$this->attribute["courses"] = new LGMSUnitCourse("v_clo_table_course", $this->unit_code, $this, $this->db);
	}

	public function attribute($name) {
		return $this->attribute[$name];
	}

	public function get_unit_code() {
		return $this->unit_code;
	}

	public function get_unit_details() {
		if ($this->unit_details == null) {
			$this->retrieve_unit_details();
			if ($this->unit_details == null) {
				//echo "Could not get unit details.";
				return null;
			}
		}
		return $this->unit_details;
	}

	private function retrieve_unit_details() {
		if ($this->unit_code == null) {
			echo "Unit code not set!";
			return false;
		}
		$this->unit_details = $this->retrieve_data("*", "unit", "unit_code = " . $this->unit_code);
		if ($this->unit_details != null) {
			$this->unit_details = $this->unit_details[0];
		}
	}

	private function retrieve_data($attr, $table, $filter) {
		// Return value
		$data = null;
		// Query database
		$stmt = $this->db->query("SELECT " . $attr . " FROM " . $table . " WHERE " . $filter);
		if ($stmt != false) {
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
	}

    public function populate_variation($variation_id, $db) {
        // Reminaing to be implmeneted
        // 6	*prerequisites
        // 7	*corequisites
        // 8	*credit_not_counted

        $levels = [null,"Level 1 - Undergraduate Pass","Level 2 - Undergraduate Pass","Level 3 - Undergraduate Pass","Level 4 - Undergraduate Pass","Level 5 - Honours","","Level 7 - Postgraduate coursework","Level 8 - Research Masters","Level 9 - PhD or equivalent"];

        $core = $this->get_unit_details();

        $content = "";
        $content_data = $this->attribute('content')->get();
        if ($content_data != null) {
            foreach ($content_data as $row) {
                $content .= $row['content_item'] . "\n";
            }
        }

        $outcomes = [];
        $outcomes_data = $this->attribute('outcomes')->get();
        if ($outcomes_data != null) {
            foreach ($outcomes_data as $row) {
                $outcomes[] = ['id' => null, 'number' => $row['position'], 'outcome' => $row['outcome_item']];
            }
        }

        $timetabling = [];
        $timetabling_data = $this->attribute('modes_of_delivery')->get();
        if ($timetabling_data != null) {
            foreach ($timetabling_data as $row) {
                $timetabling[] = [
                    'session' => null,
                    'location' => null,
                    'activity_type' => ucwords(strtolower($row['mode'])),
                    'space_type' => null,
                    'activity_hours' => $row['hours'],
                    'total_session_hours' => null,
                    'activity_size' => null,
                    'id' => null,
                ];
            }
        }

        $readings = [];
        $readings_data = $this->attribute('readings')->get();
        if ($readings_data != null) {
            foreach ($readings_data as $row) {
                if ($row['reading_type'] != 'Prescribed Textbook' && $row['reading_type'] != 'Essential Reading' && $row['reading_type'] != 'Additional Reading')
                    continue;
                $readings[] = [
                    'resource_type' => $row['reading_type'],
                    'reference' => $row['reference'],
                    'id' => null,
                ];
            }
        }

		$assessment_group = [];
		$assessment_group[0] = [];
		$assessment_group[0]['id'] = null;
		$assessment_group[0]['type'] = "Core";
		$assessment_group[0]['mode'] = null;
		$assessment_group[0]['session'] = null;
		$assessment_group[0]['rationale'] = null;
        $assessments = [];
        $assessments_data = $this->attribute('assessments')->get();
        if ($assessments_data != null) {
            foreach ($assessments_data as $row) {
                $assessments[] = [
                    'name' => $row['assessment_name'],
                    'gi' => $row['collaboration_type'],
                    'length' => $row['length'],
                    'ulos' => $row['ulos_assessed'],
                    'weight' => $row['weight'],
                    'threshold' => $row['threshold'],
                    'id' => null,
                ];
            }
        }
		$assessment_group[0]['assessments'] = $assessments;

        $courses = [];
        $courses_data = $this->attribute('courses')->get();
        if ($courses_data != null) {
            foreach ($courses_data as $row) {
                $courses[] = [
                    'course_code' => $row['course_code'],
                    'course_title' => $row['name'],
                    'role' => null,
                    'id' => null,
                ];
            }
        }

        $unit = new Unit($variation_id, $db);
        $unit->attribute('outcomes')->delete_all();
        $unit->attribute('timetabling')->delete_all();
        $unit->attribute('readings')->delete_all();
        $unit->attribute('assessments')->delete_all();
        $unit->attribute('courses')->delete_all();

        $unit->attribute('core')->save_attribute('proposal_type', 'Variation');
        $unit->attribute('core')->save_attribute('unit_code', $core['unit_code']);
        $unit->attribute('core')->save_attribute('unit_name', $core['unit_name']);
        $unit->attribute('core')->save_attribute('admin_contact', $core['unit_coordinator']);
        $unit->attribute('core')->save_attribute('credit_points', $core['credits']);
        $unit->attribute('core')->save_attribute('handbook_summary', $core['summary']);
        $unit->attribute('core')->save_attribute('assumed_knowledge', $core['assumed_knowledge']);
        $unit->attribute('core')->save_attribute('attendance_requirements', $core['attendance_requirements']);
        $unit->attribute('core')->save_attribute('enrolment_restrictions', $core['enrolment_restrictions']);
        $unit->attribute('core')->save_attribute('online_learning_requirements', $core['online_learning_requirements']);
        $unit->attribute('core')->save_attribute('legislative_prerequisites', $core['legislative_prerequisites']);
        $unit->attribute('core')->save_attribute('unit_level', array_search($core['unit_level'], $levels));
        $unit->attribute('core')->save_attribute('essential_equipment', $core['essential_equipment']);
        $unit->attribute('core')->save_attribute('school', 'School of Computing, Engineering and Mathematics');
        $unit->attribute('core')->save_attribute('admin_school', 'School of Computing, Engineering and Mathematics');
        $unit->attribute('core')->save_attribute('unit_content', $content);
        $unit->attribute('outcomes')->save($outcomes);
        $unit->attribute('timetabling')->save($timetabling);
        $unit->attribute('readings')->save($readings);
        $unit->attribute('assessments')->save($assessment_group);
        $unit->attribute('courses')->save($courses);
    }
}


class LGMSAttribute {
	protected $unit_code = null;
	protected $db = null;
	protected $data = null;
	protected $table = null;
	protected $unit = null;

	public function __construct($table = null, $unit_code = null, $unit = null, $db = null) {
		$this->table = $table;
		$this->unit_code = $unit_code;
		$this->unit = $unit;
		$this->db = $db;
	}

	public function get() {
		if ($this->data == null) {
			$this->retrieve();
			if ($this->data == null) {
				return null;
			}
		}
		return $this->data;
	}

	public function retrieve() {
		$this->data = $this->retrieve_data("*", $this->table, "unit_code = " . $this->unit_code);
	}

	protected function retrieve_data($attr, $table, $filter) {
		// Return value
		$data = null;
		// Query database
		$stmt = $this->db->query("SELECT " . $attr . " FROM " . $table . " WHERE " . $filter);
		if ($stmt != false) {
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
	}

}

class LGMSModesOfDelivery extends LGMSAttribute {
	public function retrieve() {
		$this->data = $this->retrieve_data("id, mode, hours", $this->table, "unit_code = " . $this->unit_code . " AND mode <> 'vUWS'");
	}
}

class LGMSUnitCourse extends LGMSAttribute {
	public function retrieve() {
		$this->data = $this->retrieve_data("*", $this->table, "unit_code = " . $this->unit_code);
	}
}

$app->get("/variation/import/:unit_code", function($unit_code) use ($app, $db, $constants, $user) {

    if ($unit_code == null || $unit_code == ":unit_code") {
        $app->redirect('/variation/list');
    }

	$unit = new Unit(null, $db);
    $variation_id = $unit->create($user);

    if ($variation_id != false) {
        $lgms_unit = new LGMSUnit($unit_code);
        $lgms_unit->populate_variation($variation_id, $db);
        $app->redirect($app->urlFor('/variation/dash', ['variation_id' => $variation_id]));
    } else {
        echo "Nope";
        $app->redirect($app->urlFor('/variation/list'));
    }

})->name('/variation/import');
