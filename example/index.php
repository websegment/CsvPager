<?php
require_once dirname(__FILE__).'/../CsvPager.php';

define('DATA', dirname(__FILE__).'/data.csv');
define('SHOW_LIST_COUNT', 10);
define('RANGE_COUNT', 2);

$data = array();
$p = (isset($_GET['p']))?$_GET['p']:1;

if(($fp = fopen(DATA, 'r')) !== null){
	while($line = fgets($fp)){
		$data[] = explode("\t", $line);
	}
	fclose($fp);
	$csv = new CsvPager($data, $p, SHOW_LIST_COUNT, RANGE_COUNT);
	require_once dirname(__FILE__).'/viewList.php';
}else{
	die('Oh my god.');
}