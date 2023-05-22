<?php
$visitas = " ";

function contadorClick()
{
    $archivo = "txt/contador.txt";
    $f = fopen($archivo, "r");
    if ($f) {
        $contador = fread($f, filesize($archivo));
        $contador = $contador + 1;
        fclose($f);
    }
    $f = fopen($archivo, "w+");
    if ($f) {
        fwrite($f, $contador);
        fclose($f);
    }
  return $contador;

}
$clicks = " ";
function asig_Contadorview()
{
    global $clicks;
    $clicks = contadorvisitas();
    return $clicks;
}

function contadorvisitas()//  La función que ejecutara las visitas
{
    $archivo = "txt/contadorvisitas.txt"; //el archivo donde se almacena las visitas
    $f = fopen($archivo, "r"); //abrimos el fichero
    if ($f) {
        $contadorvisitas = fread($f, filesize($archivo)); //vemos el archivo a grabar
        $contadorvisitas = $contadorvisitas + 1; // Le agregamos una visita mas al contador
        fclose($f);
    }
    $f = fopen($archivo, "w+");
    if ($f) {
        fwrite($f, $contadorvisitas);
        fclose($f);
    }
    return $contadorvisitas;
}

?>