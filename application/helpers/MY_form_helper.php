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
function form_input_infield($data = '', $value = '', $extra = '')
{
    $defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
    	$prefix="<p>";
    	$suffix="</p>";

    	if(isset($data['instruction']))
    		 $suffix="&nbsp".$data['instruction'].$suffix;
    	if(isset($data['label'])&&isset($data['id']))
    		$prefix=$prefix."<label for=".$data['id'].">".$data['label']."</label>";
		return $prefix."<input "._parse_form_attributes($data, $defaults).$extra." />".$suffix;
}
function generate_form($action='',$elements='',$attr=''){
		$html='<div id="errorPanel">Fields Marked In Red Must Be Filled!</div>';

	if(!isset($action))
		return '';
	if(is_array($attr))
		$html.=form_open($action,$attr);
	else
		$html.=form_open($action);
	if(is_array($elements)){
		foreach($elements as $elem){
			if($elem['input']=="text"){
				unset($elem['input']);
				$html.=form_input_infield($elem);
				}
			else if($elem['input']=="select"){
				$html.=form_dropdown_formatted($elem['name'], $elem['attributes'], $elem['values']);
			}
			else if($elem['input']=="submit"){
				$html.=form_submit('',$elem['value']);
			}
			
		
	}
	
	}
	$html.=form_close();

	return $html;
}
	function form_dropdown_formatted($name = '',$attributes=array(), $options = array(), $selected = array(), $extra = '')
	{	$label='';
		if(is_array($name))
		{	$label=$name['label'];
			$name=$name['name'];
		}
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
		$id='';
		if(isset($attributes['id']))
			$id=' id="'.$attributes['id'].'" ';
		$form ='<p>'.$label. '<select'.$id.' name="'.$name.'"'.$extra.$multiple.">\n";

		foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if (is_array($val) && ! empty($val))
			{
				$form .= '<optgroup label="'.$key.'">'."\n";

				foreach ($val as $optgroup_key => $optgroup_val)
				{
					$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

					$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
				}

				$form .= '</optgroup>'."\n";
			}
			else
			{
				$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
			}
		}
		
		$form .= '</select></p>';

		return $form;
	}
