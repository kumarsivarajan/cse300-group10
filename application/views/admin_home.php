<!DOCTYPE html>
<html lang="en">
<head>
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
                marginBottom: 25
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
                    text: 'September'
                },
                categories: ['11', '12', '13', '14',
                    '15', '16', '17', '18', '19', '20']
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
            series: [{
                name: 'Btech',
                data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18]
            }, {
                name: 'Mtech',
                data: [0, 0, 5, 11, 17, 22, 24, 24, 20, 14]
            }, {
                name: 'Phd',
                data: [0, 0, 3, 0, 1, 1, 1, 0, 2, 0]
            }]
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
	<div id="container"></div>
	
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>