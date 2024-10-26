<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EcoSort Waste Segregation</title>
        <link rel="icon" href="./images/eco-sort-logo.png" type="image/x-icon">
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/styles.css">
        <link rel="stylesheet" href="jquery/jquery-ui.min.css">
        
        <!-- Scripts -->
        <script src="bootstrap/js/bootstrap.min.js" defer></script>
        <script src="public/jquery-3.7.1.min.js" defer></script>
        <script src="jquery/jquery-ui.min.js" defer></script>
        <script src="public/script.js" defer></script>
    </head>
    <body id="game" class="container">
        <header>
            <?php
                include_once("includes/header.php")    
            ?>
        </header>

    <main class="d-flex align-items-center justify-content-center">
        <div id="gameContainer" class="row">
        <?php
            session_start();
            $trashItemsDifficulty = isset($_SESSION['trashItemsDifficulty']) ? $_SESSION['trashItemsDifficulty'] : null;

            if ($trashItemsDifficulty !== null) {
                include_once("game/game_functions.php");
                
                $trashCans = get_trash_cans();
                $trashItemsCount = 6;
                $trashItems = random_trash_item($trashItemsCount, $trashItemsDifficulty);
                unset($_SESSION['trashItemsDifficulty']);

        ?>
            <h2 class="text-center py-3 pt-5 fw-bold text-success">Waste Segregation Game</h2>
            <div id="difficultyContainer" class="fs-2 text-center py-2">
                Difficulty: 
                <span class="d-flex align-items-center justfy-content-center gap-2 fw-bold <?php echo ($trashItemsDifficulty == "easy") ? "text-warning" : "text-danger" ?>">
                    <?php echo strtoupper($trashItemsDifficulty);?>
                    <a id="reload" href="./game.php"><img src="images/retry-logo.png"/></a>
                </span>
            </div>
            <div id="status" class="d-flex align-items-center justify-content-center gap-3 py-2">
                <div>
                    Lives:
                    <span id="lives">
                        <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<img src="images/heart-logo.png" class="heart-logo" alt="Image" />';
                            }
                        ?>
                    </span>
                </div>
                <div>
                    Segregated: 
                    <span id="correctlySegregated">
                        <?php
                            for ($i = 1; $i <= $trashItemsCount; $i++) {
                                echo '<img src="images/check-logo.png" class="correct-logo opacity-3" alt="Image" />';
                            }
                        ?>
                    </span> 
                    <span id="trashItemsCount" class="hidden"><?php echo $trashItemsCount ?></span>
                </div>
            </div>
            <hr>
            <div class="row py-5 position-relative">
                <div class="row d-none d-lg-flex col-lg-12">
                    <h3 class="col-3 text-center text-success fw-bold">Trash Item</h3>
                    <h3 class="col-9 text-center text-danger fw-bold">Trash Cans</h3>
                </div>
                <div class="trash-items col-lg-3 mt-2">
                    <?php generate_trash_items($trashItems); ?>
                </div>
                <div class="row align-items-center justify-content-center col-lg-9 position-relative trash-cans-container p-3">
                    <?php generate_trash_cans($trashCans); ?>
                </div>
                
            </div>
            <hr>
            <div>
                <h3 class="text-center">Drag the <span class="text-success fw-bold">trash item</span> to appropriate <span class="text-danger fw-bold">trash can</span> to segregate.</h3>
            </div>
        <?php
            } else {
                include_once("game/game_difficulty.php");
            }
        ?>

        </div>

    </main>
    
    <?php
        include_once("game/game_over.php");
        include_once("game/congratulations.php");
    ?>
    <footer>
        <?php
            include_once("includes/footer.php");    
        ?>
    </footer>
</body>
</html>
