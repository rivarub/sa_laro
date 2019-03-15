<?php

$debug = false;
require_once 'mpdf60/mpdf.php';
$mpdf = new mPDF();
$url = $_POST['url'];
$title = 'Credit Card Authorization';
$html = '<h3>Credit Card Authorization</h3>';
$html .= '<p>I authorize Fusion Family Consulting to charge the portion of my bill that is my financial responsibility to the following credit or debit card: </p>';
$html .= '<br>Type: ';
if(isset($_POST['card_type'])) {
  $html .= '<b>'.$_POST['card_type'].'</b>';
}
$html .= '<br>Credit Card Number: ';
if(isset($_POST['card_number'])) {
  $html .= '<b>'.$_POST['card_number'].'</b>';
}
$html .= '<br>Expiration Date: ';
if(isset($_POST['card_expiration_date_month'])) {
  $html .= '<b>'.$_POST['card_expiration_date_month'];
}
if(isset($_POST['card_expiration_date_year'])) {
  $html .=' / '. $_POST['card_expiration_date_year'].'</b>';
}
$html .= '<br>Cardholder Name: ';
if(isset($_POST['card_holder_name'])) {
  $html .= '<b>'.$_POST['card_holder_name'].'</b>';
}
$html .= '<br>Billing Address: ';
if(isset($_POST['billing_address'])) {
  $html .= '<b>'.$_POST['billing_address'].'</b>';
}
$html .= '<br>City: ';
if(isset($_POST['city'])) {
  $html .= '<b>'.$_POST['city'].'</b>';
}
$html .= ' State: ';
if(isset($_POST['state'])) {
  $html .= '<b>'.$_POST['state'].'</b>';
}
$html .= ' Zip: ';
if(isset($_POST['zip'])) {
  $html .= '<b>'.$_POST['zip'].'</b>';
}

$html .= '<br><br>Signature: ';
$html .= '<b>'.$_POST['signature-space'].'</b>';
$html .= '<p>I, the undersigned, authorize and request Fusion Family Consulting to charge my credit card, indicated above, for balances due for services rendered that my insurance company identifies as my financial responsibility.</p>
                          <p>This authorization relates to all payments not covered by my insurance company for services provided to me by Fusion Family Consulting. This authorization will remain in effect until I cancel this authorization. To cancel, I must give a 60 day notification to Fusion Family Consulting in writing and the account must be in good standing.</p>';
$html .= '<br><br>Patient Name (Print): ';
$html .= '<b>'.$_POST['patient_name'].'</b>';

$html .= '<br><br>Patient Signature: ';
$html .= '<b>'.$_POST['patient_signature'].'</b>';

$html .= '<br><br>Date: ';
$html .= '<b>'.$_POST['today_date'].'</b>';

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
