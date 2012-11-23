<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?php echo base_url(); ?>favicon3.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	<title>Hostel Allocation - Backend</title>
			<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',
                marginRight: 130,
                marginBottom: 35
            },
            title: {
                text: 'Applications Data',
                x: -20 //center
            },
            subtitle: {
                text: 'Last 10 Days',
                x: -20
            },
            xAxis: {
            title: {
                    text: <?php echo "'".$month."'"; ?>
                },
                categories: <?php echo $datestring ?>
            },
            yAxis: {
                title: {
                    text: 'Number Of Applications'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [
            
            <?php foreach($programstring as $programs=>$apps)
            	echo "{ name:'".$programs."', data:".$apps."}," ?>
            	]
        });
    });
    
});
</script>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<!-- This where you write you code-->
	<div class="info">
	<h2> Applications</h2>
	<?php 
		$total=0;
		foreach($statsbyprog as $prog=>$num){
			echo '<div class="'.$prog.'">'.$prog.':'.$num.'</div>';
			$total+=$num;
			}
			echo 'Total:'.$total.'<br>'; ?>
	</div>
	<div id="container"></div>
	
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>