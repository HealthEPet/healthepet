$(document).ready(function(){

	"use strict";


	function HideAll(){
		$('.allContent').removeClass('blur');

		$('.petOwnerLoginForm').hide();
		$('.petOwnerRegisterForm').hide();
		$('.vetClinicLoginForm').hide();
		$('.vetClinicRegisterForm').hide();
	}


	//////////////////
	// Pet Owner Login
	//////////////////
		$('.login').click(function(){
			HideAll();
			$('.petOwnerLoginForm').fadeToggle(500);

			$('.allContent').toggleClass('blur', 10000);
		});

		$('body > div.petOwnerLoginForm > div > form > div > i').click(function(){
			$('.allContent').toggleClass('blur', 10000);

			$('.petOwnerLoginForm').fadeToggle(500);
		});


	/////////////////////////
	// Pet Owner Registration
	/////////////////////////
		$('.register').click(function(){
			HideAll();
			$('.petOwnerRegisterForm').fadeToggle(500);

			$('.allContent').toggleClass('blur', 10000);
		});

		$('body > div.petOwnerRegisterForm > div > form > div.col-xs-12.closeButton > i').click(function(){
			$('.allContent').toggleClass('blur', 10000);

			$('.petOwnerRegisterForm').fadeToggle(500);
		});


	///////////////////////
	// Add New Pet -> Owner
	///////////////////////
		$('.addPetButton').click(function(){
			$('.addPetForm').fadeToggle(500);

			$('.allContent').toggleClass('blur', 10000);
		});

		$('body > div.addPetForm > div > form > div > i').click(function(){
			$('.allContent').toggleClass('blur', 10000);

			$('.addPetForm').fadeToggle(500);
		});







});