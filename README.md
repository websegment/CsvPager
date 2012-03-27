# Csv base pager class

## Readme.

    CsvPage{
        /* Propaties */
        public int $show = 20;
        public int $range = 3;
        public array $csv = array();
        public array $pager = array();
        public int $record = 0;
        public int $page = 0;
        public int $current = 1;
        private array $source = array();
        public string $prev = "";
        public string $next = "";
        /* Method */
        public __construct(array $csvdata[, string $currentPage = "1"[, int $showCount = 20[, int $range = 3]]]);
}

## Example.

### Controller file.

    define("SHOW_LIST_COUNT", 10);
    define("RANGE_COUNT", 2);
    $csv = new CsvPager($csvdata, $_GET["p"], SHOW_LIST_COUNT, RANGE_COUNT);

### View file.

    <!--pagination-->
    <?php if(count($csv->pager) > 0):?>
    <div class="pagination">
    <ul>
    <?php if($csv->prev == ""):?>
    <li class="disabled"><a href="#">prev</a></li>
    <?php else:?>
    <li><a href="?p=<?php echo htmlspecialchars($csv->prev)?>">prev</a></li>
    <?php endif;?>
    <?php foreach($csv->pager as $p):?>
    <li<?php echo($p == $csv->current)?' class="active"':"";?>><a href="?p=<?php echo htmlspecialchars($p)?>"><?php echo htmlspecialchars($p)?></a></li>
    <?php endforeach;?>
    <?php if($csv->next == ""):?>
    <li class="disabled"><a href="#">next</a></li>
    <?php else:?>
    <li><a href="?p=<?php echo htmlspecialchars($csv->next)?>">next</a></li>
    <?php endif;?>
    </ul>
    </div>
    <?php endif; ?>
    <!--/pagination--> 

