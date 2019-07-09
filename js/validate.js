function validate()
	{
		
	var pass1 = document.myform.pass1.value;
	var pass2 = document.myform.pass2.value;
	if(pass1 != pass2)
	{
		alert("Password do not match!!!");
		return false;
	}
}
