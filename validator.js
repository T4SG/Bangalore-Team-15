function validateForm()
{
	var Myname=document.getElementById("name");
	if (Myname.value=="" || Myname.value==null) 
	{ 
	window.alert("Please enter name!!!");
	Myname.focus();
	Myname.select();
	return false;
	} 
	var pos=Myname.value.search(/^[A-Za-z0-9 ]{3,20}$/);
	if(pos!=0)
	{
		window.alert("Please check the name you entered!!!");
		Myname.focus();
		Myname.select();
		 return false;
	}
	var Myphone=document.getElementById("phone");
	var pos=Myphone.value.search(/^(\d{10})$/);
	if (Myphone.value=="" || Myphone.value==null) 
	{ 
	window.alert("Please enter phone number!!!");
	Myphone.focus();
	Myphone.select();
	return false;
	} 
	if(pos!=0)
	{
		window.alert("Please check the phone number you entered!!!");
		Myphone.focus();
		Myphone.select();
		 return false;
	}
	 return true;
}