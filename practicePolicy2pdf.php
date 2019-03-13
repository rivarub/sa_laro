<?php

$debug = false;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'Practice Policy';
$html = '<h3>Practice Policy</h3>';
$html .= 'Thank you for choosing Fusion Family Consulting for your health care needs. We look forward to working alongside you for your medical care. As part of your relationship with Fusion Family Consulting, a clear comprehension of our office policies is important so you will understand office procedures, individual responsibilities, financial liability, and the extent and limits of various forms of communications. These polices may be updated over time for which you will be notified.
<p>Please review these carefully and ask any questions you may have.  We are asking that you sign the bottom confirming that you have read them and understand.</p>';

$html .= '<h4>Treatment Participation</h4>';
$html .= 'Our treatment with us may involve undergoing evaluation, medications, and or engaging in various therapy treatments. If your treatment involves medication, your provider will explain the important risk benefits and side effects to you. If unexpected side effects are experienced upon taking medications, please call the office immediately.';

$html .= '<h4>Confidentiality</h4>';
$html .= 'Anything you reveal in your sessions is confidential and cannot be released to another person without your consent. Exceptions to this rule of confidentiality occur when the provider reasonably believes that there is imminent risk of harm to yourself or another person, or if a judge requests information as part of a trial. Also, if we are filing to your insurance company diagnosis codes are sent and insurance may request medical records to process your claims.';

$html .= '<h4>Phone Calls</h4>';
$html .= 'Routine brief phone calls made between the hours of 8:30 a.m. and 3:00 p.m. on weekdays will be returned as quickly as possible; calls will typically be returned the same day. Routine calls received after 3:00 p.m. or on weekends will be returned the following business day. If the call involves an urgent matter, please convey this when leaving your message. If the reason for the call is an emergency, please do not hesitate to go to the nearest emergency room or call 911.';

$html .= '<h4>Appointments</h4>';
$html .='<p>Patients can request appointments by telephone or through the patient portal.  Appointments will be confirmed by phone ahead of time; however, it is the patient’s or guardian’s responsibility to keep track of the appointment to avoid charges for missed or cancelled appointments.</p>
<p>If a patient arrives late to an appointment, it can be disruptive to other patients. The provider may cancel and reschedule the appointment if the patient is more than 20 minutes late to their appointment. The patient will be subject to the full charges of the appointment and these charges cannot be billed to insurance.</p>
<p>All appointments are scheduled per hour. Please note that most insurance companies will only allow 1hr sessions per visit. <u>Should the visit go over the scheduled time and the insurance deems the prolonged service a non-covered service, the patient will be financially responsible for the remaining balance.</u></p>';

$html .= '<h4>Appointment Changes/Cancellations</h4>';
$html .='<p>Patients will be charged the full session rate of $250 when cancellations occur unless notice is given at least 24 hours prior to the appointment. This fee will need to be paid in full before future service is provided.</p>
<p>If, for any reason, the doctor must cancel an appointment, the patient will be advised in advance. Providers are only allowed to cancel appointments for patients on the same day due to a clinical or personal, unforeseen emergency.</p>
<p>After three consecutive missed appointments within one calendar year, the provider may dismiss a patient from FFC due to treatment noncompliance.</p>';

$html .= '<h4>Telemedicine Policy</h4>';
$html .='<p>For more extensive phone calls, please schedule a phone appointment with your physician. There will be a routine charge of $250 per hour for these phone sessions based on the time spent per call. Please note that most insurance companies will not reimburse for phone consultation/sessions fees.</p>';

$html .= '<h4>Charges &amp; Payments</h4>';
$html .='<p>Payment for services is due at the time of service.</p>';
$html .='<p>CASH or CREDIT CARD (Visa, MasterCard, &amp; Discover) are the only acceptable forms of payment (please bring exact change as FFC does not carry cash).</p>';

$html .= '<h4>Credit Card on File Policy</h4>';
$html .='<p>For the convenience of the patient, FFC requires keeping your credit or debit card on file as a convenient method of payment for the portion of services that your insurance doesn’t cover, but for which you are liable.</p>';
$html .='<p>Your credit card information is kept confidential and secure and payments to your card are processed only after the claim has been filed and processed by your insurer, and the insurance portion of the claim has paid and posted to the account.</p>';

$html .= '<h4>Electronic Mail (Email) Policy</h4>';
$html .= 'By agreeing to communicate via email, you are assuming a certain degree of risk of breach of privacy beyond that inherent in other modes of traditional communication (such as telephone, fax, written, or face-to-face). We cannot ensure the confidentiality of our electronic communications against purposeful or accidental network interception. Due to this inherent vulnerability, we would caution you against emailing anything of a very private nature or personal information. Additionally, your doctor will save your email correspondence and these communications should be considered part of your medical record, Therefore, you should consider that our electronic communications may not be confidential and will be included in your medical chart. Never send emails of an urgent or emergent nature. Your doctor will make an effort to check email regularly; however,  please call our office if you have not received a reply within 72 hours.';

$html .= '<h4>Medication Refill Policy</h4>';
$html .='<p>Refills should be requested through your pharmacy. They can fax a request to (469) 863-7088.  If a request is made by phone, you will be informed to contact your pharmacy. Please ensure that you contact your pharmacy at least 72 hours prior to your medication running out.</p>';
$html .='<p>Prescriptions may only be refilled for patients who are current patients and who maintain their regularly scheduled appointments. For your safety, medication refills will not be called in over the weekend except in emergencies.</p>';
$html .='<p>Medication refills will NOT be performed in the following cases:</p>';
$html .='<ul><li>After office hours (including possibly late Friday afternoon requests) or over the weekend</li>';
$html .='<li>During holidays</li>';
$html .='<li>For patients who repeatedly miss appointments</li>';
$html .='<li>If there is suspicion of abuse of medications or failure to comply with urine drug screen requirements</li>';
$html .='</ul>';

$html .= '<h4>Prior Authorizations</h4>';
$html .='<p>Fusion Family Consulting will perform prior authorizations; however, it is important to understand that these authorizations do take several days to be approved.  Please contact your insurance as well if you know your services require prior authorization.</p>';

$html .= '<h4>Additional Requests</h4>';
$html .= 'Our providers do not testify in court, but if legal actions occur in which we are requested or subpoenaed to provide testimony (such as custody case) <u>you will be responsible</u> for providing the following even if the subpoena is sent from the opposing side of the case and even if your ongoing relationship with the provider has ended:';
$html .= '<br>Travel expenses.';
$html .= '<br>Hourly or per diem fees based on the provider\'s then current session rates, plus 50% of that fee from the time the provider leaves her office until her return.';

$html .= '<br><br>Thank you for going through this important information. We look forward to working with you. The Practice policies was updated on 01/25/2019 and is subject to change at the discretion of Fusion Family Consulting.';
//$html .= '<br><br><b>Please read and initial:</b>';
/*
if(isset($_POST['certify'])) {
  $html .= '<br><input type="checkbox" checked="checked" /> I understand and I am financially liable for the full fee if I fail to cancel my appointment 24 hours in advance.';
}
if(isset($_POST['certify1'])) {
  $html .= '<br><input type="checkbox" checked="checked" /> I understand that I am ultimately financially responsible for charges incurred regardless of insurance reimbursement policies.';
}
if(isset($_POST['certify2'])) {
  $html .= '<br><input type="checkbox" checked="checked" /> I authorize the release of any medical/health related information to prosess insurance claims.';
}
if(isset($_POST['certify3'])) {
  $html .= '<br><input type="checkbox" checked="checked" /> I have read and understand this Office Policy.';
}
*/
//$html .= '<br><br>Patient Name: ';
//$html .= $_POST['name-first'].' '.$_POST['name-middle'].' '.$_POST['name-last'];

//$html .= '<br><br>Date of Birth: ';
//$html .= $_POST['date'];

$html .= '<br><br>Signature of Patient or Parent/Legal Guardian: ';
$html .= $_POST['signature-space'];

$html .= '<br><br>Date: ';
$html .= $_POST['today_date'];

////echo $html;
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
/*
$mpdf->Output(); // into browser
exit;
*/
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
