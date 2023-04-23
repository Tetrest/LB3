<?php
function displayTable($data)
{
    echo "<table border='1' >";
    echo "<tr>";
    foreach (array_keys($data[0]) as $column) {
        echo "<th>" . ucfirst($column) . "</th>";
    }
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
