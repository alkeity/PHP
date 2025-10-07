<?php
function calendar($month) {
    if ($month < 1 || $month > 12) {
        echo "Invalid month value.";
        return;
    }
    // get month data from timestamp
    $ts = mktime(0, 0, 0, $month, 1, date("Y"));
    $title = date("M Y", $ts);
    $days = date("t", $ts);
    $first_day = date("N", $ts);
    $day_count = 1;
    $today = date("j");

    // create calendar
    echo "
        <div class=\"col-md-12\" style=\"padding:0px;\">
        <table class=\"table table-bordered table-style table-responsive\">
        ";
    echo "<tr><th colspan=\"7\">$title</th></tr>";
    // first week
    echo "<tr>";
    for ($i=1; $i < 8; $i++) { 
        if ($i < $first_day) {
            echo "<td></td>";
        }
        else {
            echo "<td>$day_count</td>";
            $day_count++;
        }
    }
    echo "</tr>";
    // remaining weeks
    while ($day_count <= $days) {
        echo "<tr>";
        for ($i=1; $i < 8; $i++) { 
            if ($day_count <= $days) {
                echo "<td>$day_count</td>";
                $day_count++;
                }
            else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table></div>";

}
?>
<div class="container-form">
    <form action="">
        <label for="monthField">Month:</label>
        <input type="number" name="monthField" id="monthField" min="1" max="12">
        <button type="submit">Create calendar</button>
    </form>
</div>

<?php
    calendar($_GET["monthField"]);
?>