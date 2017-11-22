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
            <h1>My Journal</h1>
        </header>
        <section>
            @yield('myForm')
        </section>
        <div class="footer">
            <div class="container-fluid">
                © 2017 Copyright
            </div>
        </div>
    </body>
</html>