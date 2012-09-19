<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--<title>Welcome to Hostel Allocation System - <?php echo $ins_name ?></title>-->
		<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
	    <?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>


	    <script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Allotment Summary, 2012'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Hostel Allocation',
                data: [
                    ['Phd',   5.0],
                    ['Btech',       62.0],
                    {
                        name: 'Vacant',
                        y: 3,
                        sliced: true,
                        selected: true
                    },
                    ['Mtech',    30.0],
                   ]
            }]
        });
    });
    
});
		</script>

		
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>Welcome to Hostel Allocation System - <?php echo $ins_name ?>!<center></h1>
		<div id="body" style="text-align: center">		
			<!-- <?php if(isset($cust_msg)):?>
		
			<p> <?php echo $cust_msg ?>
			<?php endif?> -->
			<p>Todays is <?php echo $date?></p>
		</div>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

		
	</div>

</div>

</body>
</html>