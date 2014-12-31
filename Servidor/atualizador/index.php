<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Atualização</title>
        <script src="../jquery/jquery-2.0.3.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $( document ).ready(function() {

               setInterval(function(){

               $.post( "refresh.php", function( data ) {
                    $( "section" ).html( data );
               });

               },15000);

            })

        </script>
    </head>
    
    <body>
        
        <section></section>
        
    </body>
</html>

