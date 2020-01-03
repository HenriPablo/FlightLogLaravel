<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

    <?php
//    $classes = get_declared_classes();
//
//    foreach ($classes as $class) {
//        //dump($class);
//        if (is_subclass_of($class, 'App\Http\Controllers\Controller')) {
//            dump($class);
//            echo $class . '<br />';
//            $methods = get_class_methods($class);
//            foreach ($methods as $method)
//                echo '<h1 style="color:red;">' . $method . '<h1/>';
//        }
//    }

//    $controllers = [];
//    $i=0;
//    foreach (Route::getRoutes()->getRoutes() as $route)
//    {
//        $action = $route->getAction();
//
//        if (array_key_exists('controller', $action))
//        {
//            $_action = explode('@',$action['controller']);
//            $_namespaces_chunks = explode('\\',$_action[0]);
//
//            dump( get_parent_class( $_namespaces_chunks ));
//
//            $controllers[$i]['controller'] = end($_namespaces_chunks);
//            $controllers[$i]['action'] = end($_action);
//            $controllers[$i]['namespace'] = $action['controller'];
//            $controllers[$i]['route'] = $route;
//        }
//        $i++;
//    }
//
//    dump($controllers);



    $controllers = [];

    foreach (Route::getRoutes()->getRoutes() as $route)
    {
        $action = $route->getAction();

        dump( $route );

        if (array_key_exists('controller', $action))
        {
            // You can also use explode('@', $action['controller']); here
            // to separate the class name from the method
            $controllers[] = $action['controller'];
        }
    }
    //dump( $controllers );
    ?>
<h1>Howdy!</h1>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
