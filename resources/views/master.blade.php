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
                <form class="form-horizontal" method="POST" action='/process-form'>
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="control-label col-sm-1" for="date">Date:</label>
                        <div class="col-md-4">
                            <input type="text" id="datepicker" name="date" class="from-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-1" for="title">Title:</label>
                         <div class="col-sm-11">
                              <input type="title" class="form-control" name="title" id="title" placeholder="Enter title">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-1" for="post">Post:</label>
                         <div class="col-sm-11 ">
                              <textarea class="form-control" name="journal-entry" rows="20" id="comment">
                                {{$test ? 'test' : ''}}
                             </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="tags">
                            <label class="control-label col-sm-1" for="title">Tags:</label>
                             <div class="col-sm-5">
                                  <input type="title" class="form-control" id="title" placeholder="Enter tags">
                            </div>
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div> 
                </form>
                
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
        <div class="container sidePanel row">
           @if('$date')
                <ul class="post-list">
                    @foreach ($data as $result)
                        <li>
                            <a href="/edit-form/{{$result->created_at}}">
                                {{$result->created_at}}, {{$result->title}}
                            </a>
                            
                        <!--    
                          #  <button type="submit" form="form2" class="btn btn-primary">
                           # {{$result->created_at}}, {{$result->title}}
                            </button>
                        -->
                        </li>
                    @endforeach
                </ul>   
            
            @endif
        </div>

        
        <div class="footer">
                <div class="container-fluid">
                    © 2017 Copyright
                </div>
            </div>
    </body>
</html>