<?php
//To get <p> formatted elements
function form_input_formatted($data = '', $value = '', $extra = '',$ifBreak=true)
{
    $defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
    $prefix='';
    $suffix='';
    if($ifBreak){
    	$prefix="<p>";
    	$suffix="</p>";
    	}
    	if(isset($data['label']))
    		$prefix=$prefix.'<label>'.$data['label'].'</label>';
		return $prefix."<input "._parse_form_attributes($data, $defaults).$extra." />".$suffix;
}
function form_checkbox_formatted($data = '', $value = '', $checked = FALSE, $extra = '')
	{
		$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if(isset($data['label']))
		{	$label=$data['label'];
			unset($data['label']);
		}
		
		
		if (is_array($data) AND array_key_exists('checked', $data))
		{
			$checked = $data['checked'];

			if ($checked == FALSE)
			{
				unset($data['checked']);
			}
			else
			{
				$data['checked'] = 'checked';
			}
		}
		  $prefix='<p>';
		  $suffix='</p>';
  
		if ($checked == TRUE)
		{
			$defaults['checked'] = 'checked';
		}
		else
		{
			unset($defaults['checked']);
		}

		return $prefix.$label."<input "._parse_form_attributes($data, $defaults).$extra." />".$suffix;
	}

function form_input_infield($data = '', $value = '', $extra = '',$ifBreak=true)
{
    $defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
    
    $prefix='';
    $suffix='';
    if($ifBreak){
    	$prefix="<p>";
    	$suffix="</p>";
    	}
    	if(isset($data['instruction']))
    		 $suffix="&nbsp".$data['instruction'].$suffix;
    	if(isset($data['label'])&&isset($data['id']))
    		$prefix=$prefix."<label class=\"infield\" for=".$data['id'].">".$data['label']."</label>";
		return $prefix."<input "._parse_form_attributes($data, $defaults).$extra." />".$suffix;
}
function form_textarea_infield($data = '', $value = '', $extra = '')
	{
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'cols' => '40', 'rows' => '10');

		$prefix="<p>";
    	$suffix="</p>";
		
		if ( ! is_array($data) OR ! isset($data['value']))
		{
			$val = $value;
		}
		else
		{
			$val = $data['value'];
			unset($data['value']); // textareas don't use the value attribute
		}

		if(isset($data['label'])&&isset($data['id']))
    		$prefix=$prefix."<label class=\"infield\" for=".$data['id'].">".$data['label']."</label>";
		
		$name = (is_array($data)) ? $data['name'] : $data;
		return $prefix."<textarea "._parse_form_attributes($data, $defaults).$extra.">".form_prep($val, $name)."</textarea>".$suffix;
	}

function form_textarea_formatted($data = '', $value = '', $extra = '')
	{
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'cols' => '40', 'rows' => '10');

		$prefix="<p>";
    	$suffix="</p>";
		
		if ( ! is_array($data) OR ! isset($data['value']))
		{
			$val = $value;
		}
		else
		{
			$val = $data['value'];
			unset($data['value']); // textareas don't use the value attribute
		}

		if(isset($data['label'])&&isset($data['id']))
    		$prefix=$prefix.'<label>'.$data['label'].'</label>';
		
		$name = (is_array($data)) ? $data['name'] : $data;
		return $prefix."<textarea "._parse_form_attributes($data, $defaults).$extra.">".form_prep($val, $name)."</textarea>".$suffix;
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
				$html.=form_dropdown_formatted($elem['name'], $elem['attributes'], $elem['values'],$elem['selected']);
			}
			else if($elem['input']=="submit"){
				$html.=form_submit('',$elem['value']);
			}
			else if ($elem['input']=="textarea"){
				$html.=form_textarea_infield($elem);
				}
				
			else if ($elem['input']=="checkbox"){
				$html.=form_checkbox_formatted($elem);
				}
			
		
	}
	
	}
	$html.=form_close();

	return $html;
}
function generate_form_nostyle($action='',$elements='',$attr=''){
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
				$html.=form_input_formatted($elem);
				}
			else if($elem['input']=="select"){
				$html.=form_dropdown_formatted($elem['name'], $elem['attributes'], $elem['values'],$elem['selected']);
			}
			else if($elem['input']=="submit"){
				$html.=form_submit('',$elem['value']);
			}
			else if ($elem['input']=="textarea"){
				$html.=form_textarea_formatted($elem);
				}
				
			else if ($elem['input']=="checkbox"){
				$html.=form_checkbox_formatted($elem);
				}
			
		
	}
	
	}
	$html.=form_close();

	return $html;
}

function generate_form_nobreak($action='',$elements='',$attr=''){
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
				$html.=form_input_infield($elem,'','',false);
				}
			else if($elem['input']=="select"){
				$html.=form_dropdown_formatted($elem['name'], $elem['attributes'], $elem['values'],'','',false);
			}
			else if($elem['input']=="submit"){
				$html.=form_submit('',$elem['value']);
			}
			
		
	}
	
	}
	$html.=form_close();

	return $html;
}

	function form_dropdown_formatted($name = '',$attributes=array(), $options = array(), $selected = array(), $extra = '',$ifBreak=true)
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
		 $prefix='';
    $suffix='';
    if($ifBreak){
    	$prefix="<p>";
    	$suffix="</p>";
    	}
   
		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
		$id='';
		if(isset($attributes['id']))
			$id=' id="'.$attributes['id'].'" ';
		$form =$prefix.$label. '<select'.$id.' name="'.$name.'"'.$extra.$multiple.">\n";

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
		
		$form .= '</select>'.$suffix;

		return $form;
	}
