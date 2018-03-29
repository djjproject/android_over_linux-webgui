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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="favicon.ico" rel="icon" type="image/x-icon">
</head>

<body>

<script>
	function autoRefresh_div() {
		var currentLocation = window.location;
		$("#refresh").load(currentLocation + ' #refresh');
	}
	setInterval('autoRefresh_div()', 10000);
</script>

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
          <li class="active"><a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard </a></li>
          <li><a href="basic.php"><span class="glyphicon glyphicon-tasks"></span> Basic Service </a></li>
          <li><a href="other.php"><span class="glyphicon glyphicon-briefcase"></span> Other Service </a></li>
          <li><a href="version.php"><span class="glyphicon glyphicon-question-sign"></span> Version Info </a></li>
        </ul>
      </div>
    </div>
  </nav>
  
	<div id=refresh>
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
				<div class="panel panel-default panel-info">
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
				<div class="panel panel-default panel-info">
					<div class="panel-heading">Disk Usage</div>
					<div class="panel-body">
						<?php 
						$index=1;
						$device=exec("$script device $index");
						$is_same="rawdata";
						while ($device!="") {
								$deviceused=exec("$script deviceused $index");
								$devicesize=exec("$script devicesize $index");
								$deviceavail=exec("$script deviceavail $index");
								echo '<div class="row">';
								echo '<div class="col-sm-2 itemname">'.$device.'</div>';
								echo '<div class="col-sm-10">';
								echo '<div class="progress">';
								echo '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.$deviceavail.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$deviceavail.'%">'.$deviceavail.'% ('.$deviceused.'/'.$devicesize.')</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							
							$index++;
							$device=exec("$script device $index");
						}
						?>
					</div>
				</div>
			</div>
		</div>
    
    <?php
    $traffic=exec("$script traffic");
    ?>
  
  
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default panel-info">
          <div class="panel-heading">Network Traffic</div>
           <div class="panel-body">
            <img src="eth0.png" class="img-responsive" style="width:100%" onerror="this.style.display='none'">
            <img src="wlan0.png" class="img-responsive" style="width:100%" onerror="this.style.display='none'">
           </div>
        </div>
      </div>
      
      <div class="col-sm-6">
        <div class="panel panel-default panel-info">
          <div class="panel-heading">Enabled Service</div>
           <div class="panel-body">
              <?php 
              $index=1;
              $service=exec("$script getservice $index");
              $is_same="rawdata";
              while ($service!="") {
                echo '<div class="row"><div class="col-sm-6">'.$service.'</div></div>';
                $index++;
                $service=exec("$script getservice $index");
              }
              ?>
              
           </div>
        </div>
      </div>
    </div>
  
    
    
    
    
	</div>
  
	
</div>

</body>
</html>
