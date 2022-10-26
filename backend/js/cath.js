$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/cath.php' ).done( function(respuesta)
    {
        $( '#cat' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#cat' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
