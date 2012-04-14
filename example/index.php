<?php
require_once dirname(__FILE__).'/../CsvPager.php';

define('DATA', dirname(__FILE__).'/data.csv');
define('SHOW_LIST_COUNT', 10);
define('RANGE_COUNT', 2);

$data = array();

$fp = fopen(DATA, 'r');
if($fp){
	while($line = fgets($fp)){
		$data[] = explode("\t", $line);
	}
	fclose($fp);
}
$csv = new CsvPager($data, $_GET['p'], SHOW_LIST_COUNT, RANGE_COUNT);
require_once dirname(__FILE__).'/viewList.php';
