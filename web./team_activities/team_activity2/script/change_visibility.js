$(document).ready(function(){
$("#visibilitychange").click(function(){
$("#div3").fadeToggle(2500);
});
$("#colorchange").click(function(){
	var color = document.getElementById('color').value;
$("#div2").css("background-color", color);
});
});