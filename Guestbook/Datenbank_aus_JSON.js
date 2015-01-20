$(document).ready(function(){
		$.ajax({
			url: 'data.json',
			dataType: 'json',
			success: function(data){
			 console.log(data);
			 $("h1").append( $("<p>").text(
				data.eintrag[0].name +
				", " + 
				data.eintrag[0].id
			 ) );
		}
    });
});