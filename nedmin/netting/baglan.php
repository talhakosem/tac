<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=ahsapvad_reflexible;charset=utf8",'ahsapvad_reflexible','.*X$pj=mO)J$');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>