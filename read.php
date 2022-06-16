<?php 
    include "header.php";
    require "dbconnect.php";

    $sql = "SELECT * FROM customer";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $customer_records = $statement->fetchAll(PDO::FETCH_OBJ);
    
?>

<body>
    <div class="container text-center">
            <!--add button theat redirects to add seller -->
            <a href="customer_create.php" class="btn btn-info mt-5">Add Customer Records</a>

            <table class="table table-bordered mt-5">
                <tr>
                    <th>Customer ID</th>
                    <th>First Name </th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th></th>
                </tr>  

                <?php foreach($customer_records as $record_count): ?>
                <tr>
                    <td><?= $record_count->customer_id; ?></td>
                    <td><?= $record_count->first_name; ?></td>
                    <td><?= $record_count->middle_name; ?></td>
                    <td><?= $record_count->last_name; ?></td>
                    <td><?= $record_count->c_address; ?></td>
                    <td><?= $record_count->contact_no; ?></td>
                    <td>
                        <a href="customer_update.php?id=<?= $record_count->customer_id; ?>" class="btn btn-success">Edit</a>
                        <a href="customer_delete.php?id=<?= $record_count->customer_id; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure You Want to Delete this Record ? ')">Delete</a>
                    </td>
                </tr> 
                <?php endforeach; ?>
            </table>
        </div>
        
    <?php include "footer.php"; ?>
</body>