<?php

function inputFields($name, $type, $placeholder, $value){
    $element = "
        <div class=\"form-group my-3\">
            <input type='$type' name='$name' placeholder='$placeholder' value='$value' class=\"form-control\">
        </div> ";
    echo $element;
}

?>