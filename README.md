# wp-form-helper
wordpress dynamically form and input field implementation system

# How to use 
include wpFormHelper.php in your functions.php and make dynamic form any where .
# form opening function 
wpfh_form_open(
  array(
  		'id' 	 => '',
  		'class'	 => '',
  		'action' => '',
  		'method' => '',
  		'enctype' => ''
  	)
);

# input fields call function 
wpfh_input_fields(
  array(
  		'type' 			=> 'text',
  		'id' 			=> '',
  		'class' 		=> '',
  		'required' 		=> false,
  		'name' 			=> '',
  		'value' 		=> '',
  		'placeholder' 	=> '',
  		'options' 		=> array(
  		  '1' => 'One',
  		  '2' => 'Two',
  		  '3' => 'Three',
  		),
  		'custom_attr'	=> array()
  	)
);

# submit button call function
wpfh_submit_btn(
  array(
  		'id' 	 => '',
  		'class'	 => '',
  		'value'  => ''
  	)
);

# form closing function 
wpfh_form_close()


