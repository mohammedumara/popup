<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Insert start -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert</h4>
        </div>
        <div class="modal-body">
            USERNAME:  <input type="text" name="username" id="username">
              <br>
            Email  :<input type="text" name="email" id="email">
              <br>
              <br>
              <button type="submit" name="submit" id="submit" >submit</button>
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- Insert End -->

  <div class="modal fade" id="updata" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert</h4>
        </div>
        <div class="modal-body">
            USERNAME:  <input type="text" name="username" id="username_updata">
              <br>
            Email  :<input type="text" name="email" id="email_updata" >
              <br>
              <br>
              <input type="hidden" id="user_id" name="user_id">
              <button type="submit" name="submit" id="submitupdata" >update</button>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

<div class="tableshow">
<table class="table table-bordered">
    <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php
        include 'config.php';
        $sql = "SELECT * FROM user";
        $result = mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($result)){

    ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><button type="button" class="btn btn-info btn-lg data_super" data-toggle="modal" 
      data-id="<?php echo $row['id'];?>" 
      data-username="<?php echo $row['username'];?>" 
      data-email="<?php echo $row['email'];?>"  
      data-target="#updata" id="data_super">Updata</button></td>
        <td><button type='button' class='btn btn-info btn-lg delete_super' data-toggle='modal' 
       data-id="<?php echo $row['id'];?>" 
      data-username="<?php echo $row['username'];?>" 
      data-email="<?php echo $row['email'];?>"  
      data-target='#delete' id='delete_super'>Delete</button></td>
      
    </tr>
    <?php }?>
</table>

</div>

</body>
</html>
<script>
  $(document).ready(function(){
      
  $('#submit').on('click',function(){
      var username = $('#username').val();
      var email = $('#email').val();  
      $.ajax({
              url:"send.php",
              type:"POST",
              data:{username:username,email},
              success:function(data){
                // console.log(data);
                if(data){
                  // console.log("success");
                  $('.tableshow').html(data);
                    var username = $('#username').val('');
                  var email = $('#email').val('');  
                  
                }else{
                  console.log("Failed");
                }
              }
          
      });
  });

   $(document).on('click', '.data_super', function () {
      // alert(3)
      var ids = $(this).data('id');
      var name = $(this).data('username');
      var emailid = $(this).data('email');
     $('#username_updata').val(name);
     $('#email_updata').val(emailid);
     $('#user_id').val(ids);

    });

    $('#submitupdata').on('click',function(){
        var username_updata = $('#username_updata').val();
        var email_updata = $('#email_updata').val();
        var user_id = $('#user_id').val();
        console.log(email_updata);
        $.ajax({
                url:"update.php",
                type:"POST",
                data:{username_updata,email_updata:email_updata,user_id:user_id},
                success:function(data){
                    if(data){
                  $('.tableshow').html(data);
                    }else{
                      console.log('Failed');
                    }
                }
        });

       

    });

     $(document).on('click','.delete_super',function(){
              var id = $(this).data('id');
              $.ajax({
                        url:"delete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                          if(data){
                            $('.tableshow').html(data);
                          }
                        }
              });
              // console.log(id);   
        });

  });
</script>
