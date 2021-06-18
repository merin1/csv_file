<?php
include 'connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>
<body style="background-color: #90bff56b;">
    <div id="wrap" style="margin-top: 32px">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="action.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                       <h3><b>Employee Details</b></h3>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File in CSV Format</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <?php
               get_all_records();
               function get_all_records(){

    $Sql = "SELECT * FROM employee_details";
    $result = pg_query($Sql);  
    if (pg_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered' >
             <thead><tr><th>ID</th>
                          <th>Employee Code</th>
                          <th>Employee Name</th>
                          <th>Department</th>
                          <th>Age</th>
                          <th>Experience</th>
                        </tr></thead><tbody>";
     while($row = pg_fetch_array($result)) {
         echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['employee_code']."</td>
                   <td>" . $row['employee_name']."</td>
                   <td>" . $row['department']."</td>
                   <td>" . $row['age']."</td>
                   <td>" . $row['experience']."</td>
                   </tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
            ?>
        </div>
    </div>
</body>
</html>