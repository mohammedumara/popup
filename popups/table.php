  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php
        include 'config.php';

        function table($con){
            $sql = "SELECT * FROM user";
            $result = mysqli_query($con,$sql);
            $table= "<table class='table table-bordered'>
<tr>
    <th>Id</th>
    <th>Username</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>


</tr>";
if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){

    if($result){
         $table.="<tr>
    <td>$row[id]</td>
    <td>$row[username]</td>
    <td>$row[email]</td>
   <td><button type='button' class='btn btn-info btn-lg data_super' data-toggle='modal' 
      data-id='$row[id]' 
      data-username='$row[username]' 
      data-email='$row[email]'  
      data-target='#updata' id='data_super'>Updata</button></td>
    <td><button type='button' class='btn btn-info btn-lg delete_super' data-toggle='modal' 
      data-id='$row[id]' 
      data-username='$row[username]' 
      data-email='$row[email]'  
      data-target='#delete' id='delete_super'>Delete</button></td>
</tr>";
    }
  }
}else{

      
      $table.="<tr>
        <td colspan='5'>No Data Avaable</td>
      </tr>";
    
}
  


$table.='</table>';
echo $table;
        }
table($con);
?>


