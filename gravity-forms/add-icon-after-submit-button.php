<?php 

// ADDS A ICON TAG AFTER THE GRAVITY FORMS BUTTON

// Gravity Form ID 2: Make sure you use your form ID.
add_filter("gform_submit_button_2", "form_submit_button_2", 10, 2); 
function form_submit_button_2($button, $form){ 

    return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-newspaper-o'></i> SUBSCRIBE</span></button>"; 

}