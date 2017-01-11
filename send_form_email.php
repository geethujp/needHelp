<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "geethujose.mec@gmail.com";

    $email_subject = "Your email subject line";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['location']) ||
        !isset($_POST['address']) ||
        !isset($_POST['product']) ||
        !isset($_POST['date']) ||
        !isset($_POST['bill_number'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $first_name = $_POST['first_name']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $location = $_POST['location']; // required
    $address = $_POST['address']; // required
    $product = $_POST['product']; // required
    $date = $_POST['date']; // required
    $bill_number = $_POST['bill-number']; // required


    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {

    $error_message .= 'The First Name you entered does not appear to be valid.<br />';

  }


  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Location: ".clean_string($location)."\n";

    $email_message .= "Address: ".clean_string($address)."\n";

    $email_message .= "Product: ".clean_string($product)."\n";

    $email_message .= "Date: ".clean_string($date)."\n";

    $email_message .= "Bill number: ".clean_string($bill_number)."\n";






// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" ;

// 'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($email_to, $email_subject, $email_message, $headers);

?>
  <!-- include your own success html here -->
  Thank you for contacting us. We will be in touch with you very soon.
  <?php

}

?>
