<?php ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TEST</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <style>
            html, body {
                background-color: #ccc;
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
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;             
            }

            .m-b-md {
                margin-bottom: 30px;             
            }

            .form {
                margin: 50px 0px;
                color: #636b6f;                 
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase; 
            }
            
            label {
                margin-right: 10px;
            }

            #select-menu, #cat-name {
                background-color: #636b6f;
                color: #fff;
                height: 30px;
                width: 180px;
                font-family: 'Nunito', sans-serif;
                font-size: 15px;
                font-weight: bold;
                margin-right: 30px;
            }
            
            ::placeholder {
                color: #999;
                font-family: 'Nunito', sans-serif;
                font-size: 15px;
                font-weight: bold;
            }

            #select-menu:hover {
                cursor: pointer;
                background-color: #000;
            }
            
            button {
                background-color: #636b6f;
                color: #fff;
                height: 30px;
                width: 100px;
                font-family: 'Nunito', sans-serif;
                font-size: 15px;
                font-weight: bold;
                text-transform: uppercase;  
                border-color: #000;
            }      
            
            button:hover {
                cursor: pointer;
                background-color: #000;
                color: #fff;
            }
            
            ul {
                margin-top: 0px;          
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

                <form class="form" action="{{URL::to('/recursive')}}" method="post">
                    {{ csrf_field()}}

                    <label>
                        Select parent category: 
                    </label>
                    <select id="select-menu" name="parentNode">
                        @foreach ($treeHolder->options as $option)
                        <option value="{{$option->id}}">{{$option->name}}</option> 
                        @endforeach
                    </select>

                    <label>
                        Enter category name:
                    </label>                    
                    <input id="cat-name" type="text" placeholder="Enter category name" name="catName">

                    <button type="submit">Add</button>

                </form>

                <div>{{$treeHolder->tree->toHtml()}}</div>

            </div>
        </div>
    </body>
</html>