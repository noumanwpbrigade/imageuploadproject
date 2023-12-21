<!-- form resubmission problem -->
<!-- To prevent this, you can use the Post/Redirect/Get (PRG) pattern -->

<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile']; 
        $image = $_FILES['file'];
        $imagefilename = $image['name'];
        $imagetmp_name = $image['tmp_name'];
        // print_r($image);

        $imagefile_separate = explode('.', $imagefilename);
        // $file_extension = strtolower($imagefile_separate[1]); 
        $file_extension = strtolower(end($imagefile_separate));
        // print_r($file_extension);
        $extensions = array('jpeg', 'jpg', 'png');
        if(in_array($file_extension, $extensions)){
            $upload_image = 'image/'.$imagefilename;
            move_uploaded_file($imagetmp_name, $upload_image);

            $sql = "INSERT INTO `form`(`name`, `mobile`, `image`) VALUES ('$name', '$mobile', '$upload_image')";
            $result = mysqli_query($con, $sql);

            if($result){
                echo '<div class="alert alert-success" role="alert">
                        Data inserted successfully.
                      </div>';
                
                // Redirect to prevent form resubmission
                header("Location: display.php");
                exit();
                // The exit() function is then called to ensure that no further code on the current page is executed

            }else {
                die(mysqli_error($con));
            }

        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            width: 100px;
        }
    </style>
</head>
<body>
    <h1 class="text-center my-4">User Data</h1>
    <div class="container d-flex justify-content-center">

    <table class="table table-bordered w-50">
        <thead class="thead-dark  table-dark">
            <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `form`";
        $result = mysqli_query($con, $sql);
        while($row= mysqli_fetch_assoc($result)){
            $id =$row['id'];
            $name =$row['name'];
            $image =$row['image'];
            echo "<tr>
                    <th scope=\"row\">$id</th>
                    <td>$name</td>
                    <td> <img src='$image'> </td>
                  </tr>";
        }


        ?>
            
        </tbody>
    </table>

    </div>
    
</body>
</html>