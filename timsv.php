<html>
    <head>
        <title>Tim kiem sinh vien</title>
    </head>
    <body>
	<br/>
	<form action="user.php?url=timsv.php" method="post">
		<br/>
                Nhập mã sinh viên hoặc tên: <input type="text" name="timkiem" />
                <input type="submit" name="ok" value="search" />
            </form>
        <div align="center">
	<?php
		if (!empty($_POST['ok']))
		{
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		exit;
		}
		   $data['timkiem']    = isset($_POST['timkiem']) ? $_POST['timkiem'] : '';
		if($data['timkiem'] != null){
		   $query = pg_query($conn,"select * from sinhvien where mssv = '$data[timkiem]' or hoten like '%$data[timkiem]%' ");
		if (pg_num_rows($query) > 0){			
		 echo'<table width="100%" border="1" cellspacing="0" cellpadding="10">';
            echo'<tr>';
                echo'<td>MSSV</td>';
                echo'<td>HO TEN</td>';
                echo'<td>NGAY SINH</td>';
                echo'<td>GIOI TINH</td>';
		echo'<td>QUE QUAN</td>';
		echo'<td>LOP</td>';
		echo'<td>KHOA</td>';
            echo'</tr>';
		while ($row = pg_fetch_row($query)) {
		echo'<tr>';
                echo'<td>'; echo $row[0]; echo'</td>';
                echo'<td>'; echo $row[1]; echo'</td>';
                echo'<td>'; echo $row[2]; echo'</td>';
                echo'<td>'; echo $row[3]; echo'</td>';;
		echo'<td>'; echo $row[4]; echo'</td>';
		echo'<td>'; echo $row[5]; echo'</td>';
		echo'<td>'; echo $row[6]; echo'</td>';
		echo'</tr>';
		}
		echo'</table>' ;  
		} 	
		else{echo"Không tìm thấy sinh viên !";}
	}
	}
	?>        
        </div>
	
    </body>
</html>
