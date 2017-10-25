<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
    <body>
    <h2><p align="center">Student Info</p></h2>
    <table border="1" cellpadding="5" cellspacing="0" align="center" width="60%">
        <tr bgcolor="#cccccc">
            <th>ID</th>
            <th>姓名</th>
            <th>邮箱</th>
            <th>密码</th>
        </tr>
    
    <?php foreach ($data as $stu):?>
        <tr align="center">
            <td><?php echo $stu['id']?></td>
            <td><?php echo $stu['name']?></td>
            <td><?php echo $stu['email']?></td>
            <td><?php echo $stu['password']?></td>
        </tr>
    <?php endforeach;?>
    </table>
    <p align="center">共计：<?php echo count($data);?></p>
    </body>
</html>