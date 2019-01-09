<?php ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    RECURSIVE
                </div>

                <div class="links">
                    <a href="/">HOME</a>
                    <a href="/iterative">Go to iterative</a>               
                </div>

                <form action="{{URL::to('/recursive')}}" method="post">
                    {{ csrf_field()}}
                    
                    <label>
                        Select parent category: 
                    </label>
                    <select name="parentNode">
                        @foreach ($treeHolder->options as $option)
                        <option value="{{$option->id}}">{{$option->name}}</option> 
                        @endforeach
                    </select>
                    
                    <label>
                        Enter category name:
                    </label>                    
                    <input type="text" placeholder="Category name" name="catName">
                    
                    <button type="submit">Add</button>
                    
                </form>

                <div>{{$treeHolder->tree->toHtml()}}</div>

            </div>
        </div>
    </body>
</html>