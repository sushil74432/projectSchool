<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    if(!$user_id){
      redirect('user/login_view');
    }

    $query = $this->db->get('chapters');
    
 ?>
     


                
                <?php 
                    foreach ($query->result() as $row){
                    echo '<div class="content p-3 chapters">
                              <div class="row lesson my-3">
                                <div class="col-xs-4 col-md-4 col-lg-3">
                                <img src= "'.base_url().'assets/images/hqdefault.jpg" alt="thumbnail" class="img-fluid">
                              </div>
                              <div class="col-xs-8 col-md-8 col-lg-9">
                                <h3><a href="'.base_url().'page/lesson?chapter='.$row->chapter_number.'">'.$row->chapter_name.'</a></h3>
                                <p class="lead">'.$row->chapter_description.'</p>
                                <!--  <p>Duration : '.$row->duration.'</p>-->
                                <p><a class="btn btn-light" role="button" href = "'.base_url().'page/test?chapter='.$row->chapter_number.'">Take Test</a></p>
                                </div>
                              </div>
                          </div>';
                    }
                ?>
            
                

            
<?php include_once("footer.php"); ?>