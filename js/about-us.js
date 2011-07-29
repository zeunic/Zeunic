$(function(){

	var twProfiles = ["sprjrx", "JoeLessard", "parkrr", "sbaileydev"];

	$('.tweet').each(function(index){
		$(this).tweets({
			username: twProfiles[index],
			cite: false
		});
	});
});