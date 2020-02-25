<?php
//define variables and set them to empty values
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

//form is submitted with the post method:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/i",$name)) { 
            $name_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        //check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "invalid email format";
        }
    }
    if (empty($_POST["phone"])) {
        $phone_error = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match('/[0-9].*/',$phone)) {
            $phone_error = "Phone Number seems to be invalid";
        }
    }
    if (empty($_POST["url"])) {
        $url_error = "";
    } else {
        $url = test_input($_POST["url"]);
        //check if url is valid. (This regular expression allows dashes in the URL)
        if (!preg_match("/^(https?:\/\/)?[0-9a-zA-Z]+\.[-_0-9a-zA-Z]+\.[0-9a-zA-Z]+$/i",$url)) {
            $url_error = "URL invalid";
        }
    }
    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = $_POST["message"];
    }


    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["message"]);
    }
    $message_body = '';
    if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '') {
        
        unset($_POST['submit']);
        foreach ($_POST as $key => $value) {
            $message_body .= "$key: $value\n";
        }
        //$str = str_replace(array("\r", "\n"), '', $str);
        debug(str_replace(array("\r", "\n"), ' ', $message_body));

        $to = 'anonymsir@gmail.com';
        $subject = 'Contact From Website';
        if (mail($to, $subject, $message_body)) {
            $success = 'Message sent, thank you for contacting us.';
            $name = $email = $phone = $message = $url = "";
        }
      
    }
}
function test_input($data) {  
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function debug($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


