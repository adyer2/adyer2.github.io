<?php
// petition.php
$user = 'root';
$password = 'root';
$db = 'inventory';
$host = 'localhost';
$port = 3306;

$link = mysql_connect(
   "$host:$port",
   $user,
   $password
);
$db_selected = mysql_select_db(
   $db,
   $link
);

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['first-name']))
        $errors['first-name'] = 'First name is required.';

    if (empty($_POST['last-name']))
        $errors['last-name'] = 'Last name is required.';

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';

    if (empty($_POST['country']))
        $errors['country'] = 'Country is required.';

    if (empty($_POST['street-address']))
          $errors['street-address'] = 'Street address is required.';

    if (empty($_POST['zip-code']))
        $errors['zip-code'] = 'Zip code is required.';

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
