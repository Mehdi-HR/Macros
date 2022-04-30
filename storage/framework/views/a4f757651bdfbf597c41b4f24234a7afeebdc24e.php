<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Macros</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>" class="href">

       	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>        

    </head>
    <body class="antialiased">
        <div class="container">
            <div class="jumbotron header">  
                <div class="row">

                    <div class="float-left col-md-3">      
                        <img src="<?php echo e(asset('img/macros.png')); ?>" alt="" class="src">
                    </div>  
                    <div class="float-right col-md-9">      
                        <h1 class="display-1">Macros</h1>
                        <p class="lead">Calculer ses <strong>macros</strong> plus <u>facilement</u> et de mani&egravere plus <u> efficace. </u> </p>
                    </div>        
                </div>
            </div>

        <br>
        <nav class="navbar  navbar-expand-md navbar-light bg-light sticky-top"> 
            <a href="/" class="navbar-brand ">
                <span class="fw-bold text-secondary">Macros</span> 
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label = "Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo e(route('ingredients.index')); ?>" class="nav-link btn btn-outline-secondary"> 
                                Ingredients
                             </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('recettes.index')); ?>" class="nav-link btn btn-outline-secondary"> 
                                Recettes
                             </a>
                    </li>
                </ul>
            </div>
        </nav>
    	<?php echo $__env->yieldContent('content'); ?>

    	</div>
        <br>
        <footer class="bg-light text-center text-lg-start fixed-bottom">
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-dark" href="#">Macros.ma</a>
          </div>
          <!-- Copyright -->
        </footer> 
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/layouts/layout.blade.php ENDPATH**/ ?>