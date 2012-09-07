<?php
//To get <p> formatted elements
function form_input_formatted($data = '', $value = '', $extra = '')
{
    $defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
    	$prefix="<p>";
    	$suffix="</p>";
    	if(isset($data['label']))
    		$prefix=$prefix.$data['label'];
		return $prefix."<input "._parse_form_attributes($data, $defaults).$extra." />".$suffix;
}