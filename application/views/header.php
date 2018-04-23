<?php 
$this->load->helper('url'); 
$user_name=$this->session->userdata('user_name');
$is_admin=$this->session->userdata('is_admin');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=<?php echo base_url()."/assets/css/bootstrap.css"; ?>>
    <link rel="stylesheet" href=<?php echo base_url()."/assets/css/styles.css"; ?>>
    <link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/jquery.toast.min.css"?>>
    <!-- <link rel="stylesheet" href=<?php echo base_url()."/assets/css/font-preeti.css"; ?>> -->
    <script src=<?php echo base_url()."assets/js/jquery.min.js"?>></script>

    <title>Lesson</title>
  </head>


    <body>
        <div class="container">

            <header class="py-3 header-content">
                        <img class="px-3" src=<?php echo base_url()."assets/images/logo.png"?> alt="CDC Logo" height="90px">
            </header>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()."page"?>>गृह पृष्ठ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()."page/lessons"?>>पाठहरु </a>
                    </li>
                    <?php if ($is_admin){                        
                    echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                एड्मिनिस्टे्टर
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="'.base_url().'page/ae_users">Edit Users</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="'.base_url().'page/add_questions">Add Questions</a>
                                <a class="dropdown-item" href="'.base_url().'page/ae_questions?chapter=1">Edit Questions</a>
                            </div>
                        </li>';
                    } ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href=<?php echo base_url()."page/test?chapter=0"?>>Test</a>
                    </li> -->
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item justify-content-end">
                        <a class="nav-link" href=<?php echo base_url()."user/user_logout"?>>लगआउट- <?php echo $user_name ?></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Marks</a>
                    </li> -->
                </ul>
            </nav>