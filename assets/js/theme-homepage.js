$(document).ready(function(){
	scrollNavbar();
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