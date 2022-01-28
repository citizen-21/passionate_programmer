<?php 

session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.html");
}
if (!isset($_SESSION['name'])) {
    header("Location: index.html");
  }

?>

<?php
    $database_name = "paperhouse";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                    'item_size' => $_POST["size"],
                    'item_type' => $_POST["type"],
                    'item_variation' => $_POST["variation"],
                    'item_file' => $_POST["filename"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                    'item_size' => $_POST["size"],
                    'item_type' => $_POST["type"],
                    'item_variation' => $_POST["variation"],
                    'item_file' => $_POST["filename"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #1ABC9C;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #1ABC9C;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>

<div class="container" style="width: 80%">
        <h2>Services Cart <a href="./userdashboard.php" ><span style="font-size: 20px; margin-left: 73rem; background-color: #1ABC9C;" class="btn btn-success"><?php echo "<span> " . $_SESSION['name'] . "</span>"; ?>'s Dashboard</span></a></h2>
        <?php
            $query = "SELECT * FROM services ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="" name="myForm" id="myForm" enctype="multipart/form-data">
                        <?php 
                        if($row["pname"] == "Printout")
                        { ?>
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">₹ <?php echo $row["price"]; ?></h5>
                                <select name="type" required class="input form-control" >
                                    <option style="color: black;" value="" >Type of Print</option>
                                    <option style="color: black;" value="One Side">One Side</option>
                                    <option style="color: black;" value="Back to Back">Back to Back</option>
                                </select><br>
                                <select name="variation" class="input form-control" required>
                                    <option style="color: black;" value="">Select variations</option>
                                    <option style="color: black;" value="Black & White">Black & White</option>
                                    <option style="color: black;" value="Color">Color</option>
                                </select><br>
                                <select name="size" class="input form-control" required>
                                    <option style="color: black;" value="">Select size</option>
                                    <option style="color: black;" value="A3">A3</option>
                                    <option style="color: black;" value="A4">A4</option>
                                    <option style="color: black;" value="A5">A5</option>
                                    <option style="color: black;" value="A6">A6</option>
                                </select><br>
                                <input type="file" name="file" id="files" placeholder="Select your file" class="input form-control" onChange="chkFile(this)" required/><br>
                                <input type="hidden" name="filename" id="filename" >
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" formaction="Cart.php?action=add&id=<?php echo $row["id"]; ?>" name="add" style="margin-top: 5px; background-color: #1ABC9C;" class="btn btn-success" value="Add to Cart">
                            </div>
                            </form>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>  
                                    function chkFile(file1) {
                                        var file = file1.files[0];
                                        var formData = new FormData( $("#myForm")[0] );
                                        formData.append('formData', file);

                                        $.ajax({
                                        type: "POST",
                                        url: "upload.php",    
                                        contentType: false,
                                        processData: false,
                                        data: formData,
                                        success: function (data) {
                                        var mystr = $('#files').val().substr(12);
                                        $('#filename').val(mystr);
                                        }
                                    });
                                    }
                                </script>
                        <?php
                        } ?>
                        <?php 
                        if($row["pname"] == "Lamination")
                        { ?>
                        <form method="post" action="" name="myForm2" id="myForm2" enctype="multipart/form-data">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">₹ <?php echo $row["price"]; ?></h5>
                                <select name="size" placeholder="Select Size" class="input form-control"  required>
                                    <option style="color: black;" value="">Select size</option>
                                    <option style="color: black;" value="A3">A3</option>
                                    <option style="color: black;" value="A4">A4</option>
                                    <option style="color: black;" value="A5">A5</option>
                                    <option style="color: black;" value="A6">A6</option>
                                </select><br>
                                <input type="file" name="file" id="files2" placeholder="Select your file" class="input form-control" onChange="chkFile2(this)" required/><br>
                                <input type="hidden" name="filename" id="filename2" >                     
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity"  required>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" formaction="Cart.php?action=add&id=<?php echo $row["id"]; ?>" name="add" style="margin-top: 5px; background-color: #1ABC9C;" class="btn btn-success" value="Add to Cart">
                            </div>
                            </form>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>  
                                    function chkFile2(file2) {
                                        var file = file2.files[0];
                                        var formData = new FormData( $("#myForm2")[0] );
                                        formData.append('formData', file);

                                        $.ajax({
                                        type: "POST",
                                        url: "upload.php",    
                                        contentType: false,
                                        processData: false,
                                        data: formData,
                                        success: function () {
                                            // alert($('#files2').val().substr(12));
                                        var mystr = $('#files2').val().substr(12);
                                        $('#filename2').val(mystr);
                                        }
                                    });
                                    }
                                </script>

                        <?php
                        } ?>
                        <?php 
                        if($row["pname"] == "Spiral Binding")
                        { ?>
                        <form method="post" action="" name="myForm" id="myForm" enctype="multipart/form-data">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">₹ <?php echo $row["price"]; ?></h5>
                                <select name="type" class="input form-control" required>
                                    <option style="color: black;" value="">Type of Spiral</option>
                                    <option style="color: black;" value="Saddle-Stitching">Saddle-Stitching</option>
                                    <option style="color: black;" value="Coil Binding">Coil Binding</option>
                                    <option style="color: black;" value="Twin Loop Wire">Twin Loop Wire</option>
                                    <option style="color: black;" value="Velo Binding">Velo Binding</option>
                                </select><br>
                                <select name="variation" class="input form-control" required>
                                    <option style="color: black;" value="">Select variations</option>
                                    <option style="color: black;" value="Black & White">Black & White</option>
                                    <option style="color: black;" value="Color">Color</option>
                                </select><br>
                                <select name="size" class="input form-control" required>
                                    <option style="color: black;" value="">Select size</option>
                                    <option style="color: black;" value="A3">A3</option>
                                    <option style="color: black;" value="A4">A4</option>
                                    <option style="color: black;" value="A5">A5</option>
                                    <option style="color: black;" value="A6">A6</option>
                                </select><br>
                                <input type="file" name="file" id="file3" placeholder="Select your file" class="input form-control" onChange="chkFile3(this)" required/><br>
                                <input type="hidden" name="filename" id="filename3" >                     
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" formaction="Cart.php?action=add&id=<?php echo $row["id"]; ?>" name="add" style="margin-top: 5px; background-color: #1ABC9C;" class="btn btn-success" value="Add to Cart">
                        </div>
                        </form>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>  
                                    function chkFile3(file2) {
                                        var file = file2.files[0];
                                        var formData = new FormData( $("#myForm3")[0] );
                                        formData.append('formData', file);

                                        $.ajax({
                                        type: "POST",
                                        url: "upload.php",    
                                        contentType: false,
                                        processData: false,
                                        data: formData,
                                        success: function () {
                                            // alert($('#file3').val().substr(12));
                                        var mystr = $('#file3').val().substr(12);
                                        $('#filename3').val(mystr);
                                        }
                                    });
                                    }
                                </script>
                        <?php
                        } ?>
                        <?php 
                        if($row["pname"] == "Flex Printing")
                        { ?>
                        <form method="post" action="" name="myForm4" id="myForm4" enctype="multipart/form-data">
                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger">₹ <?php echo $row["price"]; ?></h5>
                                <select name="size" class="input form-control" required>
                                    <option style="color: black;" value="">Select flex size</option>
                                    <option style="color: black;" value="3 x 2 feet">3 x 2 feet</option>
                                    <option style="color: black;" value="6 x 5 feet">6 x 5 feet</option>
                                    <option style="color: black;" value="8 x 2.5 feet">8 x 2.5 feet</option>
                                    <option style="color: black;" value="10 x 5 feet">10 x 5 feet</option>
                                </select><br>
                                <select name="type" class="input form-control" required>
                                    <option style="color: black;" value="">Select flex type</option>
                                    <option style="color: black;" value="frontlit flex">Frontlit Flex</option>
                                    <option style="color: black;" value="backlit flex">Backlit Flex</option>
                                    <option style="color: black;" value="mesh flex">Mesh Flex</option>
                                </select><br>
                                <input type="file" name="file" id="file4" placeholder="Select your file" class="input form-control" onChange="chkFile4(this)" required/><br>
                                <input type="hidden" name="filename" id="filename4" >
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity"  required>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" formaction="Cart.php?action=add&id=<?php echo $row["id"]; ?>" name="add" style="margin-top: 5px; background-color: #1ABC9C;" class="btn btn-success" value="Add to Cart">
                            </div>
                        <?php
                        } ?>
                        </form>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>  
                                    function chkFile4(file2) {
                                        var file = file2.files[0];
                                        var formData = new FormData( $("#myForm4")[0] );
                                        formData.append('formData', file);

                                        $.ajax({
                                        type: "POST",
                                        url: "upload.php",    
                                        contentType: false,
                                        processData: false,
                                        data: formData,
                                        success: function () {
                                            // alert($('#file3').val().substr(12));
                                        var mystr = $('#file4').val().substr(12);
                                        $('#filename4').val(mystr);
                                        }
                                    });
                                    }
                                </script>
                    </div>
                    <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Details Confirmation</h3>
        <div class="table-responsive">
            <form method="POST" id="formUpload" enctype="multipart/form-data">
            <table class="table table-bordered">
            <tr>
                <th width="10%">Product Name</th>
                <th width="5%">Quantity</th>
                <th width="10%">Size</th>
                <th width="10%">Type</th>
                <th width="10%">Variation</th>
                <th width="10%">File Name</th>
                <th width="5%">Price Details</th>
                <th width="7%">Total Price</th>
                <th width="10%">Action</th>
                <!-- <th width="17%">Select File</th> -->
                <!-- <th width="17%">Confirm File</th> -->
            </tr>


            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $value) {
                        ?>
                        <tr>
                        <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td><?php echo $value["item_size"]; ?></td>
                            <td><?php if($value["item_type"] == "") { echo "-";} ?><?php echo $value["item_type"]; ?></td>
                            <td><?php if($value["item_variation"] == "") { echo "-";} ?><?php echo $value["item_variation"]; ?></td>
                            <td><?php echo $value["item_file"]; ?></td>
                            <td>₹ <?php echo $value["product_price"]; ?></td>
                            <td>
                                ₹ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
                                        <!-- <td><input type="file" name="file" id="file" placeholder="Select file" class="input form-control" required/></td>
                                        <td><input type="submit" id="confirm" value="Confirm" style="margin-bottom: 7px; margin-top: 7px;" class="btn btn-info"></td> -->
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        $_SESSION['total'] = $total;
                    }
                        ?>
                        <tr>
                            <td colspan="7" align="right">Total</td>
                            <th align="right">₹ <?php echo number_format($total, 2); ?></th>
                            <td><a href="./paytm/TxnTest.php"><span class="btn btn-success" style="background-color: #1ABC9C;">Checkout</span></a></td>
                        </tr>
                        <?php
                    }
                    
                ?>
            </table>
            </form>
        </div>

    </div>
    <script>
//         $("#confirm").click(function() {
//         $(this).closest("form").attr("action", "upload.php");
//         var file = $("#file").val();
//         if(file == "hello")
//         {
//             $("#confirm").addClass("btn btn-info disabled").text("File Verified");
//         } else {
//             $("#confirm").addClass("btn btn-info").text("File Not Matched");
//         }

// });
    // $(document).ready(function() {
    //  $("#confirm").click(function(){
    //     var file = $("#file").val();
    //     // var captchID = $("#captcha").text();
    //      if(file == )
    //      { 
    //         $('#confirm').html('<i class="fas fa-spinner fa-spin mr-4"></i>'); 
    //         setTimeout(
    //           function() 
    //             {    //disable 
    //                 $('#file').hide("slow"); // Input box will hide
    //                 $('#confirm').addClass("btn btn-info disabled").text("Captcha Verified");
    //                 $('#confirm').attr("disabled", true);
    //             }, 3000);
    //      }
    //      else
    //      {
    //         $('#confirm').addClass("btn btn-danger").text("Not Matched");
    //         $("#file").prop('disabled', true);
    //         setTimeout(
    //           function() 
    //             {    //disable 
    //                 $('#file').val("");
    //                 $("#file").prop('disabled', false);
    //                 $('#confirm').removeClass("btn-danger").text("Verify Captcha");
    //             }, 3000);
    //      }
    //   }); 
    // });
</script>
</body>
</html>
