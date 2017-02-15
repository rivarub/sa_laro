<?php
$debug = true;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'Patient Registration';
$html = '<h1>Patient Registration</h1>';

$html .= '<br>Patient Name: ';
$html .= '<strong>'.$_POST['name-first'].' '.$_POST['name-middle'].' '.$_POST['name-last'].'</strong>';
$html .= '<br>Gender: ';
$html .= '<strong>'.$_POST['gender'].'</strong>';
$html .= '<br>Date of Birth: ';
$html .= '<strong>'.$_POST['birth-date'].'</strong>';
$html .= '<br>Legal guardian: ';
$html .= '<strong>'.$_POST['guardian-name-first'].' '.$_POST['guardian-name-middle'].' '.$_POST['guardian-name-last'].'</strong>';
$html .= '<br>Relation: ';
$html .= '<strong>'.$_POST['guardian-relation'].'</strong>';
$html .= '<br>Address: ';
$html .= '<strong>'.$_POST['address'].'</strong>';
$html .= '<br>Phone: ';
$html .= '<strong>'.$_POST['phone-primary'];
if(!empty($_POST['phone-secondary'])) {
    $html .= ', '.$_POST['phone-secondary'];
}
$html .= '</strong>';
$html .= '<br>Email: ';
$html .= '<strong>'.$_POST['email'].'</strong>';
$html .= '<br>Insurance name: ';
$html .= '<strong>'.$_POST['insurance_name'].'</strong>';
$html .= '<br>Member ID and group #: ';
$html .= '<strong>'.$_POST['member_id'].'</strong>';
$html .= '<br>Subscriber name and date of birth: ';
$html .= '<strong>'.$_POST['subscriber-name'];
if(!empty($_POST['subscriber-date-birth'])) {
    $html .= ', '.$_POST['subscriber-date-birth'];
}
$html .= '</strong>';
$html .= '<br>Insurance claims address and phone number: (found on back of card): ';
$html .= '<strong>'.$_POST['insurance_claims'].'</strong>';
$html .= '<br>Please tell us very briefly what concerns bring you to our office: ';
$html .= '<strong>'.$_POST['concerns_bring'].'</strong>';
$html .= '<br>How did you hear about our program? ';
$html .= '<strong>'.$_POST['about_our_program'].'</strong>';

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
