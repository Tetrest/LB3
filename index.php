<?php
require_once 'database-interface.php';
require_once 'handle-html.php';
require_once 'handle-table.php';
require_once 'process.php';
$db = new Database();

$publisherRequestResult = $db->query("SELECT publisher FROM literature where LITERATE='Book'");
displayPublisherDropdown($publisherRequestResult);
$publisher = $_POST['publisher'] ?? 'Генеза';
$searchBooksByPublisherResult = $db->query("SELECT * FROM literature WHERE literate='Book' AND publisher=?", array($publisher));
echo "<p>Selected publisher: $publisher </p>";
displayTable($searchBooksByPublisherResult);
echo '<br><br><br>';

displayDatepickersForTimeRange();
processDateRangeInput($db);
echo '<br><br><br>';

$authorsRequestResult = $db->query("SELECT DISTINCT author.Id as Id, author.NAME as NAME FROM author INNER JOIN book_authrs ON Id=book_authrs.FID_AUTH INNER JOIN literature ON book_authrs.FID_BOOK=literature.Id AND LITERATE='Book';");
displayAuthorDropdown($authorsRequestResult);
$author = $_POST['author'] ?? 1;
echo "<p>Selected author id: $author </p>";
$searchBooksByAuthorResult = $db->query("SELECT * FROM author INNER JOIN book_authrs ON author.Id=book_authrs.FID_AUTH AND author.Id=" . $author . " INNER JOIN literature ON book_authrs.FID_BOOK=literature.Id ;");
displayTable($searchBooksByAuthorResult);
