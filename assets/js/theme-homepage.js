$(document).ready(function(){
	scrollNavbar();
	$("#alerts").modal('show');
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