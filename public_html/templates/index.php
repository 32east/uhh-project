<!DOCTYPE HTML>
<html lang="ru-ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title??"Страница"; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: "JetBrains Mono", monospace;
        }

        a, a:focus, a:hover, a:active {
            text-decoration: none;
            color: rgb(230, 230, 230);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #1a1a1a;
        }

        .header {
            padding: 10px;
            background-color: rgb(23, 23, 23);
        }

        .content {
            background-color: #1a1a1a;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 10px;
        }

        .container {
            text-align: center;
            margin: 40vh 0;
            background: linear-gradient(135deg, #2b2b2b, #3b3b3b);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 600px;
        }

        input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: rgb(11, 140, 11);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.16s;
        }

        button:hover {
            background-color: rgb(11, 160, 11);
        }

        .result {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .flex-container {
            display: flex;
            justify-content: center;
        }

        @media screen and (max-width: 350px) {
            input {
                margin: 0 0 5px 0;
                width: 100%;
            }

            button {
                width: 100%;
            }

            .flex-container {
                display: grid;
            }
        }
    </style>
</head>

<body>
<div class="header">
    <a href="/">Главная</a>
    <a href="/short-url">Сокращатель ссылок</a>
</div>
<div class="content">
    <?php include $viewPath; ?>
</div>
<footer>

</footer>
</body>
</html>