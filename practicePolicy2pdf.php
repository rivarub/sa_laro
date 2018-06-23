<?php

$debug = false;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'Practice Policy';
$html = '<h3>Practice Policy</h3>';
$html .= 'Welcome to Fusion Family Consulting. Please read the following information carefully about our practice policies. Your understanding of these policies will help us work most effectively with you.';
$html .= '<h4>Treatment Participation</h4>';
$html .= 'Your treatment with us may involve taking medications, undergoing evaluation, and or engaging in various therapy treatments. If your treatment involves medication, your provider will explain the important risk benefits and side effects to you. If unexpected side effects are experienced upon taking medications, please call the office immediately.';
$html .= '<h4>Confidentiality</h4>';
$html .= 'Anything you reveal in your sessions is confidential and cannot be released to another person without your consent. Exceptions to this rule of confidentiality occur when the provider reasonably believes that there is imminent risk of harm to yourself or another person, or if a judge requests information as part of a trial. Also, if we are filing to your insurance company diagnosis codes are sent and insurance may request medical records to process your claims.';
$html .= '<h4>Phone Calls</h4>';
$html .= 'Our phone hours are Monday to Friday 9am-5pm. After hours calls will be returned for emergencies only. If there is an immediate medical emergency, please go to the nearest emergency room or call 911, if necessary. For other non-urgent calls, please leave both daytime and after-hours phone numbers where you can be reached.';
$html .= '<h4>Insurance</h4>';
$html .= 'Our providers are in network with multiple insurance companies, please call us to find out if we are accepting your insurance. If you are self pay or have an out of network insurance, payment for services is due at the time of service. We will submit out of network claims for you and if your insurance pays we will reimburse you appropriately.';
$html .= '<h4>Financial</h4>';
$html .= 'Payment is due at the time of the service. Both of our providers current charge is $250 an hour. Cash, check, Visa, MasterCard and Discover are accepted. If payment is not provided at the time of a visit (such as a check is rejected or an appointment is not kept and payment is not sent in), then an authorized credit card will be required to be placed on file prior to future appointments. The card can serve as your preferred (primary) method of payment or simply filed as a back up method of payment. If significant collaboration is needed outside of sessions in form of phone calls with the patient or family members responsible for their care or other professionals, a charge will be incurred based on time allocated. Phone calls lasting longer than 15 minutes will be charged accordingly. If the provider is needed to travel to an out of office consultation, such as at a school, charges are billed at 150% of the in office fee and include travel time.';
$html .= '<h4>Missed or late cancelled appointments</h4>';
$html .= 'Cancellation or rescheduling is required 24 hours in advance to avoid being charged for reserved appointment time. You are financially liable for the full fee if you fail to cancel your appointment 24 hours in advance. It is the patient’s responsibility to know their appointment times.';
$html .= '<h4>Medication Refills</h4>';
$html .= 'Fusion family consulting will like to ensure that you have adequate medication until your next follow up visit. Please allow 48 hours for processing of medication refills. If you cancel or reschedule your appointment, it is your responsibility to contact Fusion Family consulting at least one week in advance if you need additional medication until your next visit. Medication refills will only be provided for patients in active treatment. For scheduled medications (CII) that require a monthly prescription, such as ADHD medications, it is the patient\'s responsibility to inform our offices at least one week in advance for the refill request. Prescriptions for scheduled medications may be picked up by the patient at the office or called into applicable pharmacies.';
$html .= '<h4>Additional Requests</h4>';
$html .= 'Our providers do not testify in court, but if legal actions occur in which we are requested or subpoenaed to provide testimony (such as custody case) you will be responsible for providing the following even if the subpoena is sent from the opposing side of the case and even if your ongoing relationship with the provider has ended:';
$html .= '<br><br>1. Travel expenses.';
$html .= '<br>2. Fees at the provider\'s then current rates of $400/hour, plus 50% of that fee from the time expended in preparation and research. At least $1000,00 will be due prior to the court appearance.';
$html .= '<br>3. Fees at the provider\'s then current rates, plus 50% of that fee from the time expended in preparation and research. At least $1000,00 will be due prior to the court appearance.';
$html .= '<br>4. Record copying fees are $1,50 per page.';
$html .= '<br><br>Thank you for going through this important information. We look forward to working with you. The Practice policies was updated on 06/17/2018 and is subject to change at the discretion of Fusion Family Consulting.';
$html .= '<br><br><b>Please read and initial:</b>';

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
$html .= '<br><br>Patient Name: ';
$html .= $_POST['name-first'].' '.$_POST['name-middle'].' '.$_POST['name-last'];

$html .= '<br><br>Date of Birth: ';
$html .= $_POST['date'];

$html .= '<br><br>Signature of Patient, Parent, or Legal Guardian: ';
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
