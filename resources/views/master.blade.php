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
        <script src="js/myjournal.js"></script>
        <link rel="stylesheet" type="text/css" href="css/MyJournal.css"/>
    </head>
    <body>
        <header>
            <h1>My Journal</h1>
        </header>
        <div class="container-fluid mainPanel">
            <form class="form-horizontal">
                <div class="form-group row">
                    <label class="control-label col-sm-1" for="date">Date:</label>
                    <div class="col-md-4">
                        <input type="text" id="datepicker" class="from-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-1" for="title">Title:</label>
                     <div class="col-sm-11">
                          <input type="title" class="form-control" id="title" placeholder="Enter title">
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="control-label col-sm-1" for="post">Post:</label>
                     <div class="col-sm-11 ">
                          <textarea class="form-control" rows="20" id="comment"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="container sidePanel row">
            @if()
        </div>

    </body>
</html>