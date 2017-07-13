var count = 0;
// this is from week 2 slide 32
function buildExtraField() {
var newId = "experience"+count;
var newElem = document.createElement("li");
		newElem.innerHTML = '<label for="'+newId+'">Class:</label><input type="text" name="experience[]" id="'+newId+'" value=""><span class="error"></span><br>'
	  	var container = document.getElementById("extra");
	  	container.appendChild(newElem);
	  	//nice usability feature, if I click for an input box put me in it to type!
	  	document.getElementById(newId).focus();
   		count++;
}
//this clear is from midterm
function clearForm() {

	//this is to clear the UL with extra experience
	document.getElementById("extra").innerHTML = "";
	//need to force clear for other fields that have been filled by php
	document.getElementById("firstName").setAttribute('value','');
	document.getElementById("lastName").setAttribute('value','');
	document.getElementById("email").setAttribute('value','');
	document.getElementById("nickName").setAttribute('value','');
	document.getElementById("phone").setAttribute('value','');
	//missing the error fields here
	document.getElementsByClassName("error")[0].innerHTML='*';
	document.getElementsByClassName("error")[1].innerHTML='*';
	document.getElementsByClassName("error")[2].innerHTML='*';
	document.getElementsByClassName("error")[3].innerHTML='*';
}
