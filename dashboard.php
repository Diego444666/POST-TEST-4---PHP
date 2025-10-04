<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RecomL</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <header class="hero-section">
        <div class="video-background">
            <video autoplay loop muted playsinline>
                <source src="videoiris.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <nav role="navigation">
            <div class="container nav-container">
                <a href="#" class="logo">RecomL</a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><span class="welcome-user">Halo, <?php echo $username; ?>!</span></li>
                    <li><a href="logout.php" class="btn-logout">Logout</a></li>
                    <li><button id="darkModeToggle" class="btn-toggle">🌙</button></li>
                </ul>
            </div>
        </nav>
        <div class="hero-content">
            <h1>Temukan Lagu Sempurna untuk Mood Anda</h1>
            <p>Gabungkan genre favorit dan suasana hati Anda untuk rekomendasi lagu yang personal.</p>
            <a href="#mulai-sekarang" class="btn btn-primary">Mulai Sekarang</a>
        </div>
    </header>

    <main>
        <section id="mulai-sekarang" class="recommendation-form-section">
            <div class="container">
                <h2>Mulai Rekomendasi Anda</h2>
                <p>Pilih kombinasi genre dan mood di bawah ini, dan temukan lagu yang pas untuk Anda.</p>
                <form id="recommendationForm" class="recommendation-form">
                    <div class="form-group">
                        <label>Pilih Genre:</label>
                        <div class="choice-grid">
                            <label class="choice-card"><input type="radio" name="genre" value="pop"><span>Pop</span></label>
                            <label class="choice-card"><input type="radio" name="genre" value="rock"><span>Rock</span></label>
                            <label class="choice-card"><input type="radio" name="genre" value="jazz"><span>Jazz</span></label>
                            <label class="choice-card"><input type="radio" name="genre" value="edm"><span>EDM</span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Mood:</label>
                        <div class="choice-grid">
                            <label class="choice-card"><input type="radio" name="mood" value="happy"><span>Bahagia</span></label>
                            <label class="choice-card"><input type="radio" name="mood" value="sad"><span>Sedih</span></label>
                            <label class="choice-card"><input type="radio" name="mood" value="energetic"><span>Bersemangat</span></label>
                            <label class="choice-card"><input type="radio" name="mood" value="calm"><span>Tenang</span></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari Lagu</button>
                </form>
                <div id="resultsContainer"></div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> RecomL.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>