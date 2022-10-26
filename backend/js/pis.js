$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/pis.php' ).done( function(respuesta)
    {
        $( '#pis' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#pis' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
