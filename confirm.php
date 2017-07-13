<?php
function validateForm() {
// all the variable can be access by making it super global
// pulling in the initialized global
global $firstName, $lastName, $email, $phone, $subject, $comment, $firstNameErr, $lastNameErr, $emailErr, $phoneErr, $subjectErr, $commentErr, $nickName, $errCount;

// if user didn't post any info inside first name field
    if(empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
        $errCount = true;
// error case: error occured due to anything other
// than letter and white space is entered
// w7 slide21 unit test for reg expression
    } else {
        $firstName = scrubInput($_POST["firstName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
            $firstNameErr = "Only letters and white space allowed";
            $errCount = true;
        }
    }
// if user didn't post any info inside first name field
    if(empty($_POST["lastName"])) {
        $lastNameErr = "Last Name is required";
        $errCount = true;
// error case
    } else {
        $lastName = scrubInput($_POST["lastName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
            $lastNameErr = "Only letters and white space allowed";
            $errCount = true;
        }
    }
// nickName is not required, only clean data when data exists
    if(!empty($_POST["nickName"])) {
        $nickName = scrubInput($_POST["nickName"]);
    }

    if(empty($_POST["email"])) {
        $emailErr = "Email is required";
        $errCount = true;
// error case
    } else {
        $email = scrubInput($_POST["email"]);
        // Validate e-mail: check if email address is well formed 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $errCount = true; // error case
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $errCount = true; // error case
    } else {
        $phone = scrubInput($_POST["phone"]);
// optional Add phone format here
// note on week 7 slide 14
    }

    if (!empty($_POST["comment"])) {
        $comment = scrubInput($_POST["comment"]);
    }

// no errCount than give me the form summary
    if ($errCount === false) {
        //display confirmation info and send email
        $preference = findName($firstName, $nickName);
        // from findName function to use nickName $prefrence gets set below
        $summary = "<div id='results'><h2>Thank you for participating $preference</h2><p>Normally, a form would send you a confirmation but this one is just sending me an email.  We will review all of the elements of this form in class.</p><br>Summarizing your input: <br>".$email."<br>".$phone."<br>".$comment."<br>You have taken the following classes:<br>";
// concatenating assignment operator ('.=')
// appends the argument on the right side to the argument on the left side
// ex: http://tmhardy.com/dev/ucsc/final/form.php      
        $summary .= '<ul id="extra">';
        $summary .= listPrereqs();
        $summary .= listFormFields();
        $summary .= '</ul>';
        // sendMyMsg($summary);

        header('Location: thankYou.php?confirmMsg='.urlencode($summary));
    }
}

// w7 slide20 Best Practice for input fields important to add scrubInput for 
// reduce the security risk since input fields
// are vulnerable for attacks (dumping data to your server)

function scrubInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// if nickName is empty then give firstName
// findName is used when $preference is called during 
// thank you $summary page
function findName($firstName,$nickName) {
    if($nickName === "") {
        $answer = $firstName;
    } else {
// otherwise, return nickName
        $answer = $nickName;
    }
    return $answer;
}
// optional: listFormFields for advance
// note: week 8 slide 9, add classes
function listFormFields() {
    if(isset($_POST['experience'])){
        // $r = 0;
        $answer = "";
        $limit = count($_POST['experience']);
        $exper = $_POST['experience'];

        for ($i=0; $i <  $limit; $i++) {
            $answer.='<li><label for="experience'.$i.'">Class:</label><input type="text" name="experience[]" id="experience'.$i.'" value="'.$exper[$i].'">';
        }
    return $answer;
    }
}
// optional challenge: listPrereqs for adv
// note: week 8 slide 9
function listPrereqs() {
    // $answer = "<ul class='finish'>";
    $answer = "";
    if(isset($_POST['HTML'])) {
        $answer .= "<li>HTML</li>";
    }
    if(isset($_POST['CSS'])) {
        $answer .= "<li>CSS</li>";
    }
    // $answer .= "</ul>";
    return $answer;
}

//skip senMyMsg because I can not test this function
// but keep the code for future reference
// send email filled out form 
// Resource: Week8 slide 12
// http://php.net/manual/en/function.mail.php

// function sendMyMsg($msg) {
// // To send HTML mail, the Content-type header must be set
// // "\r\n" for new line character Return
//     $headers .= "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
//     // update From to your own server
//     $headers .= "From: webmaster@heggy.me";
//     $to = "heggyy@gmail.com";
//     $subject = "Spring2017 JavaScriptPHP class roster";

//     mail($to, $subject, $msg, $headers);
// }

?>