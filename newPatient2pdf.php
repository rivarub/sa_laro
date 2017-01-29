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


$mpdf->WriteHTML($html, 2);
$mpdf->AddPage();

$html = '<h3>MEDICAL & MENTAL HEALTH HISTORY</h3>';
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
