<?php
/**
 * Csv base pager class
 * 
 * @author Daisuke Sakata <sakatad@websegment.net>
 * @copyright 2012 Daisuke Sakata
 * @example http://websegment.net/examles/CsvPager/
 * 
 */
class CsvPager{
	/**
	 * Show list count.
	 * 
	 * @var int 
	 */
	public $show = 20;
	
	/**
	 * Pager range.
	 * 
	 * @var int
	 */
	public $range = 3;
	
	/**
	 * Csv data
	 * 
	 * @var array
	 */
	public $csv = array();
	
	/**
	 * Page list array.
	 * 
	 * @var array
	 */
	public $pager = array();
	
	/**
	 * Csv record count.
	 * 
	 * @var int
	 */
	public $record = 0;
	
	/**
	 * Page count.
	 * 
	 * @var int
	 */
	public $page = 0;
	
	/**
	 * Current page number.
	 * 
	 * @var int $current
	 */
	public $current = 1;
	
	/**
	 * Csv query data.
	 * 
	 * @var array
	 */
	private $source = array();
	
	/**
	 * previous parameter.
	 * 
	 * @var string $prev
	 */
	public $prev = "";
	
	/**
	 * Next parameter.
	 * 
	 * @var string 
	 */
	public $next = "";
	
	/**
	 * CsvPager constructor.
	 * 
	 * @param array $source Csv data.
	 * @param string $param http get parameter, $_GET["p"] etc...
	 * @param int $show Show list count.
	 * @param int $range Pager show range.
	 */
	public function __construct($source, $param = 1, $show = 20, $range = 3){
		$this->source = $source;
		$this->show = $show;
		$this->range = $range;
		$this->record = count($this->source);
		if(is_numeric($param) && $param > 1){
			$this->current = $param;
		}
		$this->page = ceil($this->record / $this->show);
		$showIndex = ($this->current - 1) * $this->show;
		while($showIndex < $this->current * $this->show){
			if($showIndex >= $this->record){
				break;
			}
			$this->csv[] = $this->source[$showIndex];
			$showIndex++;
		}
		if($this->current > 1){
			$this->prev = ($this->current - 1);
		}
		$start = $this->current - $this->range;
		if($start <= 0){
			$start = 1;
		}
		$end = $this->current + $this->range;
		if($end > $this->page){
			$end = $this->page;
		}
		for($pageNumber = $start; $pageNumber <= $end; $pageNumber++){
			$this->pager[] = $pageNumber;
		}
		if($this->current < $this->page){
			$this->next = ($this->current + 1);
		}
	}
}