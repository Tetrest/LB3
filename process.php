<?php
function processDateRangeInput($db)
{
    $from = $_POST['from'] ?? 2020;
    $to = $_POST['to'] ?? 2022;
    if ($from > $to) {
        echo "<p>Error: 'From' date can't be bigger than 'To' date.</p>";
    } else {
        echo "<p>Selected range: $from - $to</p>";
        $searchLiteratureByYearOfPublishResult = $db->query("SELECT * FROM literature WHERE (literate='Book' OR literate='Journal' OR literate='Newspaper') AND year between " . $from . " and " . $to . ";");
        displayTable($searchLiteratureByYearOfPublishResult);
    }
}
