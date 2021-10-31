<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="https://www.thymeleaf.org"
      xmlns:sec="https://www.thymeleaf.org/thymeleaf-extras-springsecurity3">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4a9fe6146e.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .Loginform {
            width: 100%;
            height: 620px;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px 0 rgba(3, 3, 4, 0.1), 0 0 1px 0 rgba(239, 242, 247, 0.5);
            background-color: #fff;
        }

        .Sign-In-box {
            width: 100%;
            text-align: center;
        }

        .Sign-In {
            width: 100%;
            height: 37px;
            margin-bottom: 201px;
            font-family: Muli;
            font-size: 28px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.32;
            letter-spacing: 0.1px;
            color: #000a12;

        }

        .-Input-Label {
            width: 100%;
            height: 84px;
            margin: 50px 0 20px;
        }

        .Type {
            padding-left: 15px;
            width: 76px;
            height: 20px;
            font-family: Roboto;
            font-size: 17px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.18;
            letter-spacing: 0.08px;
            color: #b8c1cb;
        }

        .inputuser {
            width: 100%;
            text-align: center;
        }

        .inputpass {
            width: 100%;
            text-align: center;
        }

        .Normal {
            width: 94%;
            height: 56px;
            margin-top: 8px;
            padding: 6px 14px;
            border-radius: 4px;
            box-shadow: inset 0 1px 2px 0 rgba(102, 113, 123, 0.21), inset 0 0 0 1px rgba(102, 113, 123, 0.25);
            border: solid 1px #d3dce6;
            background-color: #fff;
            font-size: 20px;
        }

        .icon-box {
            width: 100%
        }

        .iconlock {
            font-size: 30px;
            position: relative;
            bottom: 50px;
            left: 90%;
            color: #09a0ff;
        }

        .iconcheck {
            font-size: 30px;
            position: relative;
            bottom: 50px;
            left: 90%;
            color: #13cb65;
        }

        .include-button {
            width: 100%;
            text-align: center;
        }

        .LoginButton {
            width: 88%;
            height: 60px;
            margin-top: 70px;
            margin-bottom: 20px;
            background-color: #0078e8;
            border-radius: 50px;
            border: none;
        }

        .TypeText {
            height: 20px;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: 1;
            letter-spacing: normal;
            color: #fff;
        }

        .LoginWFbButton {
            width: 88%;
            height: 60px;
            margin-top: 5px;
            margin-bottom: 40px;
            background-color: #009dff;
            border-radius: 50px;
            border: none;
        }

        .TypeTextFb {
            height: 20px;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: 1;
            letter-spacing: normal;

            color: #fff
        }

        .Forgot-box {
            width: 100%;
            text-align: center;
        }

        .Forgot a {
            height: 24px;
            font-family: Roboto;
            font-size: 18px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.33;
            letter-spacing: 0.09px;
            color: #778f9b;
        }

        .iconfb {
            font-size: 20px;
            margin-left: 10px;
            position: relative;
            top: 1px;
            color: #ffffff;
        }
    </style>
</head>
<body>
<!--<div th:if="${param.error}">-->
<!--    <p th:text="${session.error}" th:unless="${session == null}">[...]</p>-->
<!--</div>-->
<!--<div th:if="${param.logout}">You have been logged out.</div>-->
<form th:action="api/summitUrl" method="post" style="max-width:550px;min-width:380px;margin:auto">
    <div class="Loginform">
        <div class="Sign-In-box">
            <span class="Sign-In">
                Sign In
            </span>
        </div>
        <div class="-Input-Label">
                <span class="Type">
                    Login
                </span>
            <div class="inputuser">
                <label>
                    <input class="Normal" type="text" name="username" value="">
                </label>
            </div>
            <div class="icon-box">
                <i class="fas fa-check-circle iconcheck"></i>
            </div>

        </div>
        <div class="-Input-Label">
                <span class="Type">
                    Password
                </span>
            <div class="textpass">
                <div class="inputpass">
                    <label>
                        <input class="Normal" type="password" name="password" value="">
                    </label>
                </div>
                <div class="icon-box">
                    <i class="fas fa-lock iconlock"></i>
                </div>
            </div>
        </div>
        <div class="include-button">
            <button class="LoginButton" type="submit" value="Sign In">
                <span class="TypeText">
                    Login
                </span>
            </button>
            <button class="LoginWFbButton" type="submit" name="action" value="loginFacebook">
                <span class="TypeTextFb">
                    Continue with Facebook
                </span>
                <i class="fab fa-facebook-square iconfb"></i>
            </button>
            <div class="Forgot-box">
                <span class="Forgot">
               <a href="#">Forgot your password?</a>
            </span>
            </div>

        </div>
    </div>
</form>
</body>
</html>
