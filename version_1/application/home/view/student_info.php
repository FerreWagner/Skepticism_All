<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
    <body>
    <h2><p align="center">Student Info</p></h2>
    <table border="1" cellpadding="5" cellspacing="0" align="center" width="60%">
        <tr>
            <th>字段</th>
            <th>值</th>
        </tr>
        <tr align="center">
            <td>id</td>
            <td><?php echo $data['id'];?></td>
        </tr>
        <tr align="center">
            <td>name</td>
            <td><?php echo $data['name'];?></td>
        </tr>
        <tr align="center">
            <td>password</td>
            <td><?php echo $data['password'];?></td>
        </tr>
        <tr align="center">
            <td>email</td>
            <td><?php echo $data['email'];?></td>
        </tr>
    </table>
    <p align="center">
    <?php 
    if ($data['email'] > 100){
        echo 'good';
    }else {
        echo 'not good';
    }
        
    ?>
    </p>
    </body>
</html>