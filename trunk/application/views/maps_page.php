<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2" style="padding-left: 20px;padding-bottom: 10px">
		<h1><center>Find your House !!</center></h1>
		<b><center> WE WERE NOT ABLE TO FIND YOUR RESIDANCE, PLEASE POINT IT OUT ON THE MAP </center><b> <br />
		
		
		<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=delhi&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=26.258506,46.582031&amp;ie=UTF8&amp;hq=&amp;hnear=New+Delhi,+Delhi,+India&amp;t=h&amp;z=9&amp;ll=28.635308,77.22496&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=delhi&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=26.258506,46.582031&amp;ie=UTF8&amp;hq=&amp;hnear=New+Delhi,+Delhi,+India&amp;t=h&amp;z=9&amp;ll=28.635308,77.22496" style="color:#0000FF;text-align:left">View Larger Map</a></small>
		<br />
		<button>Proceed</button>
		
		</br>
		
		
		
		
		
	</div>
	</div>
</body>
</html>
