<?php

$debug = true;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'New patient form';
$html = '<h4>New patient form</h4>';
$html .= '<h3>DEMOGRAPHIC INVENTORY</h3>';
$html .= '<div style="text-align:right">Today’s Date: ';
$html .= $_POST['today_date'] . '</div>';

//$html .= '<h6>1. Race/Ethnicity</h6>';
$html .= '<br><strong>1. Race/Ethnicity</strong>';
$html .= '<br>Ethnicity: ';
$html .= $_POST['ethnicity'];
$html .= '<br>';
$html .= 'Race: ';
$html .= $_POST['race'];
if ('Other' == $_POST['race'])
    $html .= ': ' . $_POST['race_other'];

$html .= '<br><strong>2. Current marital status: </strong>';
$html .= $_POST['marital'];

$html .= '<br><strong>3. If you are married or cohabitating with partner, how long has this been? </strong>';
$html .= $_POST['married_years'] . ' years ' . $_POST['married_months'] . ' months';

$html .= '<br><strong>4. Number of previous marriages? </strong>';
$html .= $_POST['married_number'];

$html .= '<br><strong>5. How many children do you have? </strong>';
$html .= $_POST['children_number'];

$html .= '<br><strong>6. TOTAL number of persons including yourself in your household? </strong>';
$html .= $_POST['number_persons_household'];

$html .= '<br><strong>7. How many years of formal education have you completed? </strong>';
$html .= $_POST['years_education'];

$html .= '<br><strong>8. Highest degree obtained: </strong>';
$html .= $_POST['degree'];
if ('Other' == $_POST['degree'])
    $html .= ': ' . $_POST['degree_other'];

$html .= '<br><strong>9. What best describes your current employment status? (Check one from each category a, b, & c) </strong>';

$html .= '<br><strong>a. Employment Status: </strong>';
$html .= $_POST['a_employment_status'];

$html .= '<br><strong>b. Student Status: </strong>';
$html .= $_POST['b_studentStatus'];

$html .= '<br><strong>c. Volunteer Status: </strong>';
$html .= $_POST['c_VolunteerStatus'];

$html .= '<br><strong>10. Type of occupation? </strong>';
$html .= $_POST['type_of_occupation'];

$html .= '<br><br><strong>Spousal Information </strong>';
$html .= '<br><strong>11. How many years of formal education has your spouse completed? </strong>';
$html .= $_POST['years_education_spouse'];

$html .= '<br><strong>12. Highest degree your spouse has obtained: </strong>';
$html .= $_POST['highest_degree_spouse'];
if ('Other' == $_POST['highest_degree_spouse'])
    $html .= ': ' . $_POST['highest_degree_spouse_other'];

$html .= '<br><strong>What best describes your spouse’s current employment status? (Check one from each a, b, & c)) </strong>';

$html .= '<br><strong>a. Employment Status: </strong>';
$html .= $_POST['a_employment_status_spouse'];

$html .= '<br><strong>b. Student Status: </strong>';
$html .= $_POST['b_student_status_spouse'];

$html .= '<br><strong>c. Volunteer Status: </strong>';
$html .= $_POST['c_volunteer_status_spouse'];

$html .= '<br><strong>14. Spouse’s type of occupation? </strong>';
$html .= $_POST['spous_type_of_occupation'];

$html .= '<br><br><strong>Household: income: </strong>';
$html .= $_POST['income'];
$html .= '&nbsp;<strong>Zip Code : </strong>';
$html .= $_POST['zip_Code'];
$html .= '<br><strong>Current residence: </strong>';
$html .= $_POST['current_residence'];
$html .= '<br><strong>What is the major mode of transportation that you use: </strong>';
$html .= $_POST['transportation'];

//$mpdf->AddPage();

$html .= '<h3>MEDICAL & MENTAL HEALTH HISTORY</h3>';
$html .= '<br><strong>Have you ever had any of the following (check all that apply): </strong>';
if (!empty($_POST['any_following']))
    $html .= implode(", ", $_POST['any_following']);
if (!empty($_POST['any_followinge_other']))
    $html .= ": " . $_POST['any_followinge_other'];

$html .= '<br><strong>Please list current or past medications you have taken for the treatment of any medical problem:</strong> ';
$html .= '<table border="1"><tr><th>Medical Problem</th><th>Medication (name/dose)</th><th>Start Date</th><th>Stop Date</th><th>Currently Taking?</th></tr>';
for ($i = 1; $i < 9; $i++) {
    $html .= '<tr>
<td>' . $_POST["medical_problem_$i"] . '</td>
<td>' . $_POST["medication_$i"] . '</td>
<td>' . $_POST["start_date_$i"] . '</td>
<td>' . $_POST["stop_date_$i"] . '</td>                                
<td>' . $_POST["currently_taking_$i"] . '</td>
</tr>';
}
$html .= '</table>';
$html .= '<br><strong>What kind of birth control are you using? </strong>';
$html .= $_POST['birth_control'];
$html .= '<br><strong>How much alcohol, including beer, do you drink per week? </strong>';
$html .= $_POST['alcohol'];
$html .= '<br><br><strong>Mental Health History</strong>';
$html .= '<br><strong>Have you ever had a problem with any of the following (check all that apply): </strong>';
if (!empty($_POST['psychologic_problem']))
    $html .= implode(", ", $_POST['psychologic_problem']);
if (!empty($_POST['psychologic_problem_other']))
    $html .= ": " . $_POST['psychologic_problem_other'];

$html .= '<br><strong>Please list current or past medications you have taken for the treatment of any mental health problem:</strong> ';
$html .= '<table border="1"><tr><th>Problem (e.g. Depression, Anxiety)</th><th>Medication (name and highest dose)</th><th>Start Date</th><th>Stop Date</th><th>Why stopped (e.g. felt better, didn’t help)</th></tr>';
for ($i = 1; $i < 9; $i++) {
    $html .= '<tr>
<td>' . $_POST["mental_problem_$i"] . '</td>
<td>' . $_POST["mental_medication_$i"] . '</td>
<td>' . $_POST["mental_start_date_$i"] . '</td>
<td>' . $_POST["mental_stop_date_$i"] . '</td>                                
<td>' . $_POST["mental_stopped_$i"] . '</td>
</tr>';
}
$html .= '</table>';
$html .= '<br><strong>Has anyone in your family ever been treated for any of the following (check all that apply):</strong> ';

$rodychi = ['Mother', 'Father', 'Aunt', 'Uncle', 'Brother', 'Sister', 'Children'];
$holovnyaky = ['Depression', 'Anxiety', 'Panic Attacks', 'Post Traumatic Stress', 'Bipolar (Manic / Depressive) Disorder', 'Schizophrenia', 'Alcohol Problems (including AA)', 'Drug Problems'];
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<th></th>';
foreach ($rodychi as $rodych) {
    $html .= "<th>$rodych</th>";
}
$html .= '</tr>';
foreach ($holovnyaky as $holovnyak) {
    $html .= "<tr><td>$holovnyak</td>";
    for($i = 0; $i < count($rodychi);$i++) {
//        $html .= '<td><input type="checkbox" ';
        $html .= '<td>';
//        $arr = explode(' ',trim($myvalue));
//        $problem = $arr[0];
//        $fieldName = $rodych.'_'.$problem;
//        $fieldName = strtolower($rodychi[$i]).'_'.explode(' ',trim(strtolower($holovnyak)))[0];
        $fieldName = $rodychi[$i].'_'.explode(' ',trim($holovnyak))[0];
//        $html .= $fieldName;
        if(isset($_POST[$fieldName])) {
            $html .= '+';
        } else {
            $html .= '&nbsp;';
        }
        $html .= '</td>';
    }
    $html .= '</tr>';
}
$html .= '</table>';

$html .= '<br><strong>Are you currently seeing a counselor or therapist?</strong> ';
$html .= $_POST['currently_counselor_therapist'];
$html .= '<br><strong>Are you having problems concentrating or problems remembering things?</strong> ';
$html .= $_POST['problems_concentrating'];
$html .= '<br><br><strong>Additional Medications</strong>';
$html .= '<br><strong>Please list any medications you are taking that <u>have not been listed above</u>, including birth control pills, any over the counter medications and herbal remedies (i.e. decongestants, St. John\'s Wart, vitamins).</strong> ';
$html .= '<table border="1"><tr><th>Medication (name/dose)</th><th>Start Date</th><th>Stop Date</th><th>Physician</th></tr>';
for ($i = 1; $i < 5; $i++) {
    $html .= '<tr>
<td>' . $_POST["not_listed_above_medication_$i"] . '</td>
<td>' . $_POST["not_listed_above_start_date_$i"] . '</td>
<td>' . $_POST["not_listed_above_stop_date_$i"] . '</td>
<td>' . $_POST["not_listed_above_physician_$i"] . '</td>
</tr>';
}
$html .= '</table>';
$html .= '<br><br><strong>Medication Allergies</strong>';
$html .= '<table border="1"><tr><th>Medication (name/dose)</th><th>Type of Reaction</th></tr>';
for ($i = 1; $i < 5; $i++) {
    $html .= '<tr>
<td>' . $_POST["allergies_medication_$i"] . '</td>
<td>' . $_POST["allergies_reaction_$i"] . '</td>
</tr>';
}
$html .= '</table>';

$html .= '<br><br><strong>Physical Activity</strong>';
$html .= '<br>Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor? ';
$html .= '<strong>'.$_POST['physical_activity_1'].'</strong>';

$html .= '<br>Do you feel pain in your chest when you do physical activity? ';
$html .= '<strong>'.$_POST['physical_activity_2'].'</strong>';

$html .= '<br>In the past month, have you had chest pain when you were doing physical activity? ';
$html .= '<strong>'.$_POST['physical_activity_3'].'</strong>';

$html .= '<br>Do you lose you balance because of dizziness or do you ever lose consciousness? ';
$html .= '<strong>'.$_POST['physical_activity_4'].'</strong>';

$html .= '<br>Do you have a bone or joint problem (for example, back, knee or hip) that could be made worse by a change in your physical activity? ';
$html .= '<strong>'.$_POST['physical_activity_5'].'</strong>';

$html .= '<br>Is you doctor currently prescribing drugs (for example, water pills) for your blood pressure or heart condition? ';
$html .= '<strong>'.$_POST['physical_activity_6'].'</strong>';

$html .= '<br>Do you know of <u>any other reason</u> why you should not do physical activity? ';
$html .= '<strong>'.$_POST['physical_activity_7'].'</strong>';

$html .= '<br><br><strong>How much do you exercise each week? </strong>';
$html .= $_POST['exercise_each_week'];


//$mpdf->AddPage();
$html .= '<strong>UTSW Antidepressant Treatment History Evaluation</strong>';
$html .= '<br>Have you taken any of the anti-depressant medications listed below? ';
$html .= '<br>If yes, please indicated: 1) What dosage did you take? 2) How many weeks did you take the medication? 3) Did it result in 50% reduction of depressive symptoms? 4) Did you have any troubling side effects that made it difficult to take the medication? ';
$html .= '<table border="1"><tr><th>Anti-Depressant Medication</th><th>Dose Taken</th><th>Weeks Taken</th><th>50% Reduction in<br> Symptoms</th><th>Troubling Side <br>Effects</th></tr>';
$html .= '<tr>';
$html .= '<td>Citalopram or CELEXA</td>';
$html .= '<td>' . $_POST['dose_citalopram'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_citalopram'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_citalopram'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_citalopram'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Fluoxetine or PROZAC</td>';
$html .= '<td>' . $_POST['dose_fluoxetine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_fluoxetine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_fluoxetine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_fluoxetine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Paroxetine or PAXIL</td>';
$html .= '<td>' . $_POST['dose_paroxetine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_paroxetine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_paroxetine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_paroxetine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Escitalopram or LEXAPRO</td>';
$html .= '<td>' . $_POST['dose_escitalopram'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_escitalopram'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_escitalopram'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_escitalopram'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Sertraline or ZOLOFT</td>';
$html .= '<td>' . $_POST['dose_ZOLOFT'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_ZOLOFT'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_ZOLOFT'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_ZOLOFT'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Paroxetine CR or PAXIL CR</td>';
$html .= '<td>' . $_POST['dose_Paroxetine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Paroxetine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Paroxetine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Paroxetine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Fluvoxamine or LUVOX</td>';
$html .= '<td>' . $_POST['dose_LUVOX'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_LUVOX'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_LUVOX'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_LUVOX'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Duloxetine or CYMBALTA</td>';
$html .= '<td>' . $_POST['dose_CYMBALTA'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_CYMBALTA'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_CYMBALTA'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_CYMBALTA'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Venlafaxine XR or EFFEXOR XR</td>';
$html .= '<td>' . $_POST['dose_Venlafaxine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Venlafaxine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Venlafaxine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Venlafaxine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Mirtazapine or REMERON</td>';
$html .= '<td>' . $_POST['dose_REMERON'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_REMERON'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_REMERON'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_REMERON'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Bupropion or WELLBUTRIN</td>';
$html .= '<td>' . $_POST['dose_Bupropion'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Bupropion'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Bupropion'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Bupropion'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Nortriptyline or PAMELOR</td>';
$html .= '<td>' . $_POST['dose_Nortriptyline'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Nortriptyline'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Nortriptyline'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Nortriptyline'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Protriptyline or VIVACTIL</td>';
$html .= '<td>' . $_POST['dose_Protriptyline'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Protriptyline'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Protriptyline'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Protriptyline'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Amitriptyline or ELAVIL</td>';
$html .= '<td>' . $_POST['dose_Amitriptyline'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Amitriptyline'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Amitriptyline'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Amitriptyline'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Amoxapine or MOXADIL</td>';
$html .= '<td>' . $_POST['dose_Amoxapine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Amoxapine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Amoxapine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Amoxapine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Imipramine or TOFRANIL</td>';
$html .= '<td>' . $_POST['dose_Imipramine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Imipramine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Imipramine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Imipramine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Desipramine or NORPRAMINE</td>';
$html .= '<td>' . $_POST['dose_Desipramine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Desipramine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Desipramine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Desipramine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Trimipramine or SURMONTIL</td>';
$html .= '<td>' . $_POST['dose_Trimipramine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Trimipramine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Trimipramine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Trimipramine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Clomipramine or ANAFRAMIL</td>';
$html .= '<td>' . $_POST['dose_Clomipramine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Clomipramine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Clomipramine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Clomipramine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Maprotilene or LUDIOMIL</td>';
$html .= '<td>' . $_POST['dose_Maprotilene'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Maprotilene'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Maprotilene'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Maprotilene'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Doxepin or SINEQUAN</td>';
$html .= '<td>' . $_POST['dose_Doxepin'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Doxepin'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Doxepin'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Doxepin'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Nomifensine or MERITAL</td>';
$html .= '<td>' . $_POST['dose_Nomifensine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Nomifensine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Nomifensine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Nomifensine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Isocarboxazid or MARPLAN</td>';
$html .= '<td>' . $_POST['dose_Isocarboxazid'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Isocarboxazid'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Isocarboxazid'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Isocarboxazid'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Tranylcypromine or PARNATE</td>';
$html .= '<td>' . $_POST['dose_Tranylcypromine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Tranylcypromine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Tranylcypromine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Tranylcypromine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Phenelzine or NARDIL</td>';
$html .= '<td>' . $_POST['dose_Phenelzine'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Phenelzine'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Phenelzine'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Phenelzine'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Trazodone or DESYREL</td>';
$html .= '<td>' . $_POST['dose_Trazodone'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Trazodone'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Trazodone'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Trazodone'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Nefazodone or SERZONE</td>';
$html .= '<td>' . $_POST['dose_Nefazodone'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Nefazodone'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Nefazodone'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Nefazodone'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Selegiline or EMSAM</td>';
$html .= '<td>' . $_POST['dose_Selegiline'] . ' mg</td>';
$html .= '<td>' . $_POST['weeks_Selegiline'] . '</td>';
$html .= '<td>' . $_POST['reduction_symptoms_Selegiline'] . '</td>';
$html .= '<td>' . $_POST['troubling_side_effects_Selegiline'] . '</td>';
$html .= '</tr>';
$html .= '</table>';

//$mpdf->AddPage();
$html .= '<strong>DIAGNOSTIC SCREENING QUESTIONNAIRE (DSQ)</strong>';
$html .= '<br>Name: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_name'].'</strong>';
$html .= ' Age: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_age'].'</strong>';
$html .= ' Gender: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_gender'].'</strong>';
$html .= ' Date: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_date'].'</strong>';

$html .= '<br><br><strong>QUICK INVENTORY OF DEPRESSIVE SYMPTOMATOLOGY (SELF-REPORT) (QIDS-SR<sub>16</sub>)</strong>';
$html .= '<br>Subject ID: ';
$html .= '<strong>'.$_POST['QUICK_ID'].'</strong>';
$html .= ' Date: ';
$html .= '<strong>'.$_POST['QUICK_date'].'</strong>';
$html .= '<br>Please choose the one response to each item that best describes you for the past seven days.';
$html .= '<br>1. Falling Asleep:<br>';
$html .= '<strong>'.$_POST['QUICK_Asleep'].'</strong>';
$html .= '<br>2. Sleep During the Night:<br>';
$html .= '<strong>'.$_POST['QUICK_Sleep'].'</strong>';




//if(isset($_POST['physical_activity_1'])) {
//    if('yes' == $_POST['physical_activity_1']) {
//        
//    }
//}

//echo $html;
//$html .= var_dump($_POST);
$mpdf->WriteHTML($html, 2);
/*
  $stylesheet = file_get_contents('css/mpdf.css'); // external css
  $mpdf->WriteHTML($stylesheet, 1);
  $html = file_get_contents($url);
  preg_match('/<title>(.*)<\/title>/i', $html, $match);
  $title = $match[1];
  //
  //$form = str_replace('<input value="send" onclick="send();" type="submit">', '', $form);

  $form = preg_replace('/<input\s[^<>]*type[^<>]*[text|tel|email][^<>]*value="([^"]*)"[^<>]*>/i', '<strong>$1</strong>', $form);

  $form = preg_replace('/<input\s[^<>]*value="([^"]*)"[^<>]*type[^<>]*[text|tel|email][^<>]*>/i', '<strong>$1</strong>', $form);
  //or use looking foward
  //or find <input type=text, then find value inside...

  $form = preg_replace_callback('/<textarea\s[^<>]*>([^<>]*)<\/textarea>/i',
  function ($matches) {
  return '<br><strong><em>'.preg_replace('/\n/', '<br>', $matches[1]).'</em></strong>';
  },
  $form);
  //$form = preg_replace('/<textarea\s[^<>]*>([^<>]*)<\/textarea>/i', '<em>$1</em>', $form);
  $form = preg_replace('/<div\s[^<>]*class[^<>]*submit.*<\/div>/si', '', $form);
  //$form = str_replace('<input type="submit" value="send" onclick="send();">', '', $form);
  //$form = preg_replace('/<input\s[^<>]*type[^<>]*submit[^<>]*>/','', $form);
  $html = preg_replace('/<form[^>]*>.*<\/form>/si', $form, $html);
  //$html = var_dump($form);
  $mpdf->WriteHTML($html, 2);
 */
$mpdf->Output(); // into browser
exit;
/*
  //Send via mail() - begin
  $content = $mpdf->Output('', 'S');
  $content = chunk_split(base64_encode($content));
  $mailto = 'pryshlyak@gmail.com';
  $from_name = 'www.fusionfamconsult.com';
  $from_mail = 'donotreply_UA@godaddy.com';
  $uid = md5(uniqid(time()));
  $subject = $title;
  $message = 'Please find in attachment '.$title;
  $filename = $title . '.pdf';
  $filename = preg_replace('/\s+/', '_', $filename);
  $header = "From: ".$from_name." <".$from_mail.">\r\n";
  //$header .= "Reply-To: ".$replyto."\r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
  $header .= "This is a multi-part message in MIME format.\r\n";
  $header .= "--".$uid."\r\n";
  $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
  $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
  $header .= $message."\r\n\r\n";
  $header .= "--".$uid."\r\n";
  $header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
  $header .= "Content-Transfer-Encoding: base64\r\n";
  $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
  $header .= $content."\r\n\r\n";
  $header .= "--".$uid."--";
  $is_sent = @mail($mailto, $subject, "", $header);
  //Send via mail() - end
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
