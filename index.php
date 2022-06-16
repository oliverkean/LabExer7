<?php include "header.php";
    require "dbconnect.php";
    
    $msg_success = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name']; 
        $c_address = $_POST['c_address'];
        $contact_no = $_POST['contact_no'];

        $sql = "INSERT INTO customer (first_name, middle_name, last_name, c_address, contact_no) VALUES (:first_name, :middle_name, :last_name, :c_address, :contact_no)";

        $statement = $connect->prepare($sql);
        if($statement->execute([":first_name"=>$first_name, ":middle_name"=>$middle_name, ":last_name"=>$last_name, ":c_address"=>$c_address, ":contact_no"=>$contact_no])){
            $msg_success = "Information added successfully";
        }else{
            $msg_success = "Failed";
        }
    }

?>

<body>
    <div class="container-fluid">
            <div class="bg-dark text-light py-5 px-5 mx-5 my-5">
                <h1 class="text-center">Customer Input</h1>
                
                <?php if(!empty($msg_success)): ?>
                    <div class="alert alert-success">
                        <?php echo $msg_success;?>
                    </div>
                <?php endif; ?>

                <!-- form --> 
                    <form class="mt-3" method="POST">
                        <div class="mx-5 my-3">
                            <input class="form-control" type="text" placeholder="First Name" id="first_name" name="first_name">
                        </div>

                        <div class="mx-5 my-3">
                            <input class="form-control" type="text" placeholder="Middle Name" id="middle_name" name="middle_name">
                        </div>

                        <div class="mx-5 my-3">
                            <input class="form-control" type="text" placeholder="Last Name" id="last_name" name="last_name">
                        </div>

                        <div class="mx-5 my-3">
                            <input class="form-control" type="text" placeholder="Address" id="c_address" name="c_address">
                        </div>

                        <div class="mx-5 my-3">
                            <input class="form-control" type="text" placeholder="Contact No." id="contact_no" name="contact_no">
                        </div>

                        <div class="mx-5 mt-5">
                            <input class="form-control btn btn-info" type="submit" value="Save Record">
                        </div>
                    </form>
            </div>
        </div>
<?php include "footer.php"; ?>
</body>