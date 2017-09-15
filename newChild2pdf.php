<?php

$debug = false;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'Child and Adolescent Psychiatry New Patient Information Form';
$html = '<h4>Child and Adolescent Psychiatry New Patient Information Form</h4>';

$html .= '<strong>Patient Demographic Information:</strong>';
$html .= '<br>Patient Name: ';
$html .= '<strong>';
$html .= $_POST['child_name_first'];
$html .= ' '.$_POST['child_name_middle'];
$html .= ' '.$_POST['child_name_last'];
$html .= '</strong>';

$html .= '<br>Date of Birth: ';
$html .= '<strong>';
$html .= $_POST['child_birth_date'];
$html .= '</strong>';

$html .= '<br>Address: ';
$html .= '<strong>';
$html .= $_POST['child_address'];
$html .= ' '.$_POST['child_City'];
$html .= ' '.$_POST['child_State'];
$html .= ' '.$_POST['child_Zip'];
$html .= '</strong>';

$html .= '<br>Preferred contact: ';
$html .= '<br>Home: ';
$html .= '<strong>';
$html .= $_POST['child_preferred_contact_home'];
$html .= '</strong>';
$html .= '<br>Work: ';
$html .= '<strong>';
$html .= $_POST['child_preferred_contact_work'];
$html .= '</strong>';
$html .= '<br>Cell: ';
$html .= '<strong>';
$html .= $_POST['child_preferred_contact_cell'];
$html .= '</strong>';

$html .= '<br>Email address: ';
$html .= '<strong>';
$html .= $_POST['child_email'];
$html .= '</strong>';

$html .= '<br>Appointment reminders: Email or text Parent’s Name (if patient is a minor): ';
$html .= '<strong>';
$html .= $_POST['reminders'];
$html .= '</strong>';

$html .= '<br>Address: ';
$html .= '<strong>';
$html .= $_POST['reminders_address'];
$html .= ' '.$_POST['reminders_City'];
$html .= ' '.$_POST['reminders_State'];
$html .= ' '.$_POST['reminders_Zip'];
$html .= '</strong>';

$html .= '<br>Occupation: ';
$html .= '<strong>';
$html .= $_POST['Occupation'];
$html .= '</strong>';

$html .= '<br>Preferred contact: ';
$html .= '<strong>';
$html .= $_POST['reminders_preferred_contact'];
$html .= '</strong>';

$html .= '<br>Parent’s Name (if patient is a minor): ';
$html .= '<strong>';
$html .= $_POST['parent_name'];
$html .= '</strong>';

$html .= '<br>Address: ';
$html .= '<strong>';
$html .= $_POST['parent_address'];
$html .= ' '.$_POST['parent_City'];
$html .= ' '.$_POST['parent_State'];
$html .= ' '.$_POST['parent_Zip'];
$html .= '</strong>';

$html .= '<br>Highest Education: ';
$html .= '<strong>';
$html .= $_POST['highest_education'];
$html .= '</strong>';

$html .= '<br>Preferred contact: ';
$html .= '<strong>';
$html .= $_POST['parent_preferred_contact'];
$html .= '</strong>';

$html .= '<br>Referred By: ';
$html .= '<strong>';
$html .= $_POST['child_referred_by'];
$html .= '</strong>';

$html .= '<br>Chief Complaint: What is your primary reason for seeking psychiatric consultation? ';
$html .= '<strong>';
$html .= $_POST['chief_complaint'];
$html .= '</strong>';

$html .= '<br>History of Presenting Illness: ';
$html .= '<br>When did these symptoms begin? ';
$html .= '<strong>';
$html .= $_POST['symptoms_begin'];
$html .= '</strong>';
$html .= '<br>Did something occur to precipitate them? ';
$html .= '<strong>';
$html .= $_POST['something_occur'];
$html .= '</strong>';
$html .= '<br>Have there been symptom-free periods? ';
$html .= '<strong>';
$html .= $_POST['symptom_free'];
$html .= '</strong>';

$html .= '<br><br>Past Psychiatric History:  ';
$html .= '<br>When did treatment first begin? ';
$html .= '<strong>';
$html .= $_POST['treatment_begin'];
$html .= '</strong>';
$html .= '<br>What kind of treatment has occurred? ';
$html .= '<strong>';
$html .= $_POST['treatment_kind'];
$html .= '</strong>';
$html .= '<br>1. Individual Psychotherapy? If yes, when and with whom? ';
$html .= '<strong>';
$html .= $_POST['individual_psychotherapy'];
$html .= '</strong>';
$html .= '<br>2. Group or Family/Couples Psychotherapy? If yes, when and with whom? ';
$html .= '<strong>';
$html .= $_POST['group_psychotherapy'];
$html .= '</strong>';
$html .= '<br>Have you (your child) ever been psychiatrically hospitalized? If yes, when, where, and for what reason? ';
$html .= '<strong>';
$html .= $_POST['child_hospitalized'];
$html .= '</strong>';
$html .= '<br>Have you (your child) ever thought of or attempted to commit suicide? If yes, when,
how, and under what circumstances? ';
$html .= '<strong>';
$html .= $_POST['child_suicide'];
$html .= '</strong>';
$html .= '<br>Have you (your child) ever hurt oneself in any way? For example, cutting or burning self. If yes, when, how, and under what circumstances? ';
$html .= '<strong>';
$html .= $_POST['hurt_oneself'];
$html .= '</strong>';

$html .= '<br><br>Medical History: ';
$html .= '<br>Current and Prior Medical Problems: ';
$html .= '<strong>';
$html .= $_POST['medical_problems'];
$html .= '</strong>';
$html .= '<br>Medical Hospitalizations/Surgeries: ';
$html .= '<strong>';
$html .= $_POST['medical_hospitalizations'];
$html .= '</strong>';
$html .= '<br>Known Drug Allergies: ';
$html .= '<strong>';
$html .= $_POST['drug_allergies'];
$html .= '</strong>';
$html .= '<br>Primary Care Physician: ';
$html .= '<strong>';
$html .= $_POST['care_physician'];
$html .= '</strong>';
$html .= '<br>Last physical exam: ';
$html .= '<strong>';
$html .= $_POST['care_physical_exam'];
$html .= '</strong>';
$html .= '<br>Address/Phone: ';
$html .= '<strong>';
$html .= $_POST['care_phone'];
$html .= '</strong>';
$html .= '<br>Immunizations current? ';
$html .= '<strong>';
$html .= $_POST['child_immunizations'];
$html .= '</strong>';

$html .= '<br><br>Past Medications: ';
$html .= '<table border="1"><tr><td>Name of Medication</td>
                                        <td>Dose Taken</td>
                                        <td>Reason</td>
                                        <td>Prescriber</td>
                                        <td>Comments (helpfulness/side effects)</td></tr>';
for ($i = 1; $i < 6; $i++) {
    $html .= '<tr>
<th>' . $_POST["pastNameMedication_$i"] . '</th>
<th>' . $_POST["pastDoseTaken_$i"] . '</th>
<th>' . $_POST["pastReason_$i"] . '</th>
<th>' . $_POST["pastPrescriber_$i"] . '</th>                                
<th>' . $_POST["pastComments_$i"] . '</th>
</tr>';
}
$html .= '</table>';

$html .= '<br><br>Current Medications: ';
$html .= '<table border="1"><tr><td>Name of Medication</td>
                                        <td>Dose Taken</td>
                                        <td>Reason</td>
                                        <td>Prescriber</td>
                                        <td>Comments (helpfulness/side effects)</td></tr>';
for ($i = 1; $i < 6; $i++) {
    $html .= '<tr>
<th>' . $_POST["currentNameMedication_$i"] . '</th>
<th>' . $_POST["currentDoseTaken_$i"] . '</th>
<th>' . $_POST["currentReason_$i"] . '</th>
<th>' . $_POST["currentPrescriber_$i"] . '</th>                                
<th>' . $_POST["currentComments_$i"] . '</th>
</tr>';
}
$html .= '</table>';

$html .= '<br><br>Please comment on any substance abuse (drugs/alcohol). ';
$html .= '<table border="1"><tr><td>What?</td>
                                        <td>When did you start?</td>
                                        <td>How much did you use?</td>
                                        <td>Last use?</td>
                                        <td>What did it do for you?</td></tr>';
for ($i = 1; $i < 6; $i++) {
    $html .= '<tr>
<th>' . $_POST["substanceWhat$i"] . '</th>
<th>' . $_POST["substanceWhen$i"] . '</th>
<th>' . $_POST["substanceHowMuch$i"] . '</th>
<th>' . $_POST["substanceLast$i"] . '</th>                              
<th>' . $_POST["substanceWhatDid$i"] . '</th>
</tr>';
}
$html .= '</table>';

$html .= '<br><br>Please choose any that the patient has had and include dates as best you can: ';

//    $html .= implode(", ", $_POST['childAnyInclude']);

$html .= '<strong>';
if (!empty($_POST['childAnyInclude'])) {
	foreach($_POST['childAnyInclude'] as $value) {
		$html .= '<br>'.$value;
		if(preg_match('/^([^:\s\/,]*?)[:\s\/,]/', $value, $matches)) {
			$familyMember = $matches[1].'Text';
			$html .= ": " . $_POST[$familyMember];
		}
	}
}
$html .= '</strong>';
$html .= '<br><br>Family History: ';
$html .= '<br>1. Please give the names, ages, and relationships of people living in the home: ';
$html .= '<strong>';
$html .= $_POST['peopleLivingHome'];
$html .= '</strong>';
$html .= '<br>2. Who are other immediate family members not living in the home? ';
$html .= '<strong>';
$html .= $_POST['otherFamilyMembers'];
$html .= '</strong>';

$html .= '<br><br>Family Psychiatric History: ';
$html .= '<br>Has any family member had any of the following? Please choose and indicate which family member. ';
$html .= '<strong>';
if (!empty($_POST['familyPsychiatricHistory'])) {
	foreach($_POST['familyPsychiatricHistory'] as $value) {
		$html .= '<br>'.$value;
		if(preg_match('/^([^:\s\/]*?)[:\s\/]/', $value, $matches)) {
        //if(preg_match('/^(\w*?)\W/', $value, $matches)) {
			//$html .= '  '.$matches[1];
			$familyMember = 'family'.$matches[1].'Member';
			//$html .= '  '.$familyMember;
			$html .= ": " . $_POST[$familyMember];
		}
	}
    /*$html .= implode(", ", $_POST['familyPsychiatricHistory']);
    if (in_array('Other:', $_POST['familyPsychiatricHistory']) && !empty($_POST['familyOtherMember']))
    $html .= " " . $_POST['familyOtherMember'];
    */
}
$html .= '</strong>';
$html .= '<br>Please elaborate on above as needed: ';
$html .= '<strong>';
$html .= $_POST['elaborate'];
$html .= '</strong>';

$html .= '<br><br>Family Medical History: ';
$html .= '<br>Please provide information about significant medical issues on the FATHER’S side: ';
$html .= '<strong>';
$html .= $_POST['issuesFATHER'];
$html .= '</strong>';
$html .= '<br>Please provide information about significant medical issues on the MOTHER’S side: ';
$html .= '<strong>';
$html .= $_POST['issuesMOTHER'];
$html .= '</strong>';

$html .= '<br><br>Prenatal History: ';
$html .= '<br>Was the pregnancy healthy? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalPregnancy'];
$html .= '</strong>';
$html .= '<br>Problems: ';
$html .= '<strong>';
$html .= $_POST['childPrenatalProblems'];
$html .= '</strong>';
$html .= '<br>Were medications used during the pregnancy? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalMedications'];
$html .= '</strong>';
$html .= '<br>If yes, what kind? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalMedicationsKind'];
$html .= '</strong>';
$html .= '<br>How Often? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalMedicationsOften'];
$html .= '</strong>';
$html .= '<br>Were drugs/alcohol used during the pregnancy? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDrugs'];
$html .= '</strong>';
$html .= '<br>If yes, what kind? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDrugsKind'];
$html .= '</strong>';
$html .= '<br>How Often? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDrugsOften'];
$html .= '</strong>';
$html .= '<br>Did the mother smoke during the pregnancy? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalSmoke'];
$html .= '</strong>';
$html .= '<br>If yes how much? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDrugsMuch'];
$html .= '</strong>';
$html .= '<br>Was the pregnancy full term? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalTerm'];
$html .= '</strong>';
$html .= '<br>Was delivery normal? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDelivery'];
$html .= '</strong>';
$html .= '<br>If no, problems? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDeliveryProblems'];
$html .= '</strong>';
$html .= '<br>Any feeding problems? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalDeliveryFeeding'];
$html .= '</strong>';
$html .= '<br>Gained weight well? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalGained'];
$html .= '</strong>';

$html .= '<br><br>Was there any problem in the first week? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalFirstWeek'];
$html .= '</strong>';
$html .= '<br>first month? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalFirstMonth'];
$html .= '</strong>';
$html .= '<br>first year? ';
$html .= '<strong>';
$html .= $_POST['childPrenatalFirstYear'];
$html .= '</strong>';

$html .= '<br><br>Developmental History: ';
$html .= '<br>1. Describe yourself/child as an infant: ';
$html .= '<br>a) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalA'];
if ('other:' == $_POST['childDevelopmentalA'])
    $html .= ' ' . $_POST['childDevelopmentalA_other'];
$html .= '</strong>';
$html .= '<br>b) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalB'];
if ('other:' == $_POST['childDevelopmentalB'])
    $html .= ' ' . $_POST['childDevelopmentalB_other'];
$html .= '</strong>';
$html .= '<br>c) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalC'];
$html .= '</strong>';
$html .= '<br>d) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalD'];
$html .= '</strong>';
$html .= '<br>e) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalE'];
$html .= '</strong>';

$html .= '<br>f) response to being held (describe):  ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalF_response'];
$html .= '</strong>';

$html .= '<br>g) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmentalG'];
$html .= '</strong>';

$html .= '<br>2. Describe current eating habits: ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental2'];
$html .= '</strong>';
$html .= '<br>Problems: ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental2Problems'];
$html .= '</strong>';

$html .= '<br>3. Describe current sleeping habits: ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental3'];
$html .= '</strong>';
$html .= '<br>Problems: ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental3Problems'];
$html .= '</strong>';

$html .= '<br><br>4. Developmental Milestones (only mark if significantly early or late): ';
$html .= '<br><br>Motor: ';
$html .= '<br>rolled front/back (4 mo): ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_rolled'];
$html .= '</strong>';
$html .= '<br>sit with support (6 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_sitSupport'];
$html .= '</strong>';
$html .= '<br>sit alone (9-‐10) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_sitAlone'];
$html .= '</strong>';
$html .= '<br>pull to stand (10 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_pull'];
$html .= '</strong>';
$html .= '<br>crawling (10-‐12 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_crawling'];
$html .= '</strong>';
$html .= '<br>walks alone (10-‐18 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_walksAlone'];
$html .= '</strong>';
$html .= '<br>running (15-‐24 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_running'];
$html .= '</strong>';
$html .= '<br>tricycle (3 yrs) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_tricycle'];
$html .= '</strong>';
$html .= '<br>bicycle (5-‐7 yrs) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_bicycle'];
$html .= '</strong>';

$html .= '<br><br>Language: ';
$html .= '<br>smiling (4-‐6 wks): ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_smiling'];
$html .= '</strong>';
$html .= '<br>cooing (3 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_cooing'];
$html .= '</strong>';
$html .= '<br>babbling (6 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_babbling'];
$html .= '</strong>';
$html .= '<br>jargon (10-‐14 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_jargon'];
$html .= '</strong>';
$html .= '<br>first word (12 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_firstWord'];
$html .= '</strong>';
$html .= '<br>follows 1-‐step command (15 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_follows'];
$html .= '</strong>';
$html .= '<br>2 word combo (22 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_combo'];
$html .= '</strong>';
$html .= '<br>3 word sentence (3 yrs) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_sentence'];
$html .= '</strong>';
$html .= '<br>speech problems ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_speech'];
$html .= '</strong>';

$html .= '<br><br>Adaptive: ';
$html .= '<br>mouthing (3 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_mouthing'];
$html .= '</strong>';
$html .= '<br>transfers objects (6 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_transfers'];
$html .= '</strong>';
$html .= '<br>picks up raisin (11-‐12 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_picks'];
$html .= '</strong>';
$html .= '<br>scribble (15 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_scribble'];
$html .= '</strong>';
$html .= '<br>drinks from cup (10 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_drinks'];
$html .= '</strong>';
$html .= '<br>uses spoon (12-‐15 mo) ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_spoon'];
$html .= '</strong>';
$html .= '<br>undresses ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_undresses'];
$html .= '</strong>';
$html .= '<br>bowel trained ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_bowel'];
$html .= '</strong>';
$html .= '<br>bladder trained ';
$html .= '<strong>';
$html .= $_POST['childDevelopmental4_bladder'];
$html .= '</strong>';

$html .= '<br><br>School: ';
$html .= '<br>Repeated Grade? ';
$html .= '<strong>';
$html .= $_POST['childSchoolRepeated'];
$html .= '</strong>';
$html .= '<br>If yes, which? ';
$html .= '<strong>';
$html .= $_POST['childSchoolRepeated_which'];
$html .= '</strong>';
$html .= '<br>Special/resource classes? ';
$html .= '<strong>';
$html .= $_POST['childSchoolSpecial'];
$html .= '</strong>';
$html .= '<br>Other special services? (Speech/OT/PT) ';
$html .= '<strong>';
$html .= $_POST['childSchoolOtherSpecial'];
$html .= '</strong>';
$html .= '<br>IEP? ';
$html .= '<strong>';
$html .= $_POST['childSchoolOtherSpecialIEP'];
$html .= '</strong>';
$html .= '<br>504 Plan? ';
$html .= '<strong>';
$html .= $_POST['childSchoolOtherSpecial504'];
$html .= '</strong>';
$html .= '<br>Academic grades received: ';
$html .= '<strong>';
$html .= $_POST['childSchoolAcademic'];
$html .= '</strong>';

$html .= '<br><br>Evaluations performed: ';
$html .= '<br>Date: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluations_date'];
$html .= '</strong>';
$html .= '<br>Type: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluationsType'];
$html .= '</strong>';
$html .= '<br>Reasons: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluationsReasons'];
$html .= '</strong>';
$html .= '<br>Results: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluationsResults'];
$html .= '</strong>';

$html .= '<br><br>Date: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluations1_date'];
$html .= '</strong>';
$html .= '<br>Type: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluations1Type'];
$html .= '</strong>';
$html .= '<br>Reasons: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluations1Reasons'];
$html .= '</strong>';
$html .= '<br>Results: ';
$html .= '<strong>';
$html .= $_POST['childSchoolEvaluations1Results'];
$html .= '</strong>';

$html .= '<br><br>Relationships with teachers? ';
$html .= '<strong>';
$html .= $_POST['childSchoolRelationshipsTeachers'];
$html .= '</strong>';
$html .= '<br>With peers? ';
$html .= '<strong>';
$html .= $_POST['childSchoolRelationshipsPeers'];
$html .= '</strong>';
$html .= '<br>Ability to work independently? ';
$html .= '<strong>';
$html .= $_POST['childSchoolAbility'];
$html .= '</strong>';
$html .= '<br>Organize self? ';
$html .= '<strong>';
$html .= $_POST['childSchoolOrganize'];
$html .= '</strong>';
$html .= '<br>Attendance? ';
$html .= '<strong>';
$html .= $_POST['childSchoolAttendance'];
$html .= '</strong>';

$html .= '<br><br>Have you (your child) ever had truancy proceedings? ';
$html .= '<strong>';
$html .= $_POST['childSchoolProceedings'];
$html .= '</strong>';
$html .= '<br>Have you (your child) had any other legal proceedings? ';
$html .= '<strong>';
$html .= $_POST['childSchoolLegalProceedings'];
$html .= '</strong>';
$html .= '<br>If yes, please describe: ';
$html .= '<strong>';
$html .= $_POST['childSchoolLegalProceedingsDescribe'];
$html .= '</strong>';
$html .= '<br>Describe your (your child’s) activities, interests, hobbies, skills, strengths: ';
$html .= '<strong>';
$html .= $_POST['childSchoolLegalProceedingsInterests'];
$html .= '</strong>';
$html .= '<br>Please use the remaining space to describe any other concerns: ';
$html .= '<strong>';
$html .= $_POST['childSchoolLegalProceedingsConcerns'];
$html .= '</strong>';

$html .= '<br><br>Problem Behavior Checklist: Do you/your child have any of the following problems? ';
$html .= '<br>Impulsivity (acts before thinking) ';
$html .= '<strong>';
$html .= $_POST['short_impulsivity'];
$html .= '</strong>';
$html .= '<br>Won’t follow rules/directions ';
$html .= '<strong>';
$html .= $_POST['short_rules'];
$html .= '</strong>';
$html .= '<br>Irritable, poor frustration tolerance ';
$html .= '<strong>';
$html .= $_POST['short_tolerance'];
$html .= '</strong>';
$html .= '<br>Easily riled up ';
$html .= '<strong>';
$html .= $_POST['short_easily'];
$html .= '</strong>';
$html .= '<br>Picks on others, bullies ';
$html .= '<strong>';
$html .= $_POST['short_bullies'];
$html .= '</strong>';
$html .= '<br>Feels picked on ';
$html .= '<strong>';
$html .= $_POST['short_picked'];
$html .= '</strong>';
$html .= '<br>Teases others unmercifully ';
$html .= '<strong>';
$html .= $_POST['short_unmercifully'];
$html .= '</strong>';
$html .= '<br>Deliberately tries to annoy people ';
$html .= '<strong>';
$html .= $_POST['short_deliberately'];
$html .= '</strong>';
$html .= '<br>Easily angered, bad temper ';
$html .= '<strong>';
$html .= $_POST['short_angered'];
$html .= '</strong>';
$html .= '<br>Frequent accidents ';
$html .= '<strong>';
$html .= $_POST['short_frequent'];
$html .= '</strong>';
$html .= '<br>Gets out of control ';
$html .= '<strong>';
$html .= $_POST['short_outControl'];
$html .= '</strong>';
$html .= '<br>Gets violent and aggressive ';
$html .= '<strong>';
$html .= $_POST['short_aggressive'];
$html .= '</strong>';
$html .= '<br>Cruel to animals ';
$html .= '<strong>';
$html .= $_POST['short_animals'];
$html .= '</strong>';
$html .= '<br>Fire Setting ';
$html .= '<strong>';
$html .= $_POST['short_fire'];
$html .= '</strong>';
$html .= '<br>Steals ';
$html .= '<strong>';
$html .= $_POST['short_steals'];
$html .= '</strong>';
$html .= '<br>Cries easily ';
$html .= '<strong>';
$html .= $_POST['short_cries'];
$html .= '</strong>';

$html .= '<br>Gets giddy and silly ';
$html .= '<strong>';
$html .= $_POST['short_giddy'];
$html .= '</strong>';
$html .= '<br>Tiredness/listlessness ';
$html .= '<strong>';
$html .= $_POST['short_listlessness'];
$html .= '</strong>';
$html .= '<br>Lack of interest in activities ';
$html .= '<strong>';
$html .= $_POST['short_interest'];
$html .= '</strong>';
$html .= '<br>Isolates self from others ';
$html .= '<strong>';
$html .= $_POST['shortIsolates'];
$html .= '</strong>';
$html .= '<br>Sadness ';
$html .= '<strong>';
$html .= $_POST['shortSadness'];
$html .= '</strong>';
$html .= '<br>Poor appetite ';
$html .= '<strong>';
$html .= $_POST['shortAppetite'];
$html .= '</strong>';
$html .= '<br>Problems getting to sleep ';
$html .= '<strong>';
$html .= $_POST['shortSleep'];
$html .= '</strong>';
$html .= '<br>Early morning awakening ';
$html .= '<strong>';
$html .= $_POST['shortAwakening'];
$html .= '</strong>';
$html .= '<br>Self‐injurious/abusive behaviors ';
$html .= '<strong>';
$html .= $_POST['shortBehaviors'];
$html .= '</strong>';
$html .= '<br>Excessive sleepiness ';
$html .= '<strong>';
$html .= $_POST['shortSleepiness'];
$html .= '</strong>';
$html .= '<br>Weight gain/loss ';
$html .= '<strong>';
$html .= $_POST['shortWeight'];
$html .= '</strong>';
$html .= '<br>Worries a lot ';
$html .= '<strong>';
$html .= $_POST['shortWorries'];
$html .= '</strong>';
$html .= '<br>Fear of the dark ';
$html .= '<strong>';
$html .= $_POST['shortDark'];
$html .= '</strong>';
$html .= '<br>Other specific fears (heights, etc) ';
$html .= '<strong>';
$html .= $_POST['shortSpecific'];
$html .= '</strong>';
$html .= '<br>Catastrophic fears ';
$html .= '<strong>';
$html .= $_POST['shortCatastrophic'];
$html .= '</strong>';
$html .= '<br>Reluctance to go to school ';
$html .= '<strong>';
$html .= $_POST['shortReluctance'];
$html .= '</strong>';
$html .= '<br>Repeated unwanted thoughts ';
$html .= '<strong>';
$html .= $_POST['shortRepeated'];
$html .= '</strong>';
$html .= '<br>Compulsive behaviors ';
$html .= '<strong>';
$html .= $_POST['shortCompulsive'];
$html .= '</strong>';
$html .= '<br>Rituals (has to repeat same action) ';
$html .= '<strong>';
$html .= $_POST['shortRituals'];
$html .= '</strong>';
$html .= '<br>Hair pulling ';
$html .= '<strong>';
$html .= $_POST['shortPulling'];
$html .= '</strong>';

$html .= '<br/><br/>Signature of Patient, Parent, or Legal Guardian ';
$html .= '<em><strong>';
$html .= $_POST['signature-space'];
$html .= '</strong></em>';


//echo $html;
//$html .= var_dump($_POST);
/*
$mpdf->WriteHTML($html, 2);

// To output into browser - begin
$mpdf->Output(); 
exit;
// To output into browser - end
*/
//Send via swiftmailer - begin
$content = $mpdf->Output('', 'S');
require_once 'swiftmailer-5.x/lib/swift_required.php';
$filename = $title . '.pdf';
$filename = preg_replace('/\s+/', '_', $filename);
$subject = $title;
if ($debug) {
    $mailto = 'pryshlyak@gmail.com';
} else {
    $mailto = 'fusionfamilyconsulting@gmail.com';
}
$from_name = 'www.fusionfamconsult.com';
$from_mail = 'fusionfamilyconsulting@gmail.com';
$message = 'Please find in attachment ' . $title;
// Create instance of Swift_Attachment with our PDF file
$attachment = new Swift_Attachment($content, $filename, 'application/pdf');

$message = Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom(array($from_mail => $from_name))
        ->setTo($mailto)
        ->setBody($message)
        ->attach($attachment);
$transport = Swift_MailTransport::newInstance();
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);
// Send the created message
$result = $mailer->send($message); //number of successful recipients
//Send via swiftmailer - end
echo '<p>';
if ($result) {
    echo $title . ' has been sent';
} else {
    echo $title . ' could not be sent. Try again later...';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
}
echo '</p>';
echo '<a href="patients.html">Back to forms</a>';
