<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contact@example.com';

// Ensure that POST data is set
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
        include($php_email_form);
    } else {
        die('Unable to load the "PHP Email Form" Library!');
    }

    // $contact = new PHP_Email_Form;
    // $contact->ajax = true;

    // Set email properties
    $contact->to = $receiving_email_address;
    $contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
    $contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'No Email';
    $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';

    // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    /*
    $contact->smtp = array(
        'host' => 'example.com',
        'username' => 'example',
        'password' => 'pass',
        'port' => '587'
    );
    */

    // Add messages
    $contact->add_message($contact->from_name, 'From');
    $contact->add_message($contact->from_email, 'Email');
    $contact->add_message(isset($_POST['message']) ? $_POST['message'] : 'No Message', 'Message', 10);

    // Send email and echo the result
    echo $contact->send();
} else {
    echo 'Invalid request method.';
}
?>
