<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>CsvPager example</title>
<meta name="author" content="Daisuke Sakata" />
<!-- Le styles -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
<style type="text/css">
body {
   padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
}
</style>
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le fav and touch icons -->
</head>
<body>
<div class="container">
<h1>CsvPager example</h1>
<dl>
<dt>一覧に表示する件数</dt>
<dd><?php echo $csv->show?>件</dd>
<dt>データ総数</dt>
<dd><?php echo count($data)?>件</dd>
<dt>ページ数</dt>
<dd><?php echo $csv->page?>ページ</dd>
</dl>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>州名</th>
<th>州名（日本語）</th>
<th>略名</th>
<th>加盟年月</th>
<th>人口</th>
<th>面積</th>
<th>人口密度</th>
<th>州都</th>
<th>州都（日本語）</th>
<th>州最大都市</th>
<th>州最大都市（日本語）</th>
</tr>
</thead>
<tbody>
<?php foreach($csv->csv as $d):?>
<tr>
<td><?php echo htmlspecialchars($d[0])?></td>
<td><?php echo htmlspecialchars($d[1])?></td>
<td><?php echo htmlspecialchars($d[2])?></td>
<td><?php echo htmlspecialchars($d[3])?></td>
<td><?php echo htmlspecialchars($d[4])?></td>
<td><?php echo htmlspecialchars($d[5])?></td>
<td><?php echo htmlspecialchars($d[6])?></td>
<td><?php echo htmlspecialchars($d[7])?></td>
<td><?php echo htmlspecialchars($d[8])?></td>
<td><?php echo htmlspecialchars($d[9])?></td>
<td><?php echo htmlspecialchars($d[10])?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<!--pagination-->
<?php if(count($csv->pager) > 0):?>
<div class="pagination">
<ul>
<?php if($csv->prev == ''):?>
<li class="disabled"><a href="#">prev</a></li>
<?php else:?>
<li><a href="?p=<?php echo urlencode($csv->prev)?>">prev</a></li>
<?php endif;?>
<?php foreach($csv->pager as $p):?>
<li<?php echo($p == $csv->current)?' class="active"':'';?>><a href="?p=<?php echo urlencode($p)?>"><?php echo htmlspecialchars($p)?></a></li>
<?php endforeach;?>
<?php if($csv->next == ''):?>
<li class="disabled"><a href="#">next</a></li>
<?php else:?>
<li><a href="?p=<?php echo urlencode($csv->next)?>">next</a></li>
<?php endif;?>
</ul>
</div>
<?php endif; ?>
<!--/pagination-->
</div><!-- /container -->
</body>
</html>
