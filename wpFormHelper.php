<?php
/**
 * @ wp form helper
 * @ Rahi saiful
 * @ rahisaiful.com 
 */
 
function wpfh_input_fields( $args = array() ){
 
	$default = array(
		'type' 			=> 'text',
		'id' 			=> '',
		'class' 		=> '',
		'required' 		=> false,
		'name' 			=> '',
		'value' 		=> '',
		'placeholder' 	=> '',
		'options' 		=> array(),
		'custom_attr'	=> array(),
	);
 
 
	$field = wp_parse_args( $args, $default );
 
	$field_attrs = array_merge(
		array(
			'id'			=> $field['id'],
			'class'			=> $field['class'],
			'name'  		=> $field['name'],
			'value'			=> $field['value'],
			'placeholder'	=> $field['placeholder'],
			'required'	=> $field['required'],
		),
		$field['custom_attr']
	);
	
	$custom_attrs = wpfh_html_attr( $field_attrs );
		
	switch( $field['type'] ) {
		case 'text':
		case 'number':
		case 'email':
		case 'hidden':
		case 'url':
			echo '<input type="'.$field['type'].'"'. implode(' ', $custom_attrs ).' />';
			break;
		case 'select':
			if( $field['options'] ){
				echo '<select '.implode(' ', $custom_attrs ).'>';
					foreach( $field['options'] as $key => $value ){					
						printf( "<option value='%s'%s>%s</option>\n", $key, selected( $field['options'], $key, false ), $value  );
					}
				echo '</select>';
			}
			break;
		case 'textarea':
			echo '<textarea '.implode(' ',$custom_attrs ).'>'.esc_textarea( $field['value'] ).'</textarea>';
			break;
		default:
			#......
			break;
	}
 
}

// html form attr 
function wpfh_html_attr( $attrs = array() ){
	$custom_attrs = array();
	
	if( !empty( $attrs ) && is_array( $attrs ) ){
		
		foreach( $attrs as $key => $value ){
			if( !empty( $value ) ){
				$custom_attrs[]= esc_attr( $key ).'="'.esc_attr( $value ).'"';
			}
			
		}
	}
	
	return $custom_attrs;
}

// form opening
function wpfh_form_open( $args = array() ){
	
	$default = array(
		'id' 	  => '',
		'class'	  => '',
		'action'  => '',
		'method'  => '',
		'enctype' => '',
	);
	
	$getattrs = wp_parse_args( $args, $default );
	
	$attrs = wpfh_html_attr( $getattrs );
	
	echo '<form '.implode(' ', $attrs).'>';	
	
}

// form close
function wpfh_form_close(){
	
	echo '</form>';
	
}
// form submit button
function wpfh_submit_btn( $args = array() ){
	
	$default = array(
		'id' 	 => '',
		'class'	 => '',
		'value'  => ''
	);
	
	$getattrs = wp_parse_args( $args, $default );
	
	$attrs = wpfh_html_attr( $getattrs );
	
	echo '<input type="submit" '.implode( ' ', $attrs ).' />';
	
}
