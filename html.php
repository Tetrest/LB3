<?php
function displayPublisherDropdown($options)
{
    $options = array_unique(array_column($options, 'publisher'));
    echo '<form action="index.php" method="post">
    <label for="publisher">Choose a publisher:</label>
    <select name="publisher" id="publisher">';
    foreach ($options as $publisher) {
        echo '<option value="' . $publisher . '">' . $publisher . '</option>';
    }
    echo '</select>
    <input type="submit" value="Submit">
    </form>';
}

function displayDatepickersForTimeRange()
{
    echo '<form method="post" action="index.php">';
    echo '  <label for="from">From Year:</label>';
    echo '  <input type="number" step="1" value="2020" id="from" name="from" min="0" max="' . date("Y") . '" required>';
    echo '  <br><br>';
    echo '  <label for="to">To Year:</label>';
    echo '  <input type="number" step="1" value="2022" id="to" name="to" min="0" max="' . date("Y") . '" required>';
    echo '  <br><br>';
    echo '  <input type="submit" name="submitDate" value="Submit">';
    echo '</form>';
}

function displayAuthorDropdown($options)
{
    echo '<form action="index.php" method="post">
    <label for="author">Choose a author:</label>
    <select name="author" id="author">';
    foreach ($options as $author) {
        echo '<option value="' . $author['Id'] . '">' . $author['NAME'] . '</option>';
    }
    echo '</select>
    <input type="submit" value="Submit">
    </form>';
}
