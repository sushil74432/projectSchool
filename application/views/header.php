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

            <header class="py-3 header-content">
                        <img class="px-3" src=<?php echo base_url()."assets/images/logo.png"?> alt="CDC Logo" height="90px">
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