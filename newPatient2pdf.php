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
$html .= '<strong>1. Race/Ethnicity</strong>';
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
$html .= $_POST['married_number'].'&nbsp;';

$html .= '<br><strong>5. How many children do you have? </strong>';
$html .= $_POST['children_number'].'&nbsp;';

$html .= '<br><strong>6. TOTAL number of persons including yourself in your household? </strong>';
$html .= $_POST['number_persons_household'];

$html .= '<br><strong>7. How many years of formal education have you completed? </strong>';
$html .= $_POST['years_education'].'&nbsp;';

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
$html .= $_POST['years_education_spouse'].'&nbsp;';

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

$html .= '<formfeed><h3>MEDICAL & MENTAL HEALTH HISTORY</h3>';
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
$html .= '<formfeed><strong>UTSW Antidepressant Treatment History Evaluation</strong>';
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
$html .= '<formfeed><strong>DIAGNOSTIC SCREENING QUESTIONNAIRE (DSQ)</strong>';
$html .= '<br>Name: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_name'].'</strong>';
$html .= ' Age: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_age'].'</strong>';
$html .= ' Gender: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_gender'].'</strong>';
$html .= ' Date: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_SCREENING_date'].'</strong>';

$html .= '<br><br>1. There have been times when I felt down, depressed, or sad for several weeks in a row: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_felt_down'].'</strong>';

$html .= '<br><br>2. There have been times when I lost interest or pleasure in things I usually enjoyed, and it lasted for several weeks in a row: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_lost_interest'].'</strong>';

$html .= '<br>If you answered YES to questions 1 or 2, when you felt that way did you also notice... ';
$html .= '<br>Not feeling like eating...or the opposite, eating more than usual: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_eating'].'</strong>';

$html .= '<br>Not getting enough sleep...or the opposite, sleeping too much: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_sleep'].'</strong>';

$html .= '<br>Feeling restless and couldn\'t sit still...or the opposite, feeling slowed down: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_restless'].'</strong>';

$html .= '<br>Feeling low in energy or getting tired for no reason: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_low_energy'].'</strong>';

$html .= '<br>Feeling guilty most of the time or feeling worthless: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_guilty'].'</strong>';

$html .= '<br>Having trouble concentrating or trouble making decisions: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_trouble_concentrating'].'</strong>';

$html .= '<br>Thinking that life is not worth living or thinking about dying: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_dying'].'</strong>';

$html .= '<br><br>Have you been feeling this way the last 2 weeks? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_last_2_weeks'].'</strong>';
$html .= '<br>If YES, how long have you felt this way? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_2_weeks_how_long'].'</strong>';

$html .= '<br><br>Have you felt this way before? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_before'].'</strong>';
$html .= '<br>If YES, how many times have you felt this way? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_before_times'].'</strong>';
$html .= '<br>How old were you when you first felt this way? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_old'].'</strong>';

$html .= '<br><br>3. I have had a period of six months or more when I worried excessively and found it difficult to control my anxiety: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3'].'</strong>';

$html .= '<br>If you answered YES to question 3 please answer the following questions.<br>
                                        More days than not during the last 6 months: ';
$html .= '<br>I worried excessively and found it difficult to control my anxiety: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_control'].'</strong>';

$html .= '<br>I felt tense or keyed-up, or felt restless: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_tense'].'</strong>';

$html .= '<br>I have had trouble concentrating or my mind goes blank at times: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_concentrating'].'</strong>';

$html .= '<br>I have felt easily annoyed or irritable: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_annoyed'].'</strong>';

$html .= '<br>I have had tense or sore muscles: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_muscles'].'</strong>';

$html .= '<br>I have not been getting enough sleep: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_3_sleep'].'</strong>';

$html .= '<br><br>4. I have had a panic attack when I suddenly felt frightened or anxious or suddenly developed a lot of physical symptoms: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_4'].'</strong>';
$html .= '<br>(The symptoms may have included some of the following:<br>heart pounding or racing, sweating, shaking or trembling, shortness of breath, choking feeling, chest pain, upset stomach, feeling dizzy or faint, feeling spaced-out, fear of losing control, fear of dying, numbness or tingling, chills or hot flushes.) ';
$html .= '<br>If you answered YES to question 4 please answer the following questions.<br>
                                        The month after this happened did you: ';
$html .= '<br>I had a lot of concern about this happening again. (For example you may have been concerned that if it happened again you might lose control, or have a heart attack.): ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_4_concern'].'</strong>';

$html .= '<br>I changed what I was doing or where I was going because I was concerned that this might happen again: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_4_again'].'</strong>';

$html .= '<br>This only happens to me in certain situations. Some of the situations are things such as:<br>seeing a snake or a dog; being in a storm; being in high places; going swimming; seeing blood; being in places that are small and enclosed; driving the car; having to talk or perform in front of people; going to crowded places; etc.: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_4_certain_situations'].'</strong>';

$html .= '<br><br>5. I have been bothered by thoughts that did not make any sense and kept coming back even when I tried not to have them: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_5'].'</strong>';

$html .= '<br><br>6. I cannot resist doing some things over and over again, like washing my hands repeatedly, or checking the same thing repeatedly, or counting things: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_6'].'</strong>';

$html .= '<br><br>7. I keep thinking about, or dreaming about a traumatic event that involved me or someone I cared about. The event(s) were life threatening, such as a serious accident, a physical assault, or seeing someone killed or badly injured: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_7'].'</strong>';

$html .= '<br><br>8. There have been days when I was feeling so good, high, excited, irritable, or hyper that other people thought I was not my normal self or I got into trouble: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_8'].'</strong>';

$html .= '<br><br>9. There have been days when I felt so good about myself that I thought I could do just about anything: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_9'].'</strong>';

$html .= '<br><br>10. There have been times when I only needed a couple of hours of sleep each night: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_10'].'</strong>';

$html .= '<br><br>11. There have been days when other people noticed that I was talking a lot more than usual: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_11'].'</strong>';

$html .= '<br><br>12. There have been days when my thoughts seemed to be racing through my head: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_12'].'</strong>';

$html .= '<br><br>13. There have been days when I was easily distracted and had trouble paying attention: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_13'].'</strong>';

$html .= '<br><br>14. There have been times when I started so many projects that I could never finish them all: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_14'].'</strong>';

$html .= '<br><br>15. There have been times when I did a lot or reckless things such as, spending a lot of money on things I didn’t need, or getting sexually involved with people I normally would not get involved with: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_15'].'</strong>';
$html .= '<br>If you answered YES any of the questions 8 through 15, please answer the following questions. ';
$html .= '<br>Did this last for more than 4 days in a row? ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_15_more_4_days'].'</strong>';

$html .= '<br>Did this last for a week or more?  ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_15_week'].'</strong>';

$html .= '<br>I have felt some of these things in the last week?  ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_15_last_week'].'</strong>';

$html .= '<br><br>16. I have heard things that other people couldn’t hear, such as noises, or the voices of people whispering or talking: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_16'].'</strong>';

$html .= '<br><br>17. I have seen visions or have seen things that other people couldn’t see: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_17'].'</strong>';

$html .= '<br><br>18. I have had a problem with alcohol or drug use...or my friends, family, or employers have told me they thought I had a problem with alcohol or drug use: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_18'].'</strong>';

$html .= '<br>Comments: ';
$html .= '<strong>'.$_POST['DIAGNOSTIC_Comments'].'</strong>';

$html .= '<formfeed><strong>QUICK INVENTORY OF DEPRESSIVE SYMPTOMATOLOGY (SELF-REPORT) (QIDS-SR<sub>16</sub>)</strong>';
$html .= '<br>Subject ID: ';
$html .= '<strong>'.$_POST['QUICK_ID'].'</strong>';
$html .= ' Date: ';
$html .= '<strong>'.$_POST['QUICK_date'].'</strong>';
$html .= '<br>Please choose the one response to each item that best describes you for the past seven days.';
$html .= '<br>1. Falling Asleep:<br>';
$html .= '<strong>'.$_POST['QUICK_Asleep'].'</strong>';
$html .= '<br>2. Sleep During the Night:<br>';
$html .= '<strong>'.$_POST['QUICK_Sleep'].'</strong>';
$html .= '<br>3. Waking Up Too Early:<br>';
$html .= '<strong>'.$_POST['QUICK_Waking'].'</strong>';
$html .= '<br>4. Sleeping Too Much:<br>';
$html .= '<strong>'.$_POST['QUICK_Sleeping_Too_Much'].'</strong>';
$html .= '<br>5. Feeling Sad:<br>';
$html .= '<strong>'.$_POST['QUICK_Sad'].'</strong>';
$html .= '<br>6. Decreased Appetite:<br>';
$html .= '<strong>'.$_POST['QUICK_Appetite'].'</strong>';
$html .= '<br>7. Increased Appetite:<br>';
$html .= '<strong>'.$_POST['QUICK_Increased'].'</strong>';
$html .= '<br>8. Decreased Weight (Within the Last Two Weeks):<br>';
$html .= '<strong>'.$_POST['QUICK_Decreased_Weight'].'</strong>';
$html .= '<br>9. Increased Weight (Within the Last Two Weeks):<br>';
$html .= '<strong>'.$_POST['QUICK_Increased_Weight'].'</strong>';
$html .= '<br>10. Concentration/Decision Making:<br>';
$html .= '<strong>'.$_POST['QUICK_Concentration'].'</strong>';
$html .= '<br>11. View of Myself:<br>';
$html .= '<strong>'.$_POST['QUICK_Myself'].'</strong>';
$html .= '<br>12. Thoughts of Death or Suicide:<br>';
$html .= '<strong>'.$_POST['QUICK_Suicide'].'</strong>';
$html .= '<br>13. General Interest:<br>';
$html .= '<strong>'.$_POST['QUICK_Interest'].'</strong>';
$html .= '<br>14. Energy Level:<br>';
$html .= '<strong>'.$_POST['QUICK_Energy'].'</strong>';
$html .= '<br>15. Feeling slowed down:<br>';
$html .= '<strong>'.$_POST['QUICK_slowed_down'].'</strong>';
$html .= '<br>16. Feeling restless:<br>';
$html .= '<strong>'.$_POST['QUICK_restless'].'</strong>';

$html .= '<br><br><u>To Score:</u><br>';
$html .= '<br>1. Enter the highest score on any 1 of the 4 sleep items (1-4): ';
$html .= '<strong>'.($_POST['score1'] > 0?:$_POST['score1'].'&nbsp;').'</strong>'; // hack to show 0 on PDF ;)
$html .= '<br>2. Item 5: ';
$html .= '<strong>'.$_POST['score2'].'&nbsp;</strong>'; // works for all numbers ;)
$html .= '<br>3. Enter the highest score on any 1 appetite/weight item (6-9): ';
$html .= '<strong>'.$_POST['score3'].'&nbsp;</strong>';
$html .= '<br>4. Item 10: ';
$html .= '<strong>'.$_POST['score4'].'&nbsp;</strong>';
$html .= '<br>5. Item 11: ';
$html .= '<strong>'.$_POST['score5'].'&nbsp;</strong>';
$html .= '<br>6. Item 12: ';
$html .= '<strong>'.$_POST['score6'].'&nbsp;</strong>';
$html .= '<br>7. Item 13: ';
$html .= '<strong>'.$_POST['score7'].'&nbsp;</strong>';
$html .= '<br>8. Item 14: ';
$html .= '<strong>'.$_POST['score8'].'&nbsp;</strong>';
$html .= '<br>9. Enter the highest score on either of the 2 psychomotor items (15 and 16): ';
$html .= '<strong>'.$_POST['score9'].'&nbsp;</strong>';
$html .= '<br>TOTAL SCORE (Range 0-27): ';
$html .= '<strong>'.$_POST['scoreTOTAL'].'&nbsp;</strong>';

$html .= '<formfeed><strong>National Network of Depression Centers</strong>';
$html .= '<br>Common Assessment Package: <em>Self-Rated</em>';
$html .= '<br><u>Patient Health Questionnaire (PHQ-9)</u>';
$html .= '<br><br>Please choose one number for each statement:';
$html .= '<br>0 - Not at all, 1 - Several days, 2 - More than half the days, 3 - Nearly every day';
$html .= '<br><br>Over the <strong>last 2 weeks</strong>, how often have you been bothered by any of the following problems?';
$html .= '<br>1. Little interest or pleasure in doing things: ';
$html .= '<strong>'.$_POST['PHQ-9_little'].'&nbsp;</strong>';
$html .= '<br>2. Feeling down, depressed, or hopeless: ';
$html .= '<strong>'.$_POST['PHQ-9_hopeless'].'&nbsp;</strong>';
$html .= '<br>3. Trouble falling or staying asleep, or sleeping too much: ';
$html .= '<strong>'.$_POST['PHQ-9_trouble'].'&nbsp;</strong>';
$html .= '<br>4. Feeling tired or having little energy: ';
$html .= '<strong>'.$_POST['PHQ-9_tired'].'&nbsp;</strong>';
$html .= '<br>5. Poor appetite or overeating: ';
$html .= '<strong>'.$_POST['PHQ-9_appetite'].'&nbsp;</strong>';
$html .= '<br>6. Feeling bad about yourself - or that you are a failure or have let yourself or your family down: ';
$html .= '<strong>'.$_POST['PHQ-9_yourself'].'&nbsp;</strong>';
$html .= '<br>7. Trouble concentrating on things, such as reading the newspaper or watching television: ';
$html .= '<strong>'.$_POST['PHQ-9_concentrating'].'&nbsp;</strong>';
$html .= '<br>8. Moving or speaking so slowly that other people could have noticed. Or the opposite – being so fidgety or restless that you have been moving around a lot more than usual: ';
$html .= '<strong>'.$_POST['PHQ-9_slowly'].'&nbsp;</strong>';
$html .= '<br>9. Thoughts that you would be better off dead, or of hurting yourself: ';
$html .= '<strong>'.$_POST['PHQ-9_hurting'].'&nbsp;</strong>';

$html .= '<br><br>10. If you checked off <u>any</u> problems, how <u>difficult</u> have these problems made it for you to do your work, take care of things at home, or get along with other people? ';
$html .= '<strong>'.$_POST['PHQ-9_problems'].'&nbsp;</strong>';

$html .= '<br><br>PHQ-9 Copyright © 1999 Pfizer Inc. All rights reserved. ';
$html .= '<br>NNDC Common Assessment Package: Self-Rated (January 25, 2011) ';

$html .= '<formfeed><strong>National Network of Depression Centers</strong>';
$html .= '<br>Common Assessment Package: <em>Self-Rated</em>';
$html .= '<br><u>Generalized Anxiety Disorder Scale (GAD-7)</u>';
$html .= '<br><br>Please choose one number for each statement:';
$html .= '<br>0 - Not at all, 1 - Several days, 2 - More than half the days, 3 - Nearly every day';
$html .= '<br><br>Over the <strong>last 2 weeks</strong>, how often have you been bothered by any of the following problems?';
$html .= '<br>1. Feeling nervous, anxious, or on edge: ';
$html .= '<strong>'.$_POST['GAD-7_nervous'].'&nbsp;</strong>';
$html .= '<br>2. Not being able to stop or control worrying: ';
$html .= '<strong>'.$_POST['GAD-7_worrying'].'&nbsp;</strong>';
$html .= '<br>3. Worrying too much about different things: ';
$html .= '<strong>'.$_POST['GAD-7_different'].'&nbsp;</strong>';
$html .= '<br>4. Trouble relaxing: ';
$html .= '<strong>'.$_POST['GAD-7_relaxing'].'&nbsp;</strong>';
$html .= '<br>5. Being so restless it is hard to sit still: ';
$html .= '<strong>'.$_POST['GAD-7_restless'].'&nbsp;</strong>';
$html .= '<br>6. Becoming easily annoyed or irritable: ';
$html .= '<strong>'.$_POST['GAD-7_irritable'].'&nbsp;</strong>';
$html .= '<br>7. Feeling afraid as if something awful might happen: ';
$html .= '<strong>'.$_POST['GAD-7_afraid'].'&nbsp;</strong>';

$html .= '<br><br>If you checked off <u>any</u> problems, how <u>difficult</u> have these problems made it for you to do your work, take care of things at home, or get along with other people? ';
$html .= '<strong>'.$_POST['GAD-7_problems'].'&nbsp;</strong>';

$html .= '<br><br>Spitzer RL, Kroenke K, Williams JBW, Lowe B. A brief measure for assessing generalized anxiety disorder: the GAD-7. Arch Intern Med 2006;166:1092-97. ';
$html .= '<br>NNDC Common Assessment Package: Self-Rated (January 25, 2011) ';

$html .= '<formfeed><strong>National Network of Depression Centers</strong>';
$html .= '<br>Common Assessment Package: <em>Self-Rated</em>';
$html .= '<br><u>Altman Self-Rating Mania Scale (ASRM)</u>';
$html .= '<br><u><strong>Instructions:</strong></u>';
$html .= '<ul><li>On this questionnaire are groups of 5 statements; read each group of statements carefully.</li>';
$html .= '<li>Choose the one statement in each group that best describes the way you have been feeling for the <strong><u>past week</u></strong>.</li>';
$html .= '<li><strong><u>Please note:</u></strong>The word “occasionally” when used here means once or twice; “often” means several times or more; “frequently” means most of the time.</li></ul>';
$html .= '<br>1. ';
$html .= '<strong>'.$_POST['ASRM_1'].'&nbsp;</strong>';
$html .= '<br>2. ';
$html .= '<strong>'.$_POST['ASRM_2'].'&nbsp;</strong>';
$html .= '<br>3. ';
$html .= '<strong>'.$_POST['ASRM_3'].'&nbsp;</strong>';
$html .= '<br>4. ';
$html .= '<strong>'.$_POST['ASRM_4'].'&nbsp;</strong>';
$html .= '<br>5. ';
$html .= '<strong>'.$_POST['ASRM_5'].'&nbsp;</strong>';

$html .= '<br><br>NNDC Common Assessment Package: Self-Rated (January 25, 2011) ';

$html .= '<formfeed><strong>National Network of Depression Centers</strong>';
$html .= '<br>Common Assessment Package: <em>Self-Rated (Baseline)</em>';
$html .= '<br><u>Work and Social Adjustment Scale (WSAS)</u>';
$html .= '<br><u><strong>Instructions: </strong></u>';
$html .= '<br>Rate each of the following questions on a 0 to 8 scale: 0 indicates <u>no impairment</u> at all and 8 indicates <u>very severe impairment</u>. Please choose your responses below.';
$html .= '<br>1. Because of my mood problems, my ability to work is impaired. 0 means not at all impaired and 8 means very severely impaired to the point I can’t work: ';
$html .= '<strong>'.$_POST['WSAS_1'].'&nbsp;</strong>';
$html .= '<br>2. Because of my mood problems, my home management (cleaning, tidying, shopping, cooking, looking after home or children, paying bills) is impaired. 0 means not at all impaired and 8 means very severely impaired: ';
$html .= '<strong>'.$_POST['WSAS_2'].'&nbsp;</strong>';
$html .= '<br>3. Because of my mood problems, my social leisure activities (with other people, such as parties, bars, clubs, outings, visits, dating, home entertainment) are impaired. 0 means not at all impaired and 8 means very severely impaired: ';
$html .= '<strong>'.$_POST['WSAS_3'].'&nbsp;</strong>';
$html .= '<br>4. Because of my mood problems, my private leisure activities (done alone, such as reading, gardening, collecting, sewing, walking alone) are impaired. 0 means not at all impaired and 8 means very severely impaired: ';
$html .= '<strong>'.$_POST['WSAS_4'].'&nbsp;</strong>';
$html .= '<br>5. Because of my mood problems, my ability to form and maintain close relationships with others, including those I live with, is impaired. 0 means not at all impaired and 8 means very severely impaired: ';
$html .= '<strong>'.$_POST['WSAS_5'].'&nbsp;</strong>';

$html .= '<br><br>Mundt, J.C., Marks, I.M., Shear, M.K., & Greist, J.H. (2002). The Work and Social Adjustment Scale: a simple measure of impairment in functioning. Br J Psychiatry, 180, 461-464.';
$html .= '<br><br>NNDC Common Assessment Package, Baseline: Self-Rated (February 14, 2011) ';
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
