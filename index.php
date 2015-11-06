<!DOCTYPE html>
<?php
    if(isset($_COOKIE['user_name']))
    {
        header('location:./src/main.php');
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=eage, chrome=1"/>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />--> 
    
    <title>赖氏宗谱-用户登录</title>

    <script type="text/javascript" src="./js/jquery-1.4.4.min.js"></script>
    <link rel="stylesheet" href="./css/login.css" />
   
    <script type="text/javascript">
        w = Math.floor(window.screen.width);
        h = Math.floor(window.screen.height);
        s = h / w;

        //alert(h + " / " + w + " = " + s);
        var path = "./img/bg/";
        if (s > 0.55 && s < 0.58)
        {
            if (w > 1500)
                path += "1600_900.jpg";
            else if (w > 1000)
                path += "1360_768.jpg";
            else 
                path += "640_360.jpg";

        }
        else if (s > 0.58 && s < 0.62)
        {
            path += "1280_768.jpg";
        }
        else if (s > 0.62 && s < 0.70)
        {
            if (w > 1800)
                path += "1920_1200.jpg";
            else if (w > 1500)
                path += "1680_1050.jpg";
            else 
                path += "1440_900.jpg";
        }
        else if (s > 0.70 && s < 0.76)
        {
            path += "1024_768.jpg";
        }
        else if (s > 0.77 && s < 0.82)
        {
            path += "1280_1024.jpg";
        }
        else if (s>1 && s <= 2) 
        {
            path += "360_640.jpg";
        }
        else
        {
            path += "1440_900.jpg";
        }
        //alert(path);
        $("html").attr("style", "background-image:url(" + path + ")");


        $(function () {
            //$("#message").hide();
            $("button#submit").click(function () {
                var username = $("input#username").val();
                var password = $("input#password").val();
                if (username == "") {
                    $("#message").html("用户名不能为空！");
                    $("#message").show();
                    $("input#username").focus();
                    return false;
                }
                if (password == "") {
                    $("#message").html("密码不能为空！");
                    $("#message").show();
                    $("input#password").focus();
                    return false;
                }
                else
                {
                    $("#message").html("正在提交，请稍后...");
                    $("#message").show();   
                }

                $.ajax({
                    type: "POST",
                    url: "./src/login.php",
                    data: "username=" + username + "&password=" + password,
                    success: function (result) {
                        //alert(result);
                        //data = result.search("result=\[0-9\]")==-1 ? -1 : result[7];
                        data = result;
                        //alert(data);
                        if(data == 0){
                            $("#message").html("数据库连接失败！请联系网站管理员！");
                            $("#message").show();
                        }
                        else if (data == 1) {
                            $("#message").html("用户名不存在！请重新输入或<a href='./src/register.html'>注册</a>");
                            $("#message").show();
                            $("input#username").focus();
                        }
                        else if (data == 2) {
                            $("#message").html("密码错误！请重新输入");
                            $("#message").show();
                            $("input#password").focus();
                        }
                        else if (data == 3 || data==4) {
                            $("#message").html("登录成功！正在加载，请稍后...");
                            $("#message").show();
                            location.href = "./src/main.php";
                        }
                        else
                        {
                            $("#message").html("登录失败，错误未知！请联系网站管理员！");
                            $("#message").show();
                        }
                    },
                    error: function(){
                        $("#message").html("通信失败！请联系网站管理员！");
                        $("#message").show();
                    }
                });
                return false;
            });
            $("button#register").click(function () {
                //location.href = "./src/main.html";
            });
        });
    </script>
</head>
    
<body>
    <div class="form">
        <p class="input">
            <input type="text" id="username" placeholder="用户名" />
            <input type="password" id="password" placeholder="密码" />
        </p>
        <p class="input"><p id ="message">请输入用户名和密码！</p></p>
        <button type="submit" name="submit" id="submit">
            <span>登录</span>
        </button>
        <button type="submit" name="register" id="register">
            <span>注册</span>
        </button>
    </div>
</body>
</html>
