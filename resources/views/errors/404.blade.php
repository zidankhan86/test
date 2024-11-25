<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404-Not Found!</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #not-found {
            position: relative;
            height: 100vh;
        }

        #not-found .not-found {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .not-found {
            max-width: 520px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
        }

        .not-found .not-found-404 {
            position: relative;
            height: 240px;
        }

        .not-found .not-found-404 h1 {
            font-family: 'Montserrat', sans-serif;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 252px;
            font-weight: 900;
            margin: 0px;
            color: #262626;
            text-transform: uppercase;
            letter-spacing: -40px;
            margin-left: -20px;
        }

        .not-found .not-found-404 h1>span {
            text-shadow: -8px 0px 0px #fff;
        }

        .not-found .not-found-404 h3 {
            font-family: 'Cabin', sans-serif;
            position: relative;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            color: #262626;
            margin: 0px;
            letter-spacing: 3px;
            padding-left: 6px;
        }

        .not-found h2 {
            font-family: 'Cabin', sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            color: #000;
            margin-top: 0px;
            margin-bottom: 25px;
        }

        @media only screen and (max-width: 767px) {
            .not-found .not-found-404 {
                height: 200px;
            }

            .not-found .not-found-404 h1 {
                font-size: 200px;
            }
        }

        @media only screen and (max-width: 480px) {
            .not-found .not-found-404 {
                height: 162px;
            }

            .not-found .not-found-404 h1 {
                font-size: 162px;
                height: 150px;
                line-height: 162px;
            }

            .not-found h2 {
                font-size: 16px;
            }
        }


        .black-button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            margin-top: 20px;
            font-size: 16px;
        }

        .black-button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div id="not-found">
        <div class="not-found">
            <div class="not-found-404">
                <h3>Oops! Page not found</h3>
                <h1><span>4</span><span>0</span><span>4</span></h1>
            </div>
            <h2>we are sorry, but the page you requested was not found.</h2>
            <a href="{{ url()->previous() }}" class="black-button">Go Back</a>

        </div>
    </div>
</body>

</html>
