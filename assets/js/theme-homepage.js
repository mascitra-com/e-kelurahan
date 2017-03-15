$(document).ready(function(){
	scrollNavbar();
	$("#alerts").modal('show');
	$(".pengumuman").marquee({direction:'left',duration:17000,duplicated:true});
});

function scrollNavbar()
{
	$(window).scroll(function(){
		if ($(document).scrollTop() > 50)
		{
			$("#top-menu > .navbar").addClass('scrolled');
		}
		else
		{
			$("#top-menu > .navbar").removeClass('scrolled');
		}
	});
}