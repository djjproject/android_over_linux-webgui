<?php

  $script="/usr/lib/aolwebgui/dashboard";
  
  $model=exec("$script model");
  $eaddr=exec("$script eaddr");
  if ($eaddr=="") $eaddr="not connected";
  $waddr=exec("$script waddr");
  if ($waddr=="") $waddr="not connected";
  $cpu=exec("$script cpu");
  $board=exec("$script board");
  $memall=exec("$script memall");
  $uptime=exec("$script uptime");
  $cpuusage=exec("$script cpuusage");
  
  $memuse=exec("$script memuse");
  $mem_percent=round($memuse / $memall * 100,0);
  
  $swapuse=exec("$script swapuse");
  $swapall=exec("$script swapall");
  $swap_percent=round($swapuse / $swapall * 100,0);

?>

<html lang="en">
<head>
  <title>AndroidOverLinux Web</title>
<meta http-equiv="refresh" content="5">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">AOL Configuration Panel</a>
      </div>
      <div class="collapse navbar-collapse" id="topnav">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> Dashboard </a></li>
          <li><a href="basic.html"><span class="glyphicon glyphicon-tasks"></span> Basic Service </a></li>
          <li><a href="other.html"><span class="glyphicon glyphicon-briefcase"></span> Other Service </a></li>
          <li><a href="version.html"><span class="glyphicon glyphicon-question-sign"></span> Version Info </a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default panel-info">
        <div class="panel-heading">System</div>
        <div class="panel-body">
			<div class="col-sm-6 margin0">
			  <div class="row">
				<div class="col-sm-4 itemname">Model</div>
				<div class="col-sm-8"><?=$model?></div>
			  </div>
			  <div class="row">
				<div class="col-sm-4 itemname">CPU</div>
				<div class="col-sm-8"><?=$cpu?></div>
			  </div>
			  <div class="row">
				<div class="col-sm-4 itemname">RAM</div>
				<div class="col-sm-8"><?=$memall?>MB</div>
			  </div>
			</div>
			<div class="col-sm-6 margin0">
			  <div class="row">
				<div class="col-sm-4 itemname">Ethernet IP</div>
				<div class="col-sm-8"><?=$eaddr?></div>
			  </div>
			  <div class="row">
				<div class="col-sm-4 itemname">WiFi IP</div>
				<div class="col-sm-8"><?=$waddr?></div>
			  </div>
			  <div class="row">
				<div class="col-sm-4 itemname">Board</div>
				<div class="col-sm-8"><?=$board?></div>
			  </div>
			</div>
			<div class="col-sm-12 margin0">
				<div class="row">
					<div class="col-sm-2 itemname">UPTime</div>
					<div class="col-sm-10"><?=$uptime?></div>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Resource</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2 itemname">CPU Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?=$cpuusage?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$cpuusage?>%"><?=$cpuusage?>%</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">Ram Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?=$mem_percent?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$mem_percent?>%"><?=$mem_percent?>% (<?=$memuse?>MB/<?=$memall?>MB)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">Swap Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?=$swap_percent?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$swap_percent?>%"><?=$swap_percent?>% (<?=$swapuse?>MB/<?=$swapall?>MB)</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Disk Usage</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2 itemname">/data</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">25% (1.4GB/9GB)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">sda1</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:31%">31% (1.2T/3.7T)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">sdb1</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:42%">42% (3GB/7.2GB)</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</body>
</html>
