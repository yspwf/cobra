<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息列表</title>
</head>
<body>
    <a href="add.php">返回注册页面</a>


<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>uid</th>
        <th>name</th>
        <th>操作</th>
    </tr>
   
    <?php foreach($resarr as $v){ ?>
    <tr>
        <td><?php echo $v['name']?></td>
        <td><?php echo $v['age']?></td>
        <td><a href="del.php?uid=<?php echo $v['uid'];?>">删除</a> | <a href="mod.php?uid=<?php echo $v['uid'];?>">编辑</a></td>
    </tr>
    <?php } ?>
   
</table>
</body>
</html>