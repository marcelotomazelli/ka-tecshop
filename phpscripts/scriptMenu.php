<?php

require_once './phpscripts/classConnection.php';
require_once './phpscripts/classKAControl.php';

$_kacontrol = new Connection();
$_kacontrol = new KAControl($_kacontrol);

$query = "
	SELECT marca, cespecifico, cmedio
	FROM produtos
";

$list = $_kacontrol->read($query, []);

$cespecifico = array();

$menu = array();

foreach ($list as $item) {
	$im = '';
	if(!empty($item->cmedio))
		$im = $item->cmedio;

	$ie = $item->cespecifico;
	$mc = $item->marca;

	if(!empty($im) && $im != 'pf') {

		if(!isset($menu[$im])){
			$menu[$im] = array();
			$menu[$im][$ie] = array();
			$menu[$im][$ie][$mc] = 1;
		} else if(!isset($menu[$im][$ie])) {
			$menu[$im][$ie] = array();
			$menu[$im][$ie][$mc] = 1;
		} else if(!isset($menu[$im][$ie][$mc])) {
			$menu[$im][$ie][$mc] = 1;
		} else {
			$menu[$im][$ie][$mc] += 1;
		}

	} else {

		if(!isset($cespecifico[$ie]))
			$cespecifico[$ie] = 1;
		else {
			$cespecifico[$ie] += 1;
		}

	}
}

$menu['e'] = $cespecifico;

?>