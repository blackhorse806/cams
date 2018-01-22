<?php

class Generate {
	protected $variation_id = null;
	protected $db = null;
	protected $template = null;
	protected $template_path = null;
	protected $output_path = null;
	protected $unit = null;
    protected $previous_unit = null;
	protected $constants = null;

	public function __construct($variation_id = null, $db = null, $constants = null) {
		$this->variation_id = $variation_id;
		$this->db = $db;
		$this->constants = $constants;
		$this->unit = new Unit($this->variation_id, $this->db);
        $this->previous_unit = new Unit("1", $this->db);
	}

	public function open_template() {

		$this->template = new \PhpOffice\PhpWord\TemplateProcessor($this->template_path);
	}

	public function generate() {}

	// protected function retrieve_data($attr, $table, $filter) {
	// 	// Return value
	// 	$data = null;
	// 	// Query database
	// 	$stmt = $this->db->query("SELECT " . $attr . " FROM " . $table . " WHERE " . $filter);
	// 	if ($stmt != false) {
	// 		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// 	}
	// 	return $data;
	// }

}


class D16 extends Generate {
	protected $template_path = '../templates/d16v3.docm';
	protected $output_path = '../generated/';

	public function populate_fields() {
		$core = $this->unit->attribute("core")->get();

		$this->template->setValue('unit_code', $core['unit_code']);
		$this->template->setValue('unit_name', $core['unit_name']);

        // Handle the variation type sensitive fields
		if ($core['proposal_type'] != "New Unit") {
			$this->template->setValue('proposal_type#1', 'N');
			$this->template->setValue('proposal_type#2', 'Y');
		} else {
			$this->template->setValue('proposal_type#1', 'Y');
			$this->template->setValue('proposal_type#2', 'N');
		}

        $this->template->setValue('new_unit_rationale', $core['new_unit_rationale']);
        $this->template->setValue('variation_changes', $core['variation_changes']);
        $this->template->setValue('variation_rationale', $core['variation_rationale']);
        $this->template->setValue('variation_impact', $core['variation_impact']);
		$this->template->setValue('implementation_session', $core['implementation_session']);
		$this->template->setValue('implementation_year', $core['implementation_year']);
		//$this->template->setValue('school', $this->previous_unit->attribute('core')->compare_attribute('school', $core['school']));
        $this->template->setValue('school', $core['school']);
		$this->template->setValue('discipline_code', $core['discipline_code']);
		$this->template->setValue('handbook_summary', $core['handbook_summary']);

		$this->populate_level($core['unit_level']);

		if ($core['credit_points'] == 10) {
			$this->template->setValue('credit_points_is_ten', 'Y');
		} else {
			$this->template->setValue('credit_points_is_ten', 'N');
		}

		$this->template->setValue('credit_points_rationale', $core['credit_points_rationale']);
		$this->template->setValue('unit_content', $core['unit_content']);
		$this->template->setValue('three_hour_exam', $core['three_hour_exam']);
		$this->template->setValue('unit_threshold', $core['unit_threshold']);
		$this->template->setValue('assessments_not_mandatory', $core['assessments_not_mandatory']);
		$this->template->setValue('attendance_requirements', $core['attendance_requirements']);
		$this->template->setValue('enrolment_restrictions', $core['enrolment_restrictions']);
		$this->template->setValue('assumed_knowledge', $core['assumed_knowledge']);
		$this->template->setValue('legislative_prerequisites', $core['legislative_prerequisites']);
		$this->template->setValue('essential_equipment', $core['essential_equipment']);
		$this->yes_no($core['sustainability'], 'sustainability', true);
		$this->template->setValue('sustainability_content_items', $core['sustainability_content_items']);
		$this->yes_no($core['atsi_graduate_attributes'], 'atsi_graduate_attributes', true);
		$this->template->setValue('atsi_content_items', $core['atsi_content_items']);
		$this->template->setValue('accreditation_information', $core['accreditation_information']);
		$this->template->setValue('accreditation_dap_consultation', $core['accreditation_dap_consultation']);
		$this->yes_no($core['unit_international_available'], 'unit_international_available', true);
		$this->template->setValue('international_unit_offering', $core['international_unit_offering']);
		$this->template->setValue('equivalent_learning_experience', $core['equivalent_learning_experience']);
		$this->template->setValue('admin_school', $core['admin_school']);
		$this->template->setValue('admin_contact', $core['admin_contact']);
		$this->template->setValue('admin_extension', $core['admin_extension']);
		$this->template->setValue('admin_email', $core['admin_email']);
		$this->yes_no($core['non_university_facilities'], 'non_university_facilities');
		$this->yes_no($core['clinical_placement'], 'clinical_placement');
		$this->yes_no($core['industrial_experience'], 'industrial_experience');
		$this->yes_no($core['practice_teaching'], 'practice_teaching');
		$this->yes_no($core['other_educational_activities'], 'other_educational_activities');
		$this->yes_no($core['internships'], 'internships');
		$this->yes_no($core['teach_external_partner'], 'teach_external_partner');
		$this->template->setValue('external_monitor_activities', $core['external_monitor_activities']);
		$this->template->setValue('external_delivery_arrangements', $core['external_delivery_arrangements']);

		$this->template->setvalue('checklist_contact', $core['checklist_contact']);
		$this->template->setvalue('checklist_school', $core['checklist_school']);
		$this->template->setvalue('checklist_extension', $core['checklist_extension']);
		$this->template->setvalue('checklist_email', $core['checklist_email']);
		$this->yes_no($core['checklist1'], 'checklist1');
		$this->yes_no($core['checklist2'], 'checklist2');
		$this->yes_no($core['checklist3'], 'checklist3');
		$this->yes_no($core['checklist4'], 'checklist4');
		$this->yes_no($core['checklist5'], 'checklist5');
		$this->yes_no($core['checklist6'], 'checklist6');
		$this->yes_no($core['checklist7'], 'checklist7');
		$this->yes_no($core['checklist8'], 'checklist8');

        $this->template->setvalue('deans_school', $core['deans_school']);
        $this->template->setvalue('deans_name', $core['deans_name']);
		// Convert date format
		$new_date = DateTime::createFromFormat('d-m-Y', $core['deans_endorsement_date']);
        $this->template->setvalue('deans_endorsement_date', $new_date);
        $this->template->setvalue('deans_trim_ref', $core['deans_trim_ref']);
        $this->template->setvalue('sac_name', $core['sac_name']);
        $this->template->setvalue('sac_meeting_date', $core['sac_meeting_date']);
        $this->template->setvalue('sac_trim_ref', $core['sac_trim_ref']);
        $this->template->setvalue('apcac_name', $core['apcac_name']);
        $this->template->setvalue('apcac_meeting_date', $core['apcac_meeting_date']);
        $this->template->setvalue('apcac_trim_ref', $core['apcac_trim_ref']);
        if ($core['deans_acting'] == '1') {
            $this->template->setvalue('deans_acting', 'Acting');
        } else {
            $this->template->setvalue('deans_acting', '');
        }
        if ($core['sac_acting'] == '1') {
            $this->template->setvalue('sac_acting', 'Acting');
        } else {
            $this->template->setvalue('sac_acting', '');
        }


		$this->populate_outcomes();
		$this->populate_assessments();
		$this->populate_courses();
		$this->populate_prerequisite_units();
		$this->populate_corequisite_units();
		$this->populate_equivalent_units();
		$this->populate_incompatible_units();
		$this->populate_work_integrated_learning();
		$this->populate_accreditation();
		$this->populate_discontinuation();
		$this->populate_discontinuation_arrangements();
		$this->populate_unit_offering();
		$this->populate_timetabling();
		$this->populate_readings();
		$this->populate_responsible_school($core['school']);

	}

	public function yes_no($value, $field, $null_as_no = false) {
		if ($value == "0") {
			$this->template->setValue($field, 'N');
		} elseif ($value == "1") {
			$this->template->setValue($field, 'Y');
		} else {
			if ($value != null) {
				$this->template->setValue($field, $value);
			} else {
				if (!$null_as_no) {
					$this->template->setValue($field, '');
				} else {
					$this->template->setValue($field, 'N');
				}
			}
		}
	}

	public function populate_outcomes() {
		$data = $this->unit->attribute('outcomes')->get();
		$output = "";
        if ($data != null) {
            foreach ($data as $outcome) {
                $output .= $outcome["number"] . ". " . $outcome["outcome"] . "\n";
            }
        }
		$this->template->setValue('unit_outcome', $output);
	}

	public function populate_assessments() {
		$data = $this->unit->attribute('assessments')->get();
        if ($data != null) {
            // Build extra alternative assessment tables
            $num_groups = count($data);
            if ($num_groups == 1) {
                $num_groups = 2;
            }
            $this->template->cloneBlock('CLONEME', $num_groups - 1);
            // Loop over each group of assessments
            foreach ($data as $ass_group) {
                // Reset assessment number
                $count = 1;
                $prefix = 'ass';
                // Fill in alternative assessment fields
                if ($ass_group['type'] == 'alt') {
                    $prefix = 'alt';
                    $this->template->setValue('alt_session', $ass_group['session'], 1);
                    $this->template->setValue('alt_mode', $ass_group['mode'], 1);
                    $this->template->setValue('alt_rationale', $ass_group['rationale'], 1);
                }
                // Build rows for each assessment
                $this->template->cloneRow($prefix . '_num', count($ass_group['assessments']), 1);
                // Loop over each assessment and insert data into table row
                foreach ($ass_group['assessments'] as $ass) {
                    if ($ass['threshold'] == "1") {
                        $ass['threshold'] = "Y";
                    } else {
                        $ass['threshold'] = "N";
                    }
                    $this->template->setValue($prefix . '_num#' . $count, $count, 1);
                    $this->template->setValue($prefix . '_name#' . $count, $ass["name"], 1);
					$this->template->setValue($prefix . '_length#' . $count, $ass["length"], 1);
                    $this->template->setValue($prefix . '_outcomes#' . $count, $ass["ulos"], 1);
                    $this->template->setValue($prefix . '_weight#' . $count, $ass["weight"] . "%", 1);
                    $this->template->setValue($prefix . '_gi#' . $count, $ass["gi"], 1);
					$this->template->setValue($prefix . '_type#' . $count, $ass["type"], 1);
                    $this->template->setValue($prefix . '_threshold#' . $count, $ass["threshold"], 1);
                    $count++;
                }
            }
        }
        // Clean up
        $this->template->setValue('alt_session', '', 1);
        $this->template->setValue('alt_mode', '', 1);
        $this->template->setValue('alt_rationale', '', 1);
        $this->template->setValue('alt_num', '', 1);
        $this->template->setValue('alt_name', '', 1);
        $this->template->setValue('alt_length', '', 1);
        $this->template->setValue('alt_outcomes', '', 1);
        $this->template->setValue('alt_weight', '', 1);
        $this->template->setValue('alt_type', '', 1);
		$this->template->setValue('alt_gi', '', 1);
        $this->template->setValue('alt_threshold', '', 1);
	}

	public function populate_courses() {
		$data = $this->unit->attribute('courses')->get();
		$this->template->cloneRow('course_code', count($data));
		$count = 1;
        if ($data != null) {
            foreach ($data as $course) {
                $this->template->setValue('course_code#' . $count, $course["course_code"]);
                $this->template->setValue('course_title#' . $count, $course["course_title"]);
                $this->template->setValue('course_role#' . $count, $course["role"]);
                $count++;
            }
        }
	}

	public function populate_prerequisite_units() {
		$data = $this->unit->attribute('prerequisite')->get();
		$this->template->cloneRow('pr_unit_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $unit) {
		    $this->template->setValue('pr_unit_code#' . $count, $unit["unit_code"]);
		    $this->template->setValue('pr_unit_name#' . $count, $unit["unit_name"]);
		    $this->template->setValue('pr_justification#' . $count, $unit["justification"]);
		    $count++;
		}
	}

	public function populate_corequisite_units() {
		$data = $this->unit->attribute('corequisite')->get();
		$this->template->cloneRow('cr_unit_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $unit) {
		    $this->template->setValue('cr_unit_code#' . $count, $unit["unit_code"]);
		    $this->template->setValue('cr_unit_name#' . $count, $unit["unit_name"]);
		    $this->template->setValue('cr_justification#' . $count, $unit["justification"]);
		    $count++;
		}
	}

	public function populate_equivalent_units() {
		$data = $this->unit->attribute('equivalent')->get();
		$this->template->cloneRow('eq_unit_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $unit) {
		    $this->template->setValue('eq_unit_code#' . $count, $unit["unit_code"]);
		    $this->template->setValue('eq_unit_name#' . $count, $unit["unit_name"]);
			$this->yes_no($unit["college_unit"], 'eq_college#' . $count);
		    $count++;
		}
	}

	public function populate_incompatible_units() {
		$data = $this->unit->attribute('incompatible')->get();
		$this->template->cloneRow('ic_unit_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $unit) {
		    $this->template->setValue('ic_unit_code#' . $count, $unit["unit_code"]);
		    $this->template->setValue('ic_unit_name#' . $count, $unit["unit_name"]);
		    $count++;
		}
	}

	public function populate_work_integrated_learning() {
		$data = $this->unit->attribute('work_integrated_learning')->get();
		if ($data != null) {
			foreach ($data as $key => $value) {
				if ($key == 'supervision_quality') {
					$this->yes_no($value, $key, false);
				} else {
					$this->yes_no($value, $key, true);
				}
			}
		}
	}

	public function populate_accreditation() {
		$data = $this->unit->attribute('accreditation')->get();
		$this->template->cloneRow('accred_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $accred) {
		    $this->template->setValue('accred_code#' . $count, $accred["code"]);
		    $this->template->setValue('accred_acreditor#' . $count, $accred["accreditor"]);
			$this->template->setValue('accred_start#' . $count, $accred["start_date"]);
			$this->template->setValue('accred_end#' . $count, $accred["end_date"]);
			$this->template->setValue('accred_review#' . $count, $accred["review_date"]);
			$count++;
		}
	}

	public function populate_discontinuation() {
		$data = $this->unit->attribute('discontinuation')->get();
		$this->template->cloneRow('discon_unit_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $discon) {
		    $this->template->setValue('discon_unit_code#' . $count, $discon["unit_code"]);
		    $this->template->setValue('discon_unit_name#' . $count, $discon["unit_name"]);
			$this->template->setValue('discon_last_year#' . $count, $discon["last_year"]);
			$this->template->setValue('discon_last_session#' . $count, $discon["last_session"]);
			$count++;
		}
	}

	public function populate_discontinuation_arrangements() {
		$data = $this->unit->attribute('discontinuation_arrangements')->get();
		$this->template->cloneRow('arr_code', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $discon) {
		    $this->template->setValue('arr_code#' . $count, $discon["code"]);
		    $this->template->setValue('arr_title#' . $count, $discon["title"]);
			$this->template->setValue('arr_num#' . $count, $discon["num_students"]);
			$this->template->setValue('arr_transition#' . $count, $discon["transition_arrangements"]);
			$count++;
		}
	}

	public function populate_unit_offering() {
		$data = $this->unit->attribute('offerings')->get();
		$this->template->cloneRow('of_session', count($data));
		if ($data == null) {
			return;
		}
		$count = 1;
		foreach ($data as $discon) {
			$this->template->setValue('of_session#' . $count, $discon["session"]);
			$this->template->setValue('of_location#' . $count, $discon["location"]);
			$this->template->setValue('of_class#' . $count, $discon["unit_class"]);
			$this->template->setValue('of_num#' . $count, $discon["est_num_students"]);
			$this->template->setValue('of_quota#' . $count, $discon["quota"]);
			$count++;
		}
	}

	public function populate_timetabling() {
		$data = $this->unit->attribute('timetabling')->get();
		$this->template->cloneRow('tt_location', count($data));
		$count = 1;
        if ($data != null) {
            foreach ($data as $row) {
                $this->template->setValue('tt_location#' . $count, $row["location"]);
                $this->template->setValue('tt_session#' . $count, $row["session"]);
                $this->template->setValue('tt_activity_type#' . $count, $row["activity_type"]);
                $this->template->setValue('tt_space_type#' . $count, $row["space_type"]);
                $this->template->setValue('tt_hours#' . $count, $row["activity_hours"]);
                $this->template->setValue('tt_total#' . $count, $row["total_session_hours"]);
                $this->template->setValue('tt_size#' . $count, $row["activity_size"]);
                $count++;
            }
        }
	}

	public function populate_readings() {
		$data = $this->unit->attribute('readings')->get();
		$output = [];
		$output["Prescribed Textbook"] = "";
		$output["Essential Reading"] = "";
		$output["Additional Reading"] = "";
        if ($data != null) {
            foreach ($data as $row) {
                $output[$row["resource_type"]] .= "- " . $row["reference"] . "\n";
            }
        }
		$this->template->setValue('prescribed_textbook', $output["Prescribed Textbook"]);
		$this->template->setValue('essential_readings', $output["Essential Reading"]);
		$this->template->setValue('additional_readings', $output["Additional Reading"]);
	}


	public function populate_responsible_school($school) {
		$data = $this->unit->attribute('responsible_schools')->get();
		$this->template->cloneRow('responsible_school', count($data));
		$this->template->cloneRow('responsible_school2', count($data));
		$count = 1;
		$count2 = 1;
        if ($data != null) {
            foreach ($data as $row) {
                $this->template->setValue('responsible_school#' . $count, $row["school"]);
                $this->template->setValue('responsible_percent#' . $count, $row["percent"] . "%");
                if ($row['school'] != $school) {
                    $this->template->setValue('responsible_school2#' . $count2, $row["school"]);
                    $this->template->setValue('responsible_contact#' . $count2, $row["contact"]);
                    $this->template->setValue('responsible_ext#' . $count2, $row["extension"]);
                    $this->template->setValue('responsible_email#' . $count2, $row["email"]);
                    $count2++;
                }
                $count++;
            }
            // Lazy cleanup of excess fields
            $count = 1;
            foreach ($data as $row) {
               $this->template->setValue('responsible_school2#' . $count, "");
               $this->template->setValue('responsible_contact#' . $count, "");
               $this->template->setValue('responsible_ext#' . $count, "");
               $this->template->setValue('responsible_email#' . $count, "");
               $count++;
           }
        }
	}

	public function populate_level($level) {
		if ($level == "z") {$this->template->setValue('level_z', 'Y');}
		if ($level == "1") {$this->template->setValue('level_1', 'Y');}
		if ($level == "2") {$this->template->setValue('level_2', 'Y');}
		if ($level == "3") {$this->template->setValue('level_3', 'Y');}
		if ($level == "4") {$this->template->setValue('level_4', 'Y');}
		if ($level == "5") {$this->template->setValue('level_5', 'Y');}
		if ($level == "7") {$this->template->setValue('level_7', 'Y');}

		if ($level != "z") {$this->template->setValue('level_z', 'N');}
		if ($level != "1") {$this->template->setValue('level_1', 'N');}
		if ($level != "2") {$this->template->setValue('level_2', 'N');}
		if ($level != "3") {$this->template->setValue('level_3', 'N');}
		if ($level != "4") {$this->template->setValue('level_4', 'N');}
		if ($level != "5") {$this->template->setValue('level_5', 'N');}
		if ($level != "7") {$this->template->setValue('level_7', 'N');}
	}

	public function generate() {
		$this->open_template();
		$this->populate_fields();


		$this->template->saveAs($this->output_path . $this->variation_id . '.docm');
		echo "Done: " . time();
	}

}
