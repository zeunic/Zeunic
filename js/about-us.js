$(function(){

	var twProfiles = ["sprjrx", "JoeLessard", "parkrr", "sbaileydev"];

	$('.tweet').each(function(index){
		// update for git
		$(this).tweets({
			tweets: 1,
			username: twProfiles[index],
			cite: false
		});
	});
});
