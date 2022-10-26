$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/cli.php' ).done( function(respuesta)
    {
        $( '#cli' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#cli' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
