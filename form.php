<?php
include 'confirm.php';
// if $_SERVER['REQUEST_METHOD'] 'POST' user has click form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errCount = false;
    validateForm();
// $_SERVER['REQUEST_METHOD'] 'GET' first time pg loads
} else {
// these php variables are from form variable names initialized them
    $firstName = $lastName = $email = $phone = $subject = $comment = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $subjectErr = $commentErr = $nickName = "";
}
// uses $title as current page title
$title = "Survey Form";
// pull in header page
// order matters, pull in only after if stmt
include 'header.php';
?>

<script src ="formFunctions.js"></script>
<div class = "intro">
<h2 style = "text-align:center">Contact Me</h2>

<!-- beginning of form, $_SERVER['PHP_SELF'] to reload-->
<!--Week 8 slide 8, use superglobal $_SERVER and method="POST" safe reload-->
<form id="survey" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <label for="firstName">FirstName: </label>
        <!--sticky form: setting value = echo $firstName input-->
        <input type="text" name="firstName" id="firstName" value="<?php echo $firstName;?>">
    <!--once confirm.php/validateform() checks if firstName input passes !pregMatch passes then error message displayed inside <span>-->
        <span class="error">* <?php echo $firstNameErr;?></span> <br>

    <label for="lastName">Last Name: </label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $lastName;?>">
    <!--once confirm.php/validateform() checks if lastName input passes !pregMatch passes then error message displayed inside <span>-->
        <span class="error">* <?php echo $lastNameErr;?></span> <br>

    <p>If you go by something other than what shows on the roster...</p>
    <label for="nickName">Preferred: </label>
    <input type="text" name="nickName" id="nickName" value="<?php echo $nickName;?>">

    <fieldset><legend>Contact Info</legend>
        <p class="disclaimer">This field is not required to be a valid email.  It is intended to demonstrate validation so please use noone@ucsc-extension.edu</p><br>
		<label for="email">E-mail: </label>
		<input type="text" name="email" id="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span> <br>		
		<br>		
		<p class="disclaimer">Please don't enter real phone number. This is just a demo! Use 800-555-1212</p><br>
		<label for="phone">Phone: </label>
		<input type="tel" name="phone" id="phone" value="<?php echo $phone;?>">
		<span class="error">* <?php echo $phoneErr;?></span> <br>
	</fieldset>
		<br>
		<fieldset> <legend>Prerequisites</legend>
            <input type="checkbox" name="prereqs[]" value="HTML">20816 HTML Fundamentals<br>
            <input type="checkbox" name="prereqs[]" value="CSS">6673 CSS Fundamentals
		</fieldset>
		<fieldset> <legend>Other Classes:</legend>
		    <p class="disclaimer">Add other relevent training, HTML5, Dreamweaver, etc. Please add one class per field.</p>
<!--Dynamically add fields and echo in sticky form-->
			<ul id="extra"><?php $myList = listFormFields(); echo $myList; ?>
			</ul>
			<button type="button" class="add" onclick="buildExtraField()">Add class</button>	
		</fieldset>
		<br>
		<label for="comment">Expectations: </label>
        <textarea name="comment" id="comment" rows="5" cols="40" placeholder="What do you want to get out of this class?"><?php echo $comment;?></textarea> <br>
		<br>
<!--Clear form with Javascript-->
		<input type="reset" name="clear" onclick="clearForm()" value="Clear Form">
		<input type="submit" name="submit" value="Register">
	</form>

<!--end tag for div class intro from current pg form.php-->
</div>
<!--end tag for div class row from header.php-->
</div>
<?php
// pull in footer page
include 'footer.php';
?>
</body>
</html>