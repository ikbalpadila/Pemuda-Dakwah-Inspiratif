<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

 // Pastikan error reporting aktif
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Masukkan email penerima di sini
$receiving_email_address = 'your-pemudadakwahinspiratif@gmail.com'; // Ganti dengan email penerima yang benar

// Periksa apakah form telah di-submit dan apakah email valid
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($from_email) {
        $to = $receiving_email_address;
        $subject = "New Subscription: " . $from_email;
        $headers = "From: Subscriber <" . $from_email . ">\r\n";
        
        if (mail($to, $subject, "", $headers)) {
            echo 'Subscription successful';
        } else {
            echo 'Subscription failed. Please try again later.';
        }
    } else {
        echo 'Invalid email address.';
    }
}

  

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['email'], 'Email');

  echo $contact->send();
?>
