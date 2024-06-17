<?php
$insert = false;
$truncate = false;
$update = false;
$delete = false;

$server = "localhost";
$username = "root";
$password = "";
$dbname = "curd";

$con = mysqli_connect($server, $username, $password, $dbname);
if (!$con) {
    die("Your Connection failed Due to : " . mysqli_connect_error());
}
if(isset($_GET['del'])){
  $id = $_GET['del'];
  $delete = true;
  if($id){
    $sql = "DELETE FROM `curd` WHERE `curd` .`id` = $id";
  }
  $result = $con->query($sql);
  if($result){
    $delete = true;
  }
  else {
    die("Error:". $con->error);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['editid'])){
    $id = $_POST['editid'];
    $title = $_POST['edittitle'];
    $description = $_POST['editdescription'];

    if($id && $title && $description){
      $sql = "UPDATE curd SET title = '$title' , description = '$description' WHERE id = $id";
      
    }
    if($con->query($sql)===true){
      $update = true;
    }
  }
  else{

   if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    if($title && $description){
      $sql = "INSERT INTO curd(title,description) VALUES('$title','$description')";
    }
    if($con->query($sql)===true){
      $insert = true;
    }
    else{
      echo "error:" . $con->error;
    }
   }
   elseif(isset($_POST['truncate'])){
    $sql = "TRUNCATE TABLE curd";
    if($con->query($sql)===true){
      $truncate = true;
    }
    else{
      echo "Error:" . $con->error;
    }
  }

  }
}


?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <title>Bootstrap demo</title>


  </head>
  <body>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodal">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="col-md-12">
                <form method="post" action="curd.php">
                  <input type="hidden" name="editid" id = 'editid'>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="edittitle" name="edittitle" aria-describedby="title" placeholder="Enter Title here" >
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea type="text" class="form-control" id="editdescription" rows="5" name="editdescription" placeholder="Enter Your Other Stuff here" ></textarea>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name='submit' class="btn btn-dark">Save changes</button>
                    </div>
                  </form>

                  </div>
                  </div>
                   
            </div>
      </div>
    </div>
  </div>
</div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="curd.php">PHP-CURD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="curd.php">Home</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <?php
      
      if($insert){
        echo "<div class='alert alert-primary' role='alert'>
        Data Inserted Succesfully
      </div>";
      }
      
      ?>

<?php
      
      if($truncate){
        echo "<div class='alert alert-danger' role='alert'>
        Truncate Succesfull
      </div>";
      }
      
      ?>

<?php
      
      if($update){
        echo "<div class='alert alert-warning' role='alert'>
        Note Succesfully Updated
      </div>";
      }
      
      ?>

<?php
      
      if($delete){
        echo "<div class='alert alert-danger' role='alert'>
        Note Deleted Succesfully 
      </div>";
      }
      
      ?>
      
      <div class="container w-50 m-auto my-5">
        <h1>Add Note!</h1>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="curd.php">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter Title here" >
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea type="text" class="form-control" id="description" rows="5" name="description" placeholder="Enter Your Other Stuff here" ></textarea>
                    </div>
                   <div class="row justify-content-center ">
                    <div class="col-md-4 "> <button type="submit" name='submit' class="btn btn-dark w-50">Submit</button></div>
                    <div class="col-md-4">  <button  class= "btn btn-dark w-50" id='truncate' name='truncate'>Clear All Notes</button></div>
                  </form>

                  </div>
                  </div>
                   
            </div>
            <div class="row">
                  
        </div>



        <div class="row my-5">
            <div class="col-md-12">
              <table class="table" id="myTable">
                <thead>
                  
                  <tr>
                       
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id = 0;
                   $sql = "SELECT * FROM curd";
                   $result = $con->query($sql);
                    while($rows =  mysqli_fetch_assoc($result)){
                      $id = $id + 1;
                   echo  "  <tr>
                        <th scope='row'>". $id ."</th>
                        <td>". $rows['title'] . "</td>
                        <td>". $rows['description'] ."</td>
                        <td> <button class='btn btn-sm btn-dark edit' id=". $rows['id'] .">Edit</button>  
                        <button class='btn btn-sm btn-dark delete' id= d" . $rows['id'] .">Delete</button></td>
                      </tr>";
                    }
                   
                      ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>
   $(document).ready(function() {
        $('#myTable').DataTable();
    });

  
    const edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach(element => {
      element.addEventListener("click",(e)=>{
        console.log('Edit Clicked', e)
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        description = tr.getElementsByTagName('td')[1].innerText;
        edittitle.value = title;
        editdescription.value = description;
        editid.value = e.target.id;
        console.log(e.target.id) 
        $('#editmodal').modal('toggle');
       
      })
    });


    const del = document.getElementsByClassName('delete');
    Array.from(del).forEach(element =>{
      element.addEventListener("click",(e)=>{
        console.log("hello i am delete");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        description = tr.getElementsByTagName('td')[1].innerText;
       id = e.target.id.substr(1);
       console.log(id);

      const confirmed = confirm("are You sure You want to Delete This Note..!");

       if(confirmed){
        window.location = `/PHP Projects/CURD/curd.php?del=${id}`;
        alert("Note Deleted");
       }
       else{
        alert("Note Not Deleted");
       }
      })
    })
   
</script>
</html>