$(document).ready(function(){
		$.ajax({
			<!-- result = 10 holt 1 Personen -->
			url: 'http://api.randomuser.me/?results=10',
			dataType: 'json',
			success: function(data){
			 console.log(data);
			 for(var i = 0; i < 10; i++) {
			 $("#person"+i).append( $("<p>").text(
				data.results[i].user.name.last +
				", " + 
				data.results[i].user.name.first 
			 )).append(
			  $("<p>").text(data.results[i].user.location.street)
			  ).append(
			$("<img>", { src:data.results[i].user.picture.medium})
			 );
		   }
		}
    });
});