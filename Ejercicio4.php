<!DOCTYPE HTML>
<html lang="es">

<!-- Datos que describen el documento -->
<head>
    <meta charset="UTF-8" />
    <title>Cotización del cobre (JSON)</title>
    <meta name="author" content="Adriana Rodríguez Flórez, UO282798" />
    <meta name="description" content="[PHP] Consumo de servicio para el precio del cobre" />
    <meta name="keywords" content="cobre,servicio,cotizacion,php" />
    <?php require 'Clase_ServicioCobre.php'?> <!-- Incluir el código PHP que especifica la calculadora -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="Ejercicio4.css" />
</head>

<body>

    <header>
        <h1>COTIZACIÓN del cobre</h1>    
        <h2>JSON - <a href="https://metals-api.com/api/">Metals API</a></h2>    
    </header>


    <main>
        <h3>Consulte el precio del cobre</h3>


        <section>

            <form action="#" method='post' name='divisas'>
                <h4>Dólares estadounidenses ($)</h4>
                <input type="submit" name="usd" value="USD" />
                <h4>Euros (€)</h4>
                <input type="submit" name="eur" value="EUR" />
        
                <h4>Libras esterlinas (£)</h4>
                <input type="submit" name="gbp" value="GBP" /> 
            </form>
    
            
            <!-- Pantalla de la calculadora (solo se interactúa con los botones)-->
            <form action='#' method='post' name='cotizaciones'>
                <article>
                    <h4>Cotización del cobre</h4>
                    <?php echo $_SESSION['divisas']->cargarDatos()?>
                </article>
            </form>
        </section>

    </main>


    <footer>
        <p>Software y Estándares para la Web</p>
        <p>Grado en Ingeniería Informática del Software (Universidad de Oviedo)</p>
        <address>
            <p>Contacto: 
            <a href="mailto:UO282798@uniovi.es">Adriana Rodríguez Flórez (UO282798@uniovi.es)</a></p>
        </address>
    </footer>

</body>

</html>
