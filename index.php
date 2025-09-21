<?php include 'fetch_games.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gaming Listing App</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 0; }

        /* Fixed full-width header */
        h1 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 15px 20px;
            background-color: #f2f2f2;
            border-bottom: 1px solid #ccc;
            font-size: 28px;
            z-index: 1000;
        }

        /* Vertical sidebar block (title + filters) */
        .filters-block {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 220px;
            padding: 20px 10px;
            border-right: 1px solid #ccc;
            background: #f9f9f9;
            box-sizing: border-box;
            overflow-y: auto; /* Scroll inside sidebar if too long */
        }

        .filters-block h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .filters-block form {
            display: flex;
            flex-direction: column;
        }

        .filters-block label {
            margin-top: 10px;
            font-weight: bold;
        }

        .filters-block select, 
        .filters-block button {
            margin-top: 5px;
            padding: 5px;
        }

        .game {
            border: 1px solid #ccc;
            padding: 15px;      /* increase padding for bigger block */
            margin: 10px;
            width: 30%;          /* each card takes ~30% of container width */
            box-sizing: border-box;
            float: left;
        }

        .content {
            margin-left: 240px;   /* sidebar width */
            padding-top: 80px;    /* header height */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* space between 3 cards */
     }


        .game img { 
            width: 100%; 
            height: 150px; 
            object-fit: cover; 
        }

        .pagination a { 
            margin: 5px; 
            padding: 8px; 
            border: 1px solid #000; 
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <h1>🎮 Gaming Listing App</h1>
  
    <div class="filters-block">
        <h2>Filters</h2>
        <form method="GET">
            <label>Category:</label>
            <select name="genre">
                <option value="">All</option>
                <option value="RPG" <?php if(isset($_GET['genre']) && $_GET['genre']=='RPG') echo 'selected'; ?>>RPG</option>
                <option value="Sports" <?php if(isset($_GET['genre']) && $_GET['genre']=='Sports') echo 'selected'; ?>>Sports</option>
                <option value="Adventure" <?php if(isset($_GET['genre']) && $_GET['genre']=='Adventure') echo 'selected'; ?>>Adventure</option>
                <option value="Shooter" <?php if(isset($_GET['genre']) && $_GET['genre']=='Shooter') echo 'selected'; ?>>Shooter</option>
            </select>

            <label>Platform:</label>
            <select name="platform">
                <option value="">All</option>
                <option value="PC" <?php if(isset($_GET['platform']) && $_GET['platform']=='PC') echo 'selected'; ?>>PC</option>
                <option value="PlayStation" <?php if(isset($_GET['platform']) && $_GET['platform']=='PlayStation') echo 'selected'; ?>>PlayStation</option>
                <option value="Xbox" <?php if(isset($_GET['platform']) && $_GET['platform']=='Xbox') echo 'selected'; ?>>Xbox</option>
                <option value="Mobile" <?php if(isset($_GET['platform']) && $_GET['platform']=='Mobile') echo 'selected'; ?>>Mobile</option>
            </select>

            <label>Price:</label>
            <select name="price_range">
                <option value="">All</option>
                <option value="free" <?php if(isset($_GET['price_range']) && $_GET['price_range']=='free') echo 'selected'; ?>>Free</option>
                <option value="paid" <?php if(isset($_GET['price_range']) && $_GET['price_range']=='paid') echo 'selected'; ?>>Paid</option>
            </select>

            <label>Sale:</label>
            <select name="sale_status">
                <option value="">All</option>
                <option value="On Sale" <?php if(isset($_GET['sale_status']) && $_GET['sale_status']=='On Sale') echo 'selected'; ?>>On Sale</option>
                <option value="Not on Sale" <?php if(isset($_GET['sale_status']) && $_GET['sale_status']=='Not on Sale') echo 'selected'; ?>>Not on Sale</option>
            </select>

            <button type="submit">Filter</button>
        </form>
    </div>

    <!-- Main content -->
    <div class="content">
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
    </div>
</body>
</html>
