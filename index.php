<?php include 'fetch_games.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gaming Listing App</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .game { border: 1px solid #ccc; padding: 10px; margin: 10px; width: 250px; float: left; }
        .game img { width: 100%; height: 150px; object-fit: cover; }
        .filters { margin-bottom: 20px; }
        .pagination a { margin: 5px; padding: 8px; border: 1px solid #000; text-decoration: none; }
    </style>
</head>
<body>
    <h1>🎮 Gaming Listing App</h1>

    <div class="filters">
        <form method="GET">
            <label>Category:</label>
            <select name="genre">
                <option value="">All</option>
                <option value="RPG">RPG</option>
                <option value="Sports">Sports</option>
                <option value="Adventure">Adventure</option>
                <option value="Shooter">Shooter</option>
            </select>

            <label>Platform:</label>
            <select name="platform">
                <option value="">All</option>
                <option value="PC">PC</option>
                <option value="PlayStation">PlayStation</option>
                <option value="Xbox">Xbox</option>
                <option value="Mobile">Mobile</option>
            </select>

            <label>Price:</label>
            <select name="price_range">
                <option value="">All</option>
                <option value="free">Free</option>
                <option value="paid">Paid</option>
            </select>

            <label>Sale:</label>
            <select name="sale_status">
                <option value="">All</option>
                <option value="On Sale">On Sale</option>
                <option value="Not on Sale">Not on Sale</option>
            </select>

            <button type="submit">Filter</button>
        </form>
    </div>

    <div style="clear: both;"></div>

    <?php if($games && $games->num_rows > 0): ?>
        <?php while($row = $games->fetch_assoc()): ?>
            <div class="game">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>">
                <h3><?php echo $row['title']; ?></h3>
                <p><b>Genre:</b> <?php echo $row['genre']; ?></p>
                <p><b>Platform:</b> <?php echo $row['platform']; ?></p>
                <p><b>Price:</b> <?php echo ($row['price'] == 0) ? "Free" : "$".$row['price']; ?></p>
                <p><b>Status:</b> <?php echo $row['sale_status']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>

    <div style="clear: both;"></div>

    <div class="pagination">
        <?php for($i=1; $i<=$total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
