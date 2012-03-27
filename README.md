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

    &lt;!--pagination--&gt;
    &lt;?php if(count($csv-&gt;pager) &gt; 0):?&gt;
    &lt;div class=&quot;pagination&quot;&gt;
    &lt;ul&gt;
    &lt;?php if($csv-&gt;prev == &quot;&quot;):?&gt;
    &lt;li class=&quot;disabled&quot;&gt;&lt;a href=&quot;#&quot;&gt;prev&lt;/a&gt;&lt;/li&gt;
    &lt;?php else:?&gt;
    &lt;li&gt;&lt;a href=&quot;?p=&lt;?php echo htmlspecialchars($csv-&gt;prev)?&gt;&quot;&gt;prev&lt;/a&gt;&lt;/li&gt;
    &lt;?php endif;?&gt;
    &lt;?php foreach($csv-&gt;pager as $p):?&gt;
    &lt;li&lt;?php echo($p == $csv-&gt;current)?' class=&quot;active&quot;':&quot;&quot;;?&gt;&gt;&lt;a href=&quot;?p=&lt;?php echo htmlspecialchars($p)?&gt;&quot;&gt;&lt;?php echo      htmlspecialchars($p)?&gt;&lt;/a&gt;&lt;/li&gt;
    &lt;?php endforeach;?&gt;
    &lt;?php if($csv-&gt;next == &quot;&quot;):?&gt;
    &lt;li class=&quot;disabled&quot;&gt;&lt;a href=&quot;#&quot;&gt;next&lt;/a&gt;&lt;/li&gt;
    &lt;?php else:?&gt;
    &lt;li&gt;&lt;a href=&quot;?p=&lt;?php echo htmlspecialchars($csv-&gt;next)?&gt;&quot;&gt;next&lt;/a&gt;&lt;/li&gt;
    &lt;?php endif;?&gt;
    &lt;/ul&gt;
    &lt;/div&gt;
    &lt;?php endif; ?&gt;
    &lt;!--/pagination--&gt;

