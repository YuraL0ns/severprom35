<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split Screen Layout</title>
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-side, .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-side {
            background-color: #2D2D2D; /* Adjust the background color if needed */
        }

        .right-side {
            background-color: #e3193b;
        }

        .logo {
            width: 500px;
            height: auto;
        }

        .content {
            text-align: center;
            width: 100%;
        }

        h1 {
            color: #fff;
            font-weight: 800;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 300px; /* Adjust width of the form as needed */
        }

        label, .checkbox-text {
            color: #fff;
            margin-bottom: 15px;
        }

        input[type="email"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            background-color: #7c0b1f;
            color: #fff;
        }

        button {
            cursor: pointer;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"] + .checkbox-label {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #2D2D2D;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="checkbox"]:checked + .checkbox-label {
            background-color: #7c0b1f;
        }

        input[type="checkbox"]:checked + .checkbox-label::after {
            content: "✔";
            color: #2D2D2D;
            display: block;
            text-align: center;
            line-height: 20px;
        }

    </style>

</head>
<body>
<div class="container">
    <div class="left-side">
        <img src="logo.png" alt="Logo" class="logo">
    </div>
    <div class="right-side">
        <div class="content">
            <h1>Welcome</h1>
            <form>
                <label for="phone">Номер телефона</label>
                <input type="phone" id="phone" name="phone">

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password">

                <input type="checkbox" id="agree" name="agree">
                <label for="agree" class="checkbox-label"></label>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
