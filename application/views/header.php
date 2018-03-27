<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=<?php echo base_url()."/assets/css/bootstrap.css"; ?>>
    <link rel="stylesheet" href=<?php echo base_url()."/assets/css/styles.css"; ?>>

    <title>Lesson</title>
  </head>


    <body>
        <div class="container">

            <header class="my-3">
                <div class="row">
                    <div class="col-sm-12 col-md-4 center-logo text-md-left">
                        <img src=<?php echo base_url()."assets/images/cdc_logo.png"?> alt="CDC Logo" height="90px">
                    </div>

                    <div class="col-sm-12 col-md-4 text-center">
                        <h1 class="mt-2">Website</h1>
                    </div>

                    <div class="col-sm-12 col-md-4"></div>
                </div>
            </header>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href=<?php echo base_url()."page"?>>Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()."page/lessons"?>>Lessons</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()."page/test?chapter=0"?>>Test</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Marks</a>
                    </li> -->
                </ul>
            </nav>