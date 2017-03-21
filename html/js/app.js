$(function () {
	$( "#bird-form" ).submit(function( event ) {
		//alert($("#bird-text").val());
		showLoading();
		$.post( "php/setinfo.php", { text: $("#bird-text").val(),type:"bird" })
			.done(function( data ) {
			//alert( "Data Loaded: " + data );
				$( "#genimg" ).append('<img src="data/'+data+'.jpg" width="800">');
				hideLoading();
		});
		event.preventDefault();
		
	});

	$( "#flower-form" ).submit(function( event ) {
		//alert($("#bird-text").val());
		showLoading();
		$.post( "php/setinfo.php", { text: $("#flower-text").val(),type:"flower" })
			.done(function( data ) {
			//alert( "Data Loaded: " + data );
				$( "#genimg" ).append('<img src="data/'+data+'.jpg" width="800">');
				hideLoading();
		});
		event.preventDefault();
		
	});
	function showLoading(){
		window.loading_screen = window.pleaseWait({
			logo: "img/wheel.gif",
			backgroundColor: '#FFFFFF',
			loadingHtml: "<p class='loading-message'>Generating Images</p>"
	      });
	}
	function hideLoading(){
		window.loading_screen.finish();
	}

});