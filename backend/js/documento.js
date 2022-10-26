$(function(){

	// Lista de docente
	$.post( '../../frontend/funciones/doc.php' ).done( function(respuesta)
	{
		$( '#doc' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#doc' ).change( function()
	{
		var el_continente = $(this).val();
		// Lista de Paises
		$.post( '../../frontend/funciones/docname.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#docname' ).html( respuesta );
		});

	});

// Lista de Ciudades
	$( '#doc' ).change( function()
	{
		var pais = $(this).val();
		
		$.post( '../../frontend/funciones/doclas.php', { paises: pais} ).done( function( respuesta )
		{
			$( '#doclas' ).html( respuesta );
		});	
		
	});


	// Lista de Ciudades
	$( '#sub' ).change( function()
	{
		var curso = $(this).val();
		
		$.post( '../../frontend/functions/seccurs.php', { cursos: curso} ).done( function( respuesta )
		{
			$( '#curso' ).html( respuesta );
		});	
		
	});
	
	
	

})
