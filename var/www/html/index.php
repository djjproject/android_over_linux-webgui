<?php
  
  $model=exec("/usr/lib/aolwebgui/dashboard model");
  $eaddr=exec("/usr/lib/aolwebgui/dashboard eaddr");
  if ($eaddr=="") $eaddr="not connected";
  $waddr=exec("/usr/lib/aolwebgui/dashboard waddr");
  if ($waddr=="") $waddr="not connected";
  $cpu=exec("/usr/lib/aolwebgui/dashboard cpu");
  $board=exec("/usr/lib/aolwebgui/dashboard board");
  $memall=exec("/usr/lib/aolwebgui/dashboard memall");
  $uptime=exec("/usr/lib/aolwebgui/dashboard uptime");
  $cpuusage=exec("/usr/lib/aolwebgui/dashboard cpuusage");

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
      <div class="panel panel-default">
        <div class="panel-heading">System</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2 itemname">Model</div>
            <div class="col-sm-4"><?=$model?></div>
            <div class="col-sm-2 itemname">Ethernet IP</div>
            <div class="col-sm-4"><?=$eaddr?></div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">CPU</div>
            <div class="col-sm-4"><?=$cpu?></div>
            <div class="col-sm-2 itemname">WiFi IP</div>
            <div class="col-sm-4"><?=$waddr?></div>
          </div>
          <div class="row">
            <div class="col-sm-2 itemname">RAM</div>
            <div class="col-sm-4"><?=$memall?>MB</div>
            <div class="col-sm-2 itemname">Board</div>
            <div class="col-sm-4"><?=$board?></div>
          </div>
		  <div class="row">
			<div class="col-sm-2 itemname">UPTime</div>
            <div class="col-sm-10"><?=$uptime?></div>
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
            <div class="col-sm-2">CPU Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?=$cpuusage?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$cpuusage?>%"><?=$cpuusage?>%</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">Ram Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">80% (1722MB/1819MB)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">Swap Usage</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">20% (200MB/800MB)</div>
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
            <div class="col-sm-2">/data</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">25% (1.4GB/9GB)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">sda1</div>
            <div class="col-sm-10">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:31%">31% (1.2T/3.7T)</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">sdb1</div>
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
