<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    $is_admin=$this->session->userdata('is_admin');

    if(!$user_id){
      redirect('user/login_view');
    } else if(!$is_admin){
    	echo "<h3><center>YOU DON'T HAVE ACCESS TO THIS PAGE<center></h3>";
    }
?>
    <h2>Add/Edit Users</h2>
<?php 
    $users = $this->add_edit_users_model->get_users();
    //var_dump($users);
    if($users){
	    echo "<table>
	    		<th>User Name</th>
	    		<th>Email</th>
	    		<th>Age</th>
	    		<th>Roll No.</th>
	    		<th>Region</th>
	    		<th>Admin</th>
	    		<th>Action</th>";
	    foreach ($users as $user){
	        echo '<tr>
	        		<td>'.$user->user_name.'</td>
	        		<td>'.$user->user_email.'</td>
	        		<td>'.$user->user_age.'</td>
	        		<td>'.$user->user_roll.'</td>
	        		<td>'.$user->region.'</td>
	        		<td>'.($user->is_admin?"Yes":"No").'</td>
	        		<td><a href= "#" Onclick = edit_user('.$user->region.');>Edit</a></td>
	        	  </tr>';
	    }
	    echo "</table>";
    }
?>
</div>

<script type="text/javascript">
    function edit_user(){
        
    }
</script>

<?php include_once("footer.php"); ?>