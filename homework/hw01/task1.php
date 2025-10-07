<?php 
function createField($field_name) {
    $placeholder = ucfirst($field_name);
    return "<div class=\"form-outline mb-4\">
    <label for=\"$field_name\" class=\"form-label\">$placeholder:</label>
    <input type=\"number\" name=\"$field_name\" id=\"$field_name\" class=\"form-control\" max=\"255\" min=\"0\" required>
    </div>";
}
?>

<div class="container-form">
<form action="">
    <?php
    echo createField("red");
    echo createField("green");
    echo createField("blue");
    ?>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<div>
    <?php
    $red = $_GET['red'];
    $green = $_GET['green'];
    $blue = $_GET['blue'];
    $color = "rgb($red, $green, $blue)";
    echo "<span style=\"background-color:$color \">Example text!</span>";
    ?>
</div>
</div>