<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fontawesome 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.bootstrap4.min.css">

    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <!-- App Master -->
    <link href="/assets/css/app.css" rel="stylesheet">

    <title>Buku Induk | SMK Pasundan Rancaekek</title>
</head>

<body>
    <!-- Pre-loader start -->
    <div id="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div class="app">

        <?= $this->include('layout/sidebar'); ?>

        <div class="app-content">
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
                <div class="content">

                    <?= $this->include('layout/navbar'); ?>

                    <?= $this->renderSection('content'); ?>

                    <?= $this->include('layout/footer'); ?>

                </div>
            </main>
        </div>

    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- data-table js -->
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.buttons.min.js"></script>
    <script src="/assets/js/jszip.min.js"></script>
    <script src="/assets/js/vfs_fonts.js"></script>
    <script src="/assets/js/buttons.print.min.js"></script>
    <script src="/assets/js/buttons.html5.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/dataTables.responsive.min.js"></script>
    <script src="/assets/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/js/data-table-custom.js" type="text/javascript"></script>
    <script src="/assets/js/popper.min.js" type="text/javascript"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <script>
        var loader = document.getElementById("theme-loader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        });
    </script>
</body>

</html>