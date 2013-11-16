$(document).ready(function()
{
	$("#nextButton").hide();
	$("#previousButton").hide();
	$("input").change(function()
	{
		$("#nextButton").show();
	});
	$("#nextButton").click(function()
	{
		$("#previousButton").show();
		$("#nextButton").hide();
	});
});