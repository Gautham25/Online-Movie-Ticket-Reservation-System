$(document).ready(function(){
$(".field-error").css("display","none");

	$("#update_profile").click(function(){
		var firstname = $('#first_name').val();
		var lastname = $('#last_name').val();
		var mobilenumber = $('#mobile_number').val();

		var ck_firstname = /^[A-Za-z0-9]{4,20}$/;
		var ck_lastname = /^[A-Za-z0-9]{4,20}$/;
		var ck_mobileno = /^\d{10}$/;
			
		if(!ck_firstname.test(firstname)){ $("#field-error-firstname").css("display","block"); return false;}
		else{ $("#field-error-firstname").css("display","none"); }
		
		if(!ck_lastname.test(lastname)){ $("#field-error-lastname").css("display","block"); return false;}
		else{ $("#field-error-lastname").css("display","none"); }
		
		if(!ck_mobileno.test(mobilenumber)){ $("#field-error-mobileno").css("display","block"); return false;}
		else{ $("#field-error-mobileno").css("display","none"); }
		
		if(firstname == ''){ alert('Enter first name'); return false;}
		if(lastname == ''){ alert('Enter last name'); return false;}
		if(mobilenumber == ''){ alert('Enter mobilenumber'); return false;}
	});

	//$(function() {
       // $( "#accordion" ).accordion({
       //     collapsible: true
       // });
   // });
   $(".history").hide();
   $("legend a").click(function(){$(".history").slideToggle();});

   $(".cancel").click(function(){
		alert("asdfkjas");
   
   });
   
   
});



