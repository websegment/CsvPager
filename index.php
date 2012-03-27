<?php
require_once "CsvPager.php";
define("DATA", "source/data.csv");
define("SHOW_LIST_COUNT", 10);
define("RANGE_COUNT", 2);
$data = array();

$fp = fopen(DATA, "r");
if($fp){
	flock($fp, 2);
	while($line = fgets($fp)){
		$data[] = explode("\t", $line);
	}
	fclose($fp);
}
$csv = new CsvPager($data, $_GET["p"], SHOW_LIST_COUNT, RANGE_COUNT);
require_once "view.php";
