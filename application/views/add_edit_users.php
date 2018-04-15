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
	        echo '<tr id = "tr-'.$user->user_id.'">
	        		<td id = "td-'.$user->user_id.'-1">'.$user->user_name.'</td>
	        		<td id = "td-'.$user->user_id.'-2">'.$user->user_email.'</td>
	        		<td id = "td-'.$user->user_id.'-3">'.$user->user_age.'</td>
	        		<td id = "td-'.$user->user_id.'-4">'.$user->user_roll.'</td>
	        		<td id = "td-'.$user->user_id.'-5">'.$user->region.'</td>
	        		<td id = "td-'.$user->user_id.'-6">'.($user->is_admin?"Yes":"No").'</td>
	        		<td id = "td-'.$user->user_id.'-7">
	        			<a href= "#" Onclick = "edit_user(\''.$user->user_id.'\',\''.$user->user_name.'\',\''.$user->user_email.'\',\''.$user->user_age.'\',\''.$user->user_roll.'\',\''.$user->region.'\',\''.$user->is_admin.'\')">Edit</a>
	        			<a href= "#" Onclick = delete_user('.$user->user_name.',"'.$user->user_id.'","'.$user->user_email.'","'.$user->user_age.'","'.$user->user_roll.'","'.$user->region.'","'.$user->is_admin.'")>Delete</a>
	        		</td>
	        	  </tr>';
	    }
	    echo "</table>";
    }
?>
</div>

<script type="text/javascript">
	function edit_user(user_id, user_name, user_email, user_age, user_roll, region, is_admin){
		var tr_id = "#tr-"+user_id;
		var current_tr_html = $(tr_id).html();
		//var new_tr_html = '<td id = "td-'+user_id+'-1"><input name = "input'+user_id+'-1" value="'+user_id+'">'+user_name+'</td><td id = "td-'+user_id+'-2">'+user_email+'</td><td id = "td-'+user_id+'-3">'+user_age+'</td><td id = "td-'+user_id+'-4">'+user_roll+'</td><td id = "td-'+user_id+'-5">'+region+'</td><td id = "td-'+user_id+'-6">'+(is_admin?"Yes":"No")+'</td>';

		var new_tr_html = '<td id = "td-'+user_id+'-1" style="display:none"><input type="hidden" name="input-'+user_id+'-1" value ="'+user_id+'"></td><td id = "td-'+user_id+'-2"><input type="text" name="input-'+user_id+'-2" value ="'+user_name+'"></td><td id = "td-'+user_id+'-3"><input type="text" name="input-'+user_id+'-3" value ="'+user_email+'"></td><td id = "td-'+user_id+'-3"><input type="text" name="input-'+user_id+'-3" value ="'+user_age+'"></td><td id = "td-'+user_id+'-4"><input type="text" name="input-'+user_id+'-4" value ="'+user_roll+'"></td><td id = "td-'+user_id+'-5"><input type="text" name="input-'+user_id+'-5" value ="'+region+'"></td><td id = "td-'+user_id+'-6"><input type="text" name="input-'+user_id+'-6" value ="'+is_admin+'"></td><td id = "td-'+user_id+'-7"><a href="#" onclick="update_user('+user_id+')">Update</a></td>';
		
		$(tr_id).html(new_tr_html);
		
		//console.log(current_tr_html);
	}

    function update_user(user_id){
    	var update_value_keys = ["user_id", "user_name", "user_email", "user_age", "user_roll", "region", "is_admin"];
    	var updated_values = {};
    	var count = 0;
    	$('#tr-'+user_id+'>td').closest('tr').find("input").each(function() {
    		updated_values[update_value_keys[count]]=this.value;
    		count++;
    		//console.log(count);
    	});
		// Ajax post
		$(document).ready(function() {
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "ajax/ajax_ae_user",
			dataType: 'json',
			data: updated_values,
			success: function(res) {
				if (res)
				{
					$.toast({
						text: "Updated Successfully",
						bgColor : 'green'
					});
					//alert("Hurrayy");
				} else {
					//alert("oh nooo");
				}
			}
			});
		});
	}
	function delete_user(){

	}
</script>

<?php include_once("footer.php"); ?>


 
<!-- <td id = "td-'+user_id+'-1" style="display:none"><input type="hidden" name="input-'+user_id+'-1" value ="'+user_id+'"></td>
<td id = "td-'+user_id+'-2"><input type="text" name="input-'+user_id+'-2" value ="'+user_name+'"></td>
<td id = "td-'+user_id+'-3"><input type="text" name="input-'+user_id+'-3" value ="'+user_email+'"></td>
<td id = "td-'+user_id+'-3"><input type="text" name="input-'+user_id+'-3" value ="'+user_age+'"></td>
<td id = "td-'+user_id+'-4"><input type="text" name="input-'+user_id+'-4" value ="'+user_roll+'"></td>
<td id = "td-'+user_id+'-5"><input type="text" name="input-'+user_id+'-5" value ="'+region+'"></td>
<td id = "td-'+user_id+'-6"><input type="text" name="input-'+user_id+'-6" value ="'+is_admin+'"></td>
<td id = "td-'+user_id+'-7"><a href="#" onclick="update_user('+user_id+')">Update</a></td> -->