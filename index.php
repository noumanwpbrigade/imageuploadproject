<?php
    include 'connect.php';
    require_once('function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img upload project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1 class="text-center my-5">Registration From</h1>
    <div class="container d-flex justify-content-center">
        <form action="display.php" method="post" enctype="multipart/form-data" class="w-50">
            <!-- inpuFields($name, $type, $placeholder, $value) -->
            <?php   inputFields('name', 'text', 'Username', '');  ?>
            <?php   inputFields('mobile', 'text', 'Mobile', '');  ?>
            <?php   inputFields('file', 'file', '', '');          ?>
            
            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
</body>
</html>