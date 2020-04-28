<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secure License Login</title>
    <style>
        .align {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        /* helpers/grid.css */

        .grid {
            margin-left: auto;
            margin-right: auto;
            max-width: 320px;
            max-width: 20rem;
            width: 90%;
        }

        /* helpers/hidden.css */

        .hidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        /* helpers/icon.css */

        .icons {
            display: none;
        }

        .icon {
            display: inline-block;
            fill: #606468;
            font-size: 16px;
            font-size: 1rem;
            height: 1em;
            vertical-align: middle;
            width: 1em;
        }

        /* layout/base.css */

        * {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }

        html {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            font-size: 100%;
            height: 100%;
        }

        body {
            background-color: #2c3338;
            color: #606468;
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-size: 0.875rem;
            font-weight: 400;
            height: 100%;
            line-height: 1.5;
            margin: 0;
            min-height: 100vh;
        }

        /* modules/anchor.css */

        a {
            color: #eee;
            outline: 0;
            text-decoration: none;
        }

        a:focus,
        a:hover {
            text-decoration: underline;
        }

        /* modules/form.css */

        input {
            background-image: none;
            border: 0;
            color: inherit;
            font: inherit;
            margin: 0;
            outline: 0;
            padding: 0;
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s;
        }

        input[type='submit'] {
            cursor: pointer;
        }

        .form {
            margin: -14px;
            margin: -0.875rem;
        }

        .form input[type='password'],
        .form input[type='text'],
        .form input[type='submit'] {
            width: 100%;
        }

        .form__field {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: 14px;
            margin: 0.875rem;
        }

        .form__input {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        /* modules/login.css */

        .login {
            color: #eee;
        }

        .login label,
        .login input[type='text'],
        .login input[type='password'],
        .login input[type='submit'] {
            border-radius: 0.25rem;
            padding: 16px;
            padding: 1rem;
        }

        .login label {
            background-color: #363b41;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            padding-left: 20px;
            padding-left: 1.25rem;
            padding-right: 20px;
            padding-right: 1.25rem;
        }

        .login input[type='password'],
        .login input[type='text'] {
            background-color: #3b4148;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }

        .login input[type='password']:focus,
        .login input[type='password']:hover,
        .login input[type='text']:focus,
        .login input[type='text']:hover {
            background-color: #434a52;
        }

        .login input[type='submit'] {
            background-color: #ea4c88;
            color: #eee;
            font-weight: 700;
            text-transform: uppercase;
        }

        .login input[type='submit']:focus,
        .login input[type='submit']:hover {
            background-color: #d44179;
        }

        /* modules/text.css */

        p {
            margin-bottom: 24px;
            margin-bottom: 1.5rem;
            margin-top: 24px;
            margin-top: 1.5rem;
        }

        .text--center {
            text-align: center;
        }

    </style>
</head>
<body class="align">

<div class="grid">

    <form action="" method="POST" class="form login">
        <div class="form__field">
            <label for="login__username">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                </svg>
                <span class="hidden">Kullanıcı Adı</span></label>
            <input id="login__username" type="text" name="username" class="form__input" placeholder="Kullanıcı Adı" required>
        </div>

        <div class="form__field">
            <label for="login__password">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                </svg>
                <span class="hidden">Şifre</span></label>
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Şifre" required>
        </div>
        <?php if(isset($login) && !empty($login)){echo "<span class='align' style='color:red;'>$login</span>";} ?>
        <div class="form__field">
            <input type="submit" value="Giriş Yap" name="submit">
        </div>
    </form>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/>
    </symbol>
    <symbol id="lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/>
    </symbol>
    <symbol id="user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/>
    </symbol>
</svg>

</body>
</html>