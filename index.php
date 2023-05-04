<!DOCTYPE html>
<head><title>Charles Severance MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p><p>Esta aplicación toma un hash MD5 de una cadena en minúsculas de dos caracteres y 
        trata de hashear todas las combinaciones de dos caracteres para determinar 
        los caracteres originales.</p></p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// Si no hay parámetros, este código se omite
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    //  Este es nuestro alfabeto
    $txt = "abcdefghijklmnopqrstuvwxyz";
    $show = 15;

    // Bucle externo para recorrer el alfabeto para la
    // primera posición en nuestro texto "posible" previo al hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i];   // El primer caracter

        // Nuestro bucle interno. Observa el uso de nuevas variables
        // $j and $ch2 
        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j];  // Our second character

            // Concatenamos los dos caracteres para 
            // formar el texto previo al hash "posible"
            $try = $ch1.$ch2;

            // Ejecutamos el hash y luego verificamos si es igual al hash buscado
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;   // Salimos del bucle interno
            }

            // Salida de depuración hasta que $show llegue a 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
        }
    }
    //Calculamos el tiempo transcurrido
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Usamos la sintaxis corta y llamamos a htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>

