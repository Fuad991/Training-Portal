<?php
function company($pic,$name,$training_field,$id){
  $element="
  
  <div class=\"u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-1\">
  <div class=\"u-container-layout u-similar-container u-container-layout-1\">
    <div class=\"u-border-6 u-border-white\"> <img class=\"u-image-1 u-image u-image-circle\" src=\"$pic\"> </div>
    <h5 class=\"u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-3\">$name</h5>
    <p class=\"u-text u-text-4\">$training_field</p>
    <a class=\"u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6\" name=\"apply\" onclick=\"document.getElementById('ticketModal').style.display='block'\">Apply</a>
    <input type=\"hidden\" name=\"company_name\" value=\"$name\" >
    <input type=\"hidden\" name=\"id\" value=\"$id\" >
  </div>
</div>
  ";
  echo $element;
}
