<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>My Journal</title>
        <meta charset="utf-8"/>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">     

        <!--My custom sheets>-->
        @stack('stylings')  
    </head>
    <body>
        <header>
            <h1 class="title"><a href="http://myjournal.andrespuente.us/">My Journal</a></h1>
        </header>
        @stack('content')  
        <div class="container sidePanel row">
            @if('$data')
                <div>
                    <h2>Previous Posts</h2>
                    <ul class="post-list">
                        @foreach ($data as $result)
                            <li>
                                <a href="/edit-form/{{$result->created_at}}">
                                    {{$result->created_at}}, {{$result->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>  
                </div>
            @endif
            @if('tags')
                <div>
                    <h2>Tags</h2>
                    <ul class="tag-list">
                        @foreach ($tags as $tag)
                            <li>
                                <a href="/tag-search/{{$tag->tag}}">
                                    {{$tag->tag}}
                                </a>
                            </li>
                        @endforeach
                    </ul>  
                </div>
            @endif
        </div>
        <div class="footer">
            <div class="container-fluid">
                © 2017 Copyright
            </div>
        </div>
    </body>
</html>