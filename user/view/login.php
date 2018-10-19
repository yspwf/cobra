<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP+Redis信息管理系统</title>
</head>
<body>
    <form action="/index.php?m=user&c=user&a=loginsave" method="post">
        <table align="left">
            <tr><td>用户名：</td><td><input type="text" name="username"></td></tr>
            <tr><td>密码：</td><td><input type="password" name="password" id=""></td></tr>
            <tr><td><input type="submit" value="注册"></td><td><input type="reset" value="重填"></td></tr>
        </table>
    </form>
</body>
</html>