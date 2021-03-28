<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0'>

     <meta name="interkassa-verification" content="325baf9797d3a4cdd9c9764d7c2dc4a7" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sauap.kz</title>
    
    <!-- Nunito instead of Helvetica font -->
    <link defer href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Roboto font -->
    <link defer href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
   
    <link async rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <title>Document</title>

    <style>

        body{
            /* background-color: green; */
            margin: 0px;
            height: 100vh;
            overflow: hidden;
        }
        #app {
            height: 100vh;
            width: 100vw;
            position: relative;
        }
        .lottie {
            /* background: red; */
            
            width: 300px;
            height: 300px;
            margin: 0;

            position: absolute;
            top: 50%;
            left: 50%;

            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

            overflow: hidden;

            text-align: center;
            opacity: 1;

        }

        #lottie_animation {
            width: 300px;
            height: 300px;
        }

        .loader {
            position: absolute;
            bottom: 0%;
            text-align: center;
            width: 100vw;
            
            /* color: #3C6E71; */
        }

        .loader_text {
            font-size: 18px;
            /* font-weight: bold; */
        }

    </style>

</head>
<body>
    <div id="app">
        <div class="lottie">
            <!-- <lottie-player id="lottie_animation"
                src="https://assets3.lottiefiles.com/packages/lf20_0q3yy4yn.json" 
                background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay
            > -->
            <lottie-player id="lottie_animation"
                src="{{ asset('data.json') }}" 
                background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay
            >
            </lottie-player>
        </div>
        <div class="loader">            
            <p class="loader_text">
                Кітапхана жүктелуде...
            </p>
        </div>
    </div>
        
    <script
        src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js" async
    >
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="{{ asset('js/static/epub.min.js') }}"></script>
    <script src="{{ asset('js/static/zip.min.js') }}"></script>

    <script async src="https://kit.fontawesome.com/d8f16b6626.js" crossorigin="anonymous"></script>

</body>
</html>