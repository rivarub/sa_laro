<?php
$debug = true;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$form = '<form>' . $_POST['html'] . '</form>';
//if (count($_POST) > 0) {
//
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );
//
//    foreach($_POST as $name => $post) {
//      $formvars = array($name => $post . " \n");
//    }
//
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $formvars);
//    $html = curl_exec($ch);
//    curl_close($ch);
//
//} elseif (ini_get('allow_url_fopen')) {
//    $html = file_get_contents($url);
//
//} else {
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
//    $html = curl_exec($ch);
//    curl_close($ch);
//}
//$mpdf->WriteHTML('This is it');
//$mpdf->WriteHTML($url);
//$mpdf->WriteHTML($nameFirst);
//$mpdf->CSSselectMedia='print';
//$mpdf->setBasePath($url);
$stylesheet = file_get_contents('css/mpdf.css'); // external css
$mpdf->WriteHTML($stylesheet, 1);
$html = file_get_contents($url);
preg_match('/<title>(.*)<\/title>/i', $html, $match);
$title = $match[1];
//
//$form = str_replace('<input value="send" onclick="send();" type="submit">', '', $form);
//$html = preg_replace('/<textarea[^>]*>(.*)<\/textarea>/si', '<em>$1</em>', $form);
$form = preg_replace('/<div\s[^<>]*class[^<>]*submit.*<\/div>/si', '', $form);
//$form = str_replace('<input type="submit" value="send" onclick="send();">', '', $form);
//$form = preg_replace('/<input\s[^<>]*type[^<>]*submit[^<>]*>/','', $form);
$html = preg_replace('/<form[^>]*>.*<\/form>/si', $form, $html);
//$html = var_dump($form);
$mpdf->WriteHTML($html, 2);

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
if($debug) {
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
    echo $title.' has been sent';
} else {
    echo $title.' could not be sent. Try again later...';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
}
echo '</p>';
echo '<a href="patients.html">Back to forms</a>';