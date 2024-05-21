
<?php

if(isset($_POST["action"]))
{
    include('data.php');
    if($_POST["action"] == 'fetch')
    {
        $output = '';
        $query = "SELECT * from nhanvien   ORDER BY tennv ASC";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output .='
        <table class="table table-bordered table-striped">
        <tr style="text-align:center;">
        <td>Mã NV</td>
        <td>Usename</td>
        <td>Password</td>
        <td>Email</td>
        <td>Trạng thái</td>
        <td>Cấp/Thu</td>
        </tr>
        ';
        foreach($result as $row)
        {
            $status = '';
            if($row['user_status'] =='Active')
            {
                $status = '<span class="label label-success"> Active</span>';
            }
            else{
                $status = '<span class="label label-danger">Inactive</span>';
            }
            $output .= '
            <tr style="text-align:center;" > 
            <td>'.$row['manv'].'</td>
            <td>'.$row['usename'].'</td>
            <td>'.$row['password'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$status.'</td>
            <td><button type="button" name="action" class="btn btn-info btn-xs action" data-manv="'.$row["manv"].'" data-user_status="'.$row["user_status"].'">Action</button></td>
            </tr>';

            }
            $output .='</table>';
            echo $output;
            }
            if($_POST["action"]=='change_status')
            {
                $status = '';
                if($_POST['user_status']=='Active')
                {
                    $status = 'Inactive';
                }
                else
                {
                    $status = 'Active';
                }
                $query =" 
                UPDATE nhanvien Set user_status = :user_status where manv = :manv";
                $statement = $connect->Prepare($query);
                $statement->execute(
                    array(
                        ':user_status' => $status,
                        ':manv'     => $_POST['manv']
                    )
                    );
$result = $statement->fetchAll();
if(isset($result))
{
    echo '<div class="alert alert-success"> Trạng thái đã được thay đổi thành: <strong>'.$status.'</strong></div>';
    
}
            }
        }
    
?>