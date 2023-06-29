<html>

<head>
    <title>update data</title>
</head>
<style>
    body {
        background: linear-gradient(to right, greenyellow, skyblue);

    }

    h1 {
        border-radius: 25px;
        box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.2),0px 4px 8px 0px rgba(0, 0, 0, 0.3);

    }

    .update_btn {
        background-color: green;
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        border: 0;
        outline: none;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.2),0px 2px 4px 0px rgba(0, 0, 0, 0.3);

    }
    .delete_btn{
        background-color: rgb(215, 12, 25);
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        cursor: pointer;
        border: 0;
        outline: none;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.2),0px 2px 4px 0px rgba(0, 0, 0, 0.3);

    }
    

    table{
        margin: 5% 2%;
        box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.2),0px 4px 8px 0px rgba(0, 0, 0, 0.3);
    }

    table td{
        
        padding: 5px 15px;
    }
    table th{
        padding: 5px 15px;
        background-color: #ba2be2;
    }
</style>

</html>

<?php
include("user.php");

$sqlquery = "SELECT * FROM user";
$data = mysqli_query($con, $sqlquery);
$record = mysqli_num_rows($data);

// echo $record;

$result = mysqli_fetch_assoc($data);

if ($record != 0) {
    ?>

    <h1 style="background-color:orange;text-align:center;">List of all data</h1>
    <center>
        <table border="1" cellspacing="5" width="54%">
            <tr>
                <th width="1%">ID</th>
                <th width="10%">Name</th>
                <th width="20%">Email</th>
                <th width="10%">Phone</th>
                <th width="13%">Action</th>
            </tr>



            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                # code...
        
                echo "<tr>
                <td>" . $result['id'] . "</td>
                <td>" . $result['name'] . "</td>
                <td>" . $result['email'] . "</td>
                <td>" . $result['phone'] . "</td>
                <td><a href='ajax_update.php?id=$result[id]' <button  type='submit' data-eid='{$result['id']}' class = 'update_btn'>Edit</button></a>
                <a href =''><button data-id='{$result['id']}' type='submit' class='delete_btn'>Delete</button></a></td>
            </tr>
            ";


            }
} else {
    echo " no records found";
}

?>
    </table>
</center>
<script>
    // function check_delete() {
    //     return confirm("Are you sure you want to delete your data?")
    // }
</script>

<div id="error-mssg"></div>
<div id="success-mssg"></div>

<script type="text/javascript" src="jquery-3.6.3.min.js" ></script>
<script type="text/javascript" >
    $(document).on('click','.update_btn',function(){
        var uid = $(this).data("eid")
        $.ajax({
            url:'update.php',
            type:'POST',
            success:function (data) {
                
            }
        })
    })
    $(document).on('click','.delete_btn',function () {
        if (confirm("Are you sure you want to delete record ?")) {
            
            var stuid = $(this).data('id')
        
            $.ajax({
                url:"ajax_delete.php",
                type:'post',
                data:{id:stuid},
                success:function(data){
                    
                }
        })
    }
    })
</script>