<?php

$values = ;

$text = "choose a brouwcode:
    <select name='brouwcode'>
        <option value='678'>EX-MORRELS</option>
        <option value='2'>option 2</option>";
        
foreach ($values as $value) {
    $text .= "<option value='" . $value['value'] . "'>" . $value['naam'] . "</option>";
}

$text .= "</select>";
echo $text;

?>