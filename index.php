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
    <body id="home">
        <header>
            <?php
                include_once("includes/header.php")    
            ?>
        </header>

    <main class="container">
        <section id="firstSection" class="p-3 row d-flex align-items-center justify-content-center">
            <div class="row d-flex align-items-center justify-content-center content">
                <div class="p-2 col-sm-12 col-lg-6">
                    <h1 class="mb-5 fw-bold d-flex align-items-center justify-content-center gap-3 text-success" >
                        <img src="images/earth-logo.png" alt="earth" width=80>
                        <span>Waste Segregation: Keeping Our Planet Clean!</span>
                    </h1>
                    <h3 style="color: rgb(230, 75, 61)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you ever thought about where your trash goes after you throw it away? If we just toss all our waste together, it makes it harder to manage and causes pollution! <span class="fw-bold text-success">Waste segregation</span> means sorting waste so that we can handle it better and protect our environment. Let's learn how to sort waste into three simple groups:</h3>
                </div>
                <div class="p-2 col-6 d-none d-sm-none d-lg-flex align-items-center justify-content-center">
                    <img src="images/picking-up-trash.png" alt="image" />
                </div>
                <button class="arrow-down-logo d-none d-sm-none d-lg-block" >
                    <a href="#secondSection">
                        <img src="images/arrow-down-logo.png" alt="image" />
                    </a>
                </button>
            </div>
        </section>
        <section id="secondSection" class="p-3 row d-flex align-items-center justify-content-center">
            <?php
                include_once("game/game_functions.php");
                $recyclableItems = random_recyclable_items();
                $biodegradableItems = random_biodegradable_items();
                $nonRecyclableItems = random_non_recyclable_items();
            ?>
            <div class="row d-flex align-items-center justify-content-center content">
                <h1 class="text-center text-success">Waste Categories</h1>
                <hr class="text-danger">
                <div class="row">
                    <div class="category col-12 col-lg-4">
                        <img src="images/recyclable.png" class="img-fluid"/>
                        <p class="description px-5 mb-0">&nbsp;&nbsp;&nbsp;These are items that can be reused or turned into something new.</p>
                        <hr class="text-danger">
                        <?php 
                            generate_item_divs($recyclableItems);
                        ?>
                    </div>
                    <div class="category col-12 col-lg-4">
                        <img src="images/biodegradable.png" class="img-fluid"/>
                        <p class="description px-5 mb-0">&nbsp;&nbsp;&nbsp;These are natural things that can break down into the soil over time.</p>
                        <hr class="text-danger">
                        <?php 
                            generate_item_divs($biodegradableItems);
                            ?>
                    </div>
                    <div class="category col-12 col-lg-4">
                        <img src="images/non-recyclable.png" class="img-fluid"/>
                        <p class="description px-5 mb-0">&nbsp;&nbsp;&nbsp;These are the items that can’t be recycled and won’t break down easily.</p>
                        <hr class="text-danger">
                        <?php 
                            generate_item_divs($nonRecyclableItems);
                        ?>
                    </div>
                </div>
            </div>
            <a href="#aboveThirdSection" class="d-none d-lg-flex justify-content-center">
                <img src="images/arrow-down-logo.png" alt="image" style="width: 150px" id="aboveThirdSection"/>
            </a>
        </section>
        <section id="thirdSection" class="p-3 row d-flex align-items-center justify-content-center">
            <div class="row d-flex align-items-center justify-content-center content">
                <h1 class="col-12 text-center text-success">Why segregate waste?</h1>
                <div class="col-12 col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                    <img src="images/eco-sort-logo.png" class="img-fluid" alt="image"/>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-start justify-content-center gap-3" style="flex-direction: column">
                    <h4 style="color: rgb(230, 75, 61)" class="fs-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When we separate waste, it’s easier to recycle and reuse items. It also keeps nature clean, helps animals stay safe, and makes sure our earth stays beautiful.</h4> 
                    <p class="text-success fw-bold text-start fs-4">Tips to remember:</p>
                    <ul style="color: rgb(230, 75, 61)" class="fs-4">
                        <li>- Look for the recycling symbol on items before throwing them away!</li>
                        <li>- Always put food scraps in the compost if you can.</li>
                        <li>- Avoid using plastic bags. Try cloth bags instead!</li>
                    </ul>
                </div>
                <hr class="text-success">
                <div class="fs-4 text-center" style="color: rgb(230, 75, 61)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By learning about waste segregation, you’re helping to make the world a better place.</div>
            </div>
            <hr class="text-success" style="height: 3px; background-color: rgb(230, 75, 61); opacity: 1; border: none;">
        </section>
        <section id="fourthSection" class="p-3 row d-flex align-items-center justify-content-center">
            <div class="row d-flex align-items-center justify-content-center content">
                <div class="col-12 d-flex align-items-center justify-content-center gap-3" style="flex-direction: column">
                    <h2 class="text-success">Waste Segregation Game</h2>
                    <img src="images/waste-segregation-game.png" alt="image" class="img-fluid" style="border-radius: 20px; max-height: 500px;">
                    <a href="./game.php" class="btn btn-success px-3 d-flex align-items-center justify-content-center gap-2" style="border-radius: 20px;">
                        <img src="images/play-logo.png" alt="play" width=45 />
                        <span class="play-label fs-4">Play Now</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <?php
            include_once("includes/footer.php");    
        ?>
    </footer>
</body>
</html>
