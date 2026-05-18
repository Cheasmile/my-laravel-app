<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CHEAT - Coffee Shop HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* បង្ហាញរូបភាព Background ពីកូដដើម Koppee */
        .carousel-inner, .page-header {
            background: linear-gradient(rgba(51, 33, 29, 0.7), rgba(51, 33, 29, 0.7)), url('https://technext.github.io/koppee/img/carousel-1.jpg') center center no-repeat;
            background-size: cover;
        }
        .nav-bar {
            position: relative;
            z-index: 3;
        }
        .text-primary { color: #da9f5b !important; }
        .bg-secondary { background-color: #33211d !important; }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3">
            <a href="/" class="navbar-brand px-lg-4 m-0" style="white-space: nowrap;">
                <h1 class="m-0 display-4 text-uppercase text-white">CHEAT</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="/" class="nav-item nav-link active text-primary">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Service</a>
                    <a href="#" class="nav-item nav-link">Menu</a>
                </div>
                <a href="#" class="btn btn-primary font-weight-bold px-4" style="background-color: #da9f5b; border: none;">Book Table</a>
            </div>
        </nav>
    </div>
    <div class="container-fluid p-0 mb-5">
        <div class="carousel-inner">
            <div class="text-center py-5" style="min-height: 500px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h4 class="text-white text-uppercase mb-3" style="letter-spacing: 3px;">We Have Been Serving</h4>
                <h1 class="display-1 text-white mb-3 text-uppercase font-weight-bold">Coffee</h1>
                <h2 class="text-white style-italic mb-4">* SINCE 1950 *</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary text-white text-center py-4 mt-5">
        <p class="m-0">&copy; 2026 Coffee Shop Project | Developed by Chea</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>