<?php
include 'db.php';

// Pagination settings
$limit = 12; 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Filters
$where = [];
if (!empty($_GET['genre'])) {
    $genre = $conn->real_escape_string($_GET['genre']);
    $where[] = "genre = '$genre'";
}
if (!empty($_GET['platform'])) {
    $platform = $conn->real_escape_string($_GET['platform']);
    $where[] = "platform = '$platform'";
}
if (!empty($_GET['price_range'])) {
    $price = $_GET['price_range'];
    if ($price == "free") $where[] = "price = 0";
    elseif ($price == "paid") $where[] = "price > 0";
}
if (!empty($_GET['sale_status'])) {
    $sale = $conn->real_escape_string($_GET['sale_status']);
    $where[] = "sale_status = '$sale'";
}

$where_sql = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";

// Count total records
$result = $conn->query("SELECT COUNT(*) AS total FROM games $where_sql");
$row = $result->fetch_assoc();
$total_records = $row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch games
$sql = "SELECT * FROM games $where_sql LIMIT $start, $limit";
$games = $conn->query($sql);
?>
