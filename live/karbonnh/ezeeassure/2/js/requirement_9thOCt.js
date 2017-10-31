var xmlHttp;



///////////////----------OnKeyPress Event code to restrinct Kayboard input starts----------//////////

var KEY_NULL = null;

var KEY_NONE = 0;

var KEY_BCKSPC = 8;

var KEY_TAB = 9;

var KEY_ENTER = 13;

var KEY_ESC = 27;

function validData(e,field) {

	var key;

	var keychar;

	if (window.event) {

		key = window.event.keyCode;

	}

	else if (e) {

		key = e.which;

	}

	else {

		return true;

	}

	keychar = String.fromCharCode(key);

	//characters which are allowed 

	switch(field)

	{

		case "name":

			chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'. "

			break;	

		case "city":

			chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz "

			break;	

		case "num":

			chars = "0123456789";

			break;

		case "dob":

			chars = "0123456789/";

			break;	

		case "nameSpl":

			chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'.@$&(),[]# "

			break;

		case "phone":

			chars = "1234567890 -+"

			break;

	}



	// Control keys (no @#$% "magic numbers")

	if ( (key == KEY_NULL) || (key == KEY_NONE) || (key == KEY_BCKSPC) || (key == KEY_TAB) || (key == KEY_ENTER) || (key == KEY_ESC) || ((chars).indexOf(keychar) > -1) ) 

    {

		return true;

	}

	return false;

}

//////////////----------OnKeyPress Event code to restrinct Kayboard input ends----------//////////

/*function emailvalid(sText)

{

	var IsNumber=true;

	var pattern1=/[._]$/;

	var pattern2=/\._|_\./;

    if(sText.indexOf("__")!==-1)

    {

		IsNumber = "false";

	}else if(sText.indexOf("..")!==-1)

	{

		IsNumber = "false";  

    }else if(sText.match(pattern1)!==null)

    {

	    IsNumber = "false";  

    }else if(sText.match(pattern2)!==null)

    {

    	IsNumber = "false";  

    }else if(sText.indexOf("--")!==-1)

    {

	    IsNumber = "false";  

    }

    return IsNumber;



}*/

//==========TRIM=================

function trim(str)

{

   return str.replace(/^\s+|\s+$/g,'');

}

function CheckTrim(str)

{  

	while(str.charAt(0) == (" ") )

	{  str = str.substring(1);

	}

	while(str.charAt(str.length-1) == " " )

	{  str = str.substring(0,str.length-1);

	}

	return str;

}

//==========TRIM=================

function CheckZero(sText)

{

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

	{ 

		Char = sText.charAt(i); 

		if(i==0)

		{

			if(Char==0)

			{

			    IsNumber = "false";

			}

		}

	}

	return IsNumber;   

}//number validation

function CheckStartNo(sText)

{

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

	{ 

		Char = sText.charAt(i); 

		if(i==0)

		{

			if(Char==0 || Char==1 || Char==2 || Char==3 || Char==4 || Char==5 || Char==6 || Char==7 || Char==8 || Char==9)

			{

			    IsNumber = "false";

			}

		}

	}

	return IsNumber;   

}

function limitText(limitField, limitCount, limitNum) 

{

            	//alert(limitField.value);

			if (limitField.value.length > limitNum) 

            {

                limitField.value = limitField.value.substring(0, limitNum);

            }

            else 

            {

                limitCount.value = limitNum - limitField.value.length;

            }

}

function isValidEmail(email)

{ 

    var RegExp = /^((([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+(\.([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+)*)@((((([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.))*([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.)[\w]{2,4}|(((([0-9]){1,3}\.){3}([0-9]){1,3}))|(\[((([0-9]){1,3}\.){3}([0-9]){1,3})\])))$/ 

    if(RegExp.test(email))

	{ 

        return true; 

    }

	else

	{ 

        return false; 

    } 

}

function checkField(){ 

    var DetailForm = document.DetailForm, error = ""; 

    if(!isValidEmail(DetailForm.email.value)){ 

        error += 'Please Enter a valid E-mail ID\n'; 

    } 

    if(error != ""){ 

      alert(error); 

        return false; 

    }else{ 

        return true; 

    } 

} 

function IsNumeric(sText)

{

	var ValidChars = "0123456789#&@*_-+/|!$%:.;`^<>[]{}=?)(,~\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

			IsNumber = "false";

		}

	}

	return IsNumber;   

}//character validation

function IsNumericAddress(sText)

{

	var ValidChars = "%^?";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

			IsNumber = "false";

			//alert ("Please Enter characters only.");						

		}

	}

	return IsNumber;   

}

function IsNumericdesg(sText)

{

	var ValidChars = "0123456789#&@*_-+/|!$%:;`^<>[]{}=?~'\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

		IsNumber = "false";

		}

	}

	return IsNumber;   

}//character validation

function IsSpecial(sText)

{

	var ValidChars = "#&@*_\\/|!$%:;`-+.,^<>[]{}=?)(~'\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

		IsNumber = "false";

		//alert ("Please Enter characters only.");

		}

	}

	return IsNumber;

}//character validation

function IsSpecialenq(sText)

{ 

	var ValidChars = "#@*_\\/|!$%:;`-+^<>[]{}=~'\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

			IsNumber = "false";

		//alert ("Please Enter characters only.");						

		}

	}

return IsNumber;   

}

function IsSpecialextra(sText)

{

	var ValidChars = "#&@*_\\/|!$%:;`-+^<>[]{}=?~'\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

		IsNumber = "false";

		//alert ("Please Enter characters only.");						

		}

	}

	return IsNumber;   

}//enquiry validation

function IsSpecialeCompany(sText)

{

	var ValidChars = "1234567890#&@*_\\/|!$%:;`-+^<>[]{}=?~'\\\"";

	var IsNumber=true;

	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 

		{ 

		Char = sText.charAt(i); 

		if (ValidChars.indexOf(Char) != -1) 

		{

		IsNumber = "false";

		//alert ("Please Enter characters only.");						

		}

	}

	return IsNumber;   

}//character validation

function IsChar(sText)

{

	

	var ValidChars = "0123456789";

	var IsNumber=true;

	var Char;

	var tnt= [];

	for (i = 0; i < sText.length && IsNumber == true; i++) 

	{ 

		Char = sText.charAt(i); 

		tnt[i]=sText.charAt(i);

		if (ValidChars.indexOf(Char) == -1) 

		{

			IsNumber = "false";

			//alert ("please Enter numeric only.");						

		}

		if(i==0){

			if(Char=='0' || Char=='1' || Char=='2' || Char=='3' || Char=='4' || Char=='5')

			{

				IsNumber = "falsen";

			}

		}

	}

	return IsNumber;   

}//number validation

function Isalpha(sText)

{

	var ValidChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'. ";

	var IsNumber=true;

	var Char;

	var tnt= [];

	for (i = 0; i < sText.length && IsNumber == true; i++) 

	{ 

		Char = sText.charAt(i); 

		tnt[i]=sText.charAt(i);

		if (ValidChars.indexOf(Char) == -1) 

		{

			IsNumber = "false";

			//alert ("please Enter numeric only.");						

		}

	}

	return IsNumber;   

}

function counter(sText,charTest)

{

	var aposcnt;

	var cnt=0;

	var ch1;

	aposcnt="true";

	ch1=sText.charAt(0);

	if(ch1==charTest)

	{

		aposcnt="false";

	}

	for(i=0;i<sText.length;i++)

	{

		ch1=sText.charAt(i);

		if(ch1==charTest)

		{

			cnt ++;

		}

	}

	if(cnt>2)

	{

		aposcnt="false";

	}

	return aposcnt;

}//apostrophe and hypen validation for text and contact field

function reset1()

{

	window.location.reload(true);

}

function alt_null()

{

	document.getElementById("alt_error").innerHTML="";	

	document.getElementById("alt_error").style.display="none";

}

function alt_null1()

{

	document.getElementById("alt_error1").innerHTML="";	

	document.getElementById("alt_error1").style.display="none";

}

function alt_null2()

{

	document.getElementById("alt_error2").innerHTML="";	

	document.getElementById("alt_error2").style.display="none";

}

function validate()

{

	if (document.DetailForm.name.value=="Name*" || document.DetailForm.name.value=="")

	{

		alt_null();	

		document.getElementById("alt_error").style.display="block";

        document.getElementById("alt_error").innerHTML="Please Enter Your Name";

		document.DetailForm.name.focus();

		return false;

	}

	else if(document.DetailForm.name.value!="")

	{

		var mytext=trim(document.DetailForm.name.value);

		pop=document.DetailForm.name.value;

		//validation for space

		var ValidChars = " ";

		Char = pop.charAt(0);

		if (ValidChars.indexOf(Char) != -1) 

			{



				alt_null();

				document.getElementById("alt_error").style.display="block";

				document.getElementById("alt_error").innerHTML="Please Enter Valid Name";					

				document.DetailForm.name.focus();

				document.DetailForm.name.select();

				return false;

			}//validchars.indexof

		var alphacheck=Isalpha(mytext);

		if (alphacheck=="false")

		{

    		alt_null();

			document.getElementById("alt_error").style.display="block";

			document.getElementById("alt_error").innerHTML="Please Enter Valid Name";					

			document.DetailForm.name.focus();

			document.DetailForm.name.select();

			return false;

		}	

		//validation for space

		var char1=counter(mytext,"'");

		if (char1=="false")

		{

			alt_null();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Enter Valid Name";

		    document.DetailForm.name.focus();

		    

			document.DetailForm.name.select();

	        return false;

		}

         var char1=counter(mytext,".");

		if (char1=="false")

		{

			alt_null();			

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Enter valid Name";

		    document.DetailForm.name.focus();

			document.DetailForm.name.select();

	        return false;

		}



		var mytext=trim(document.DetailForm.name.value);

		if(mytext=="")

    	{

    		alt_null();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Please Enter Your Name";

    		document.DetailForm.name.focus();

    		return false;

    	}

        var strcnt2=mytext.length;

        if(strcnt2<2 || strcnt2>50)

    	{

            alt_null();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Name Accept 2-50 Characters Only";			

	        document.DetailForm.name.focus();

			document.DetailForm.name.select();

	        return false;

       }

	} //name validation

	//---Mobile No---

	

	if (document.DetailForm.contact.value=="Mobile No.*" || document.DetailForm.contact.value=="")

	{

		

		alt_null1();

		document.getElementById("alt_error").style.display="block";

		document.getElementById("alt_error").innerHTML="Please Enter Your Mobile No.";

		document.DetailForm.contact.focus();

		return false;

	}

	if (document.DetailForm.contact.value!="")

	{

		var mytext=trim(document.DetailForm.contact.value);

		var number=IsChar(mytext);

		if (number=="false")

		{

	    	alt_null1();

			document.getElementById("alt_error").style.display="block";

	        document.getElementById("alt_error").innerHTML="Mobile No. Accept Digits Only";

			document.DetailForm.contact.focus();

			document.DetailForm.contact.select();

			document.DetailForm.contact.value="";

			return false;

		}

		if (number=="falsen")

		{

	    	alt_null1();

			document.getElementById("alt_error").style.display="block";

	        document.getElementById("alt_error").innerHTML="Enter Valid Mobile No.";

			document.DetailForm.contact.focus();

			document.DetailForm.contact.select();		

			return false;

		}

		var char3=counter(mytext,"-");

		if (char3=="false")

		{

			alt_null1();

			document.getElementById("alt_error").style.display="block";

			document.getElementById("alt_error").innerHTML="Enter Valid Mobile No.";

			document.DetailForm.contact.focus();

			document.DetailForm.contact.select();

			return false;

		}

		if (mytext=="")

		{

			alt_null1();

			document.getElementById("alt_error").style.display="block";

			document.getElementById("alt_error").innerHTML="Please Enter Your Mobile No.";

			document.DetailForm.contact.focus();

			return false;

	    }

		if (document.DetailForm.contact.value=="")

		{

			alt_null1();

			document.getElementById("alt_error").style.display="block";

			document.getElementById("alt_error").innerHTML="Please Enter Your Mobile No.";

			document.DetailForm.contact.focus();

			return false;

		}

		var strcnt2=mytext.length;

		if(strcnt2!=10)

		{

			alt_null1();

			document.getElementById("alt_error").style.display="block";

			document.getElementById("alt_error").innerHTML="Enter 10 Digit Mobile No.";

			document.DetailForm.contact.focus();

			document.DetailForm.contact.select();

			return false;

		}

		var sting="^([0-9])\\1*$";

		var eflag = document.DetailForm.contact.value.match(sting);

		//alert (eflag);

		if(document.DetailForm.contact.value.match(sting))

		{

			alt_null1();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Enter Valid Mobile No.";

			document.DetailForm.contact.select();

			document.DetailForm.contact.focus();

			return false;

		}

	}	

		//validation of contact number

		

	//---------------------------------------------------------------

	//------EMAIL-------------

/*	if(document.DetailForm.email.value=="Email*" || document.DetailForm.email.value=="")

	{

		alt_null();

		document.getElementById("alt_error").style.display="block";

        document.getElementById("alt_error").innerHTML="Please Enter Your Email Id";

		document.DetailForm.email.select();

		document.DetailForm.email.focus();

		return false;

	}

	if(document.DetailForm.email.value!="")

	{

		var str =/\w+[-a-zA-Z0-9_\.]+@\w+[-a-zA-Z0-9]+\.\w+[-a-zA-Z\.]+/;

		var eflag = document.DetailForm.email.value.match(str);

		//alert (eflag);	

		if(eflag!=document.DetailForm.email.value)

		{

			alt_null();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Please Enter a Valid Email Id";

			document.DetailForm.email.select();		

			document.DetailForm.email.focus();

			return false;

		}

        var string1=document.DetailForm.email.value;

        if(string1!="")

        {

            var number=emailvalid(string1);

            if (number=="false")

            {

                alt_null();

				document.getElementById("alt_error").style.display="block";

                document.getElementById("alt_error").innerHTML="Please Enter a valid Email Id";

	            document.DetailForm.email.select();

	            document.DetailForm.email.focus();

	            return false;

            }



        }

        var mytext = trim(document.DetailForm.email.value);

        if(mytext=="")

        {

            alt_null();

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML="Please Enter Email Id";

	        document.DetailForm.email.focus();	       

			document.DetailForm.email.select();

	        return false;

        }        



	}*/ 
	//email validation	

	

	/*if(document.DetailForm.Brand.value=="Brand*" || document.DetailForm.Brand.value=="")

	{

		alt_null();

		document.getElementById("alt_error").style.display="block";

	    document.getElementById("alt_error").innerHTML="Please Select Your Mobile Brand";

		document.DetailForm.Brand.focus();

		return false;

	}*/

	

	//city 

	var city = trim($("#df_city").val());

	var error_msg = "";

	var return_success = true;

	var mytext = city;

	//alert(city);

	if(city ==""){

			error_msg="Please enter city";

			return_success = false;

	}

	if(return_success)

	{

		var Char = city.charAt(0);

		var alphacheck=Isalpha(mytext);

		//var char1=counter(mytext,"'");

		//var char2=counter(mytext,".");

	

		var strcnt2=mytext.length;

		if(ValidChars.indexOf(Char) != -1 || alphacheck=="false"){

			error_msg="Please enter valid city";

			return_success = false;

		}

		if(return_success)

		{

			if(strcnt2<2 || strcnt2>60)

			{

				error_msg="City  Accept 2-60 Characters Only";

				return_success = false;

			}

		}

		

	}

	if(!return_success){

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML=error_msg;			

	        $("#df_city").focus();

			$("#df_city").select();

			return false;

		}

		//---------city end----------

		//---------model ----------

	var model = trim($("#df_model").val());

	var error_msg = "";

	var return_success = true;

	var mytext = model;

	//alert(city);

	if(model ==""){

			error_msg="Please enter model";

			return_success = false;

	}

	if(!return_success){

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML=error_msg;			

	        $("#df_model").focus();

			$("#df_model").select();

			return false;

		}

		//---------model end----------
		
			var imei_no = trim($("#df_imei_no").val());

	var error_msg = "";

	var return_success = true;

	var mytext = imei_no;

	//alert(city);

	if(imei_no ==""){

			error_msg="Please enter IMEI Number";

			return_success = false;

	}

	if(!return_success){

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML=error_msg;			

	        $("#df_imei_no").focus();

			$("#df_imei_no").select();

			return false;

		}

	//---Secutrity Code ----

	if (document.DetailForm.captchya.value=="" || document.DetailForm.captchya.value=="Verify Code*")

	{

		alt_null();

		document.getElementById("alt_error").style.display="block";

        document.getElementById("alt_error").innerHTML="Please Enter Security Code";

		document.DetailForm.captchya.focus();

		return false;

	}else{

		CheckCapchac(document.DetailForm.captchya.value);

		if(document.DetailForm.ccodec.value!="OK")

		{

			alt_null();

			var res = document.DetailForm.ccodec.value;

			document.getElementById("alt_error").style.display="block";

        	document.getElementById("alt_error").innerHTML="Please Enter Valid Security Code";

			document.DetailForm.captchya.focus();

			return false;

		}

	}//captchya

	DetailForm.submit1.disabled = true;

    DetailForm.submit1.value = "Please wait...";

	document.DetailForm.action = "pay.php";

	document.DetailForm.submit();

}

function validate1()

{

	

	if (document.DetailFormres.name.value=="Name*" || document.DetailFormres.name.value=="")

	{

		

		alt_null1();	

		document.getElementById("alt_error1").style.display="block";

        document.getElementById("alt_error1").innerHTML="Please Enter Your Name";

		//alert("hello");

		document.DetailFormres.name.focus();

		return false;

	}

	else if(document.DetailFormres.name.value!="")

	{

		

		var mytext=trim(document.DetailFormres.name.value);

		pop=document.DetailFormres.name.value;

		//validation for space

		var ValidChars = " ";

		Char = pop.charAt(0);

		if (ValidChars.indexOf(Char) != -1) 

			{



				alt_null1();

				document.getElementById("alt_error1").style.display="block";

				document.getElementById("alt_error1").innerHTML="Please Enter Valid Name";					

				document.DetailFormres.name.focus();

				document.DetailFormres.name.select();

				return false;

			}//validchars.indexof

		var alphacheck=Isalpha(mytext);

		if (alphacheck=="false")

		{

    		alt_null1();

			document.getElementById("alt_error1").style.display="block";

			document.getElementById("alt_error1").innerHTML="Please Enter Valid Name";					

			document.DetailFormres.name.focus();

			document.DetailFormres.name.select();

			return false;

		}	

		//validation for space

		var char1=counter(mytext,"'");

		if (char1=="false")

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Enter Valid Name";

		    document.DetailFormres.name.focus();

		    

			document.DetailFormres.name.select();

	        return false;

		}

         var char1=counter(mytext,".");

		if (char1=="false")

		{

			alt_null1();			

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Enter valid Name";

		    document.DetailFormres.name.focus();

			document.DetailFormres.name.select();

	        return false;

		}



		var mytext=trim(document.DetailFormres.name.value);

		if(mytext=="")

    	{

    		alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Please Enter Your Name";

    		document.DetailFormres.name.focus();

    		return false;

    	}

        var strcnt2=mytext.length;

        if(strcnt2<2 || strcnt2>50)

    	{

            alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Name Accept 2-50 Characters Only";			

	        document.DetailFormres.name.focus();

			document.DetailFormres.name.select();

	        return false;

       }

	} //name validation

	//---Mobile No---

	if (document.DetailFormres.contact.value=="Mobile No.*" || document.DetailFormres.contact.value=="")

	{

		alt_null1();

		document.getElementById("alt_error1").style.display="block";

		document.getElementById("alt_error1").innerHTML="Please Enter Your Mobile No.";

		document.DetailFormres.contact.focus();

		return false;

	}

	if (document.DetailFormres.contact.value!="")

	{

		var mytext=trim(document.DetailFormres.contact.value);

		var number=IsChar(mytext);

		if (number=="false")

		{

	    	alt_null1();

			document.getElementById("alt_error1").style.display="block";

	        document.getElementById("alt_error1").innerHTML="Mobile No. Accept Digits Only";

			document.DetailFormres.contact.focus();

			document.DetailFormres.contact.select();

			document.DetailFormres.contact.value="";

			return false;

		}

		if (number=="falsen")

		{

	    	alt_null1();

			document.getElementById("alt_error1").style.display="block";

	        document.getElementById("alt_error1").innerHTML="Enter Valid Mobile No.";

			document.DetailFormres.contact.focus();

			document.DetailFormres.contact.select();		

			return false;

		}

		var char3=counter(mytext,"-");

		if (char3=="false")

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

			document.getElementById("alt_error1").innerHTML="Enter Valid Mobile No.";

			document.DetailFormres.contact.focus();

			document.DetailFormres.contact.select();

			return false;

		}

		if (mytext=="")

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

			document.getElementById("alt_error1").innerHTML="Please Enter Your Mobile No.";

			document.DetailFormres.contact.focus();

			return false;

	    }

		if (document.DetailFormres.contact.value=="")

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

			document.getElementById("alt_error1").innerHTML="Please Enter Your Mobile No.";

			document.DetailFormres.contact.focus();

			return false;

		}

		var strcnt2=mytext.length;

		if(strcnt2!=10)

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

			document.getElementById("alt_error1").innerHTML="Enter 10 Digit Mobile No.";

			document.DetailFormres.contact.focus();

			document.DetailFormres.contact.select();

			return false;

		}

		var sting="^([0-9])\\1*$";

		var eflag = document.DetailFormres.contact.value.match(sting);

		//alert (eflag);

		if(document.DetailFormres.contact.value.match(sting))

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Enter Valid Mobile No.";

			document.DetailFormres.contact.select();

			document.DetailFormres.contact.focus();

			return false;

		}

	}	

	//---------------------------------------------------------------

	//------EMAIL-------------

/*	if(document.DetailFormres.email.value=="Email*" || document.DetailFormres.email.value=="")

	{

		alt_null1();

		document.getElementById("alt_error1").style.display="block";

        document.getElementById("alt_error1").innerHTML="Please Enter Your Email Id";

		document.DetailFormres.email.select();

		document.DetailFormres.email.focus();

		return false;

	}

	if(document.DetailFormres.email.value!="")

	{

		var str =/\w+[-a-zA-Z0-9_\.]+@\w+[-a-zA-Z0-9]+\.\w+[-a-zA-Z\.]+/;

		var eflag = document.DetailFormres.email.value.match(str);

		//alert (eflag);	

		if(eflag!=document.DetailFormres.email.value)

		{

			alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Please Enter a Valid Email Id";

			document.DetailFormres.email.select();		

			document.DetailFormres.email.focus();

			return false;

		}

        var string1=document.DetailFormres.email.value;

        if(string1!="")

        {

            var number=emailvalid(string1);

            if (number=="false")

            {

                alt_null1();

				document.getElementById("alt_error1").style.display="block";

                document.getElementById("alt_error1").innerHTML="Please Enter a valid Email Id";

	            document.DetailFormres.email.select();

	            document.DetailFormres.email.focus();

	            return false;

            }



        }

        var mytext = trim(document.DetailFormres.email.value);

        if(mytext=="")

        {

            alt_null1();

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML="Please Enter Email Id";

	        document.DetailFormres.email.focus();	       

			document.DetailFormres.email.select();

	        return false;

        }        



	}*/
	//email validation	

	

	//city 

	var city = trim($("#df2_city").val());

	var error_msg = "";

	var return_success = true;

	var mytext = city;

	

	if(city ==""){

			error_msg="Please enter city";

			return_success = false;

	}

	//alert("---"+return_success+"---dfasd");

	if(return_success)

	{

		var Char = city.charAt(0);

		var alphacheck=Isalpha(mytext);

		//var char1=counter(mytext,"'");

		//var char2=counter(mytext,".");

	

		var strcnt2=mytext.length;

		if(ValidChars.indexOf(Char) != -1 || alphacheck=="false"){

			error_msg="Please enter valid city";

			return_success = false;

		}

		if(return_success)

		{

			if(strcnt2<2 || strcnt2>60)

			{

				error_msg="City  Accept 2-60 Characters Only";

				return_success = false;

			}

		}

		

	}

	if(!return_success){

			document.getElementById("alt_error1").style.display="block";

            document.getElementById("alt_error1").innerHTML=error_msg;			

	        $("#df2_city").focus();

			$("#df2_city").select();

			return false;

		}

		//---------city end----------

		//---------model ----------

	var model = trim($("#df2_model").val());

	var error_msg = "";

	var return_success = true;

	var mytext = model;

	//alert(city);

	if(model ==""){

			error_msg="Please enter model";

			return_success = false;

	}

	if(!return_success){

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML=error_msg;			

	        $("#df2_model").focus();

			$("#df2_model").select();

			return false;

		}

		//---------model end----------

	/*if(document.DetailFormres.Brand.value=="Brand*" || document.DetailFormres.Brand.value=="")

	{

		alt_null();

		document.getElementById("alt_error1").style.display="block";

	    document.getElementById("alt_error1").innerHTML="Please Select Your Mobile Brand";

		document.DetailFormres.Brand.focus();

		return false;

	}*/
	
		var imei_no = trim($("#df2_imei_no").val());

	var error_msg = "";

	var return_success = true;

	var mytext = imei_no;

	//alert(city);

	if(imei_no ==""){

			error_msg="Please enter IMEI Number";

			return_success = false;

	}

	if(!return_success){

			document.getElementById("alt_error").style.display="block";

            document.getElementById("alt_error").innerHTML=error_msg;			

	        $("#df2_imei_no").focus();

			$("#df2_imei_no").select();

			return false;

		}

	//---Secutrity Code ----

	if (document.DetailFormres.captchya1.value=="" || document.DetailFormres.captchya1.value=="Verify Code*")

	{

		alt_null1();

		document.getElementById("alt_error1").style.display="block";

        document.getElementById("alt_error1").innerHTML="Please Enter Security Code";

		document.DetailFormres.captchya1.focus();

		return false;

	}else{

		CheckCapchac1(document.DetailFormres.captchya1.value);

		if(document.DetailFormres.ccodec1.value!="OK")

		{

			alt_null1();

			var res = document.DetailFormres.ccodec1.value;

			document.getElementById("alt_error1").style.display="block";

        	document.getElementById("alt_error1").innerHTML="Please Enter Valid Security Code";

			document.DetailFormres.captchya1.focus();

			return false;

		}

	}//captchya

	DetailFormres.submit1.disabled = true;

    DetailFormres.submit1.value = "Please wait...";

	document.DetailFormres.action = "pay.php";

	document.DetailFormres.submit();

}

function CheckCapchac(ccode)

{

	var myData = 'ccode='+ ccode; 

	jQuery.ajax({

		type: "POST",

		url: "checkcapchya.php",

		data:myData,

		success:function(response){

			if(response!='')

	 		{

		  	document.getElementById('ccodeidc').value=response;

	 		}

	 	},

 	});

}

function CheckCapchac1(ccode)

{

	var myData = 'ccode='+ ccode; 

	jQuery.ajax({

		type: "POST",

		url: "checkcapchya1.php",

		data:myData,

		success:function(response){

			if(response!='')

	 		{

		  	document.getElementById('ccodeidc1').value=response;

	 		}

	 	},

 	});

}



function getintouchf(){

	if (document.getintouch.name.value=="Name*" || document.getintouch.name.value=="")

	{

		alt_null2();	

		document.getElementById("alt_error2").style.display="block";

        document.getElementById("alt_error2").innerHTML="Please Enter Your Name";

		document.getintouch.name.focus();

		return false;

	}

	else if(document.getintouch.name.value!="")

	{

		var mytext=trim(document.getintouch.name.value);

		pop=document.getintouch.name.value;

		//validation for space

		var ValidChars = " ";

		Char = pop.charAt(0);

		if (ValidChars.indexOf(Char) != -1) 

			{



				alt_null2();

				document.getElementById("alt_error2").style.display="block";

				document.getElementById("alt_error2").innerHTML="Please Enter Valid Name";					

				document.getintouch.name.focus();

				document.getintouch.name.select();

				return false;

			}//validchars.indexof

		var alphacheck=Isalpha(mytext);

		if (alphacheck=="false")

		{

    		alt_null2();

			document.getElementById("alt_error2").style.display="block";

			document.getElementById("alt_error2").innerHTML="Please Enter Valid Name";					

			document.getintouch.name.focus();

			document.getintouch.name.select();

			return false;

		}	

		//validation for space

		var char1=counter(mytext,"'");

		if (char1=="false")

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Enter Valid Name";

		    document.getintouch.name.focus();

		    

			document.getintouch.name.select();

	        return false;

		}

         var char1=counter(mytext,".");

		if (char1=="false")

		{

			alt_null2();			

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Enter valid Name";

		    document.getintouch.name.focus();

			document.getintouch.name.select();

	        return false;

		}



		var mytext=trim(document.getintouch.name.value);

		if(mytext=="")

    	{

    		alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Please Enter Your Name";

    		document.getintouch.name.focus();

    		return false;

    	}

        var strcnt2=mytext.length;

        if(strcnt2<2 || strcnt2>50)

    	{

            alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Name Accept 2-50 Characters Only";			

	        document.getintouch.name.focus();

			document.getintouch.name.select();

	        return false;

       }

	} //name validation

	//------EMAIL-------------

	if(document.getintouch.email.value=="Email*" || document.getintouch.email.value=="")

	{

		alt_null2();

		document.getElementById("alt_error2").style.display="block";

        document.getElementById("alt_error2").innerHTML="Please Enter Your Email Id";

		document.getintouch.email.select();

		document.getintouch.email.focus();

		return false;

	}

	if(document.getintouch.email.value!="")

	{

		var str =/\w+[-a-zA-Z0-9_\.]+@\w+[-a-zA-Z0-9]+\.\w+[-a-zA-Z\.]+/;

		var eflag = document.getintouch.email.value.match(str);

		//alert (eflag);	

		if(eflag!=document.getintouch.email.value)

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Please Enter a Valid Email Id";

			document.getintouch.email.select();		

			document.getintouch.email.focus();

			return false;

		}

        var string1=document.getintouch.email.value;

        if(string1!="")

        {

            var number=emailvalid(string1);

            if (number=="false")

            {

                alt_null2();

				document.getElementById("alt_error2").style.display="block";

                document.getElementById("alt_error2").innerHTML="Please Enter a valid Email Id";

	            document.getintouch.email.select();

	            document.getintouch.email.focus();

	            return false;

            }



        }

        var mytext = trim(document.getintouch.email.value);

        if(mytext=="")

        {

            alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Please Enter Email Id";

	        document.getintouch.email.focus();	       

			document.getintouch.email.select();

	        return false;

        }        



	}//email validation

	//---Mobile No---

	if (document.getintouch.contact.value=="Mobile No.*" || document.getintouch.contact.value=="")

	{

		alt_null2();

		document.getElementById("alt_error2").style.display="block";

		document.getElementById("alt_error2").innerHTML="Please Enter Your Mobile No.";

		document.getintouch.contact.focus();

		return false;

	}

	if (document.getintouch.contact.value!="")

	{

		var mytext=trim(document.getintouch.contact.value);

		var number=IsChar(mytext);

		if (number=="false")

		{

	    	alt_null2();

			document.getElementById("alt_error2").style.display="block";

	        document.getElementById("alt_error2").innerHTML="Mobile No. Accept Digits Only";

			document.getintouch.contact.focus();

			document.getintouch.contact.select();

			document.getintouch.contact.value="";

			return false;

		}

		if (number=="falsen")

		{

	    	alt_null2();

			document.getElementById("alt_error2").style.display="block";

	        document.getElementById("alt_error2").innerHTML="Enter Valid Mobile No.";

			document.getintouch.contact.focus();

			document.getintouch.contact.select();		

			return false;

		}

		var char3=counter(mytext,"-");

		if (char3=="false")

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

			document.getElementById("alt_error2").innerHTML="Enter Valid Mobile No.";

			document.getintouch.contact.focus();

			document.getintouch.contact.select();

			return false;

		}

		if (mytext=="")

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

			document.getElementById("alt_error2").innerHTML="Please Enter Your Mobile No.";

			document.getintouch.contact.focus();

			return false;

	    }

		if (document.getintouch.contact.value=="")

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

			document.getElementById("alt_error2").innerHTML="Please Enter Your Mobile No.";

			document.getintouch.contact.focus();

			return false;

		}

		var strcnt2=mytext.length;

		if(strcnt2!=10)

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

			document.getElementById("alt_error2").innerHTML="Enter 10 Digit Mobile No.";

			document.getintouch.contact.focus();

			document.getintouch.contact.select();

			return false;

		}

		var sting="^([0-9])\\1*$";

		var eflag = document.getintouch.contact.value.match(sting);

		//alert (eflag);

		if(document.getintouch.contact.value.match(sting))

		{

			alt_null2();

			document.getElementById("alt_error2").style.display="block";

            document.getElementById("alt_error2").innerHTML="Enter Valid Mobile No.";

			document.getintouch.contact.select();

			document.getintouch.contact.focus();

			return false;

		}

	}

	getintouch.submit2.disabled = true;

    getintouch.submit2.value = "Please wait...";

	document.getintouch.action = "submit2.php";

	document.getintouch.submit();

}