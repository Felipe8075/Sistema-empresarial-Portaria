<?php
date_default_timezone_set('America/Sao_Paulo');
$filename =  date("Y.m.d-i") . '.jpg';
$filepath = '../Galeria/Fotosentregs/';
?>
<?php
if(isset($_FILES['webcam'])){    
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
}
?>