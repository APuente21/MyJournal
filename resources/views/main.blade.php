@extends('master')

@push('stylings')
    <script src="js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="css/MyJournal.css"/>
@endpush

@section('myForm')
    <div class="container-fluid mainPanel">
        <form class="form-horizontal" method="POST" action='/process-form'>
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="control-label col-sm-1" for="date">Date:</label>
                <div class="col-md-4">
                    <input type="text" id="datepicker" name="date" class="from-control" value="{{isset($edit)?$edit[0]['created_at']:''}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-1" for="title">Title:</label>
                <div class="col-sm-11">
                    <input type="title" class="form-control" name="title" id="title" value="{{isset($edit)?$edit[0]['title']:''}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-1" for="post">Post:</label>
                <div class="col-sm-11 ">
                    <textarea class="form-control" name="journal-entry" rows="20" id="comment">{{isset($edit)?$edit[0]['post']:''}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="tags">
                    <label class="control-label col-sm-1" for="title">Tags:</label>
                    <div class="col-sm-5">
                        <input type="title" class="form-control" id="title" placeholder="Enter tags">
                    </div>
                </div>
                @stack('button')
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
                    </li>
                @endforeach
            </ul>   
        @endif
    </div>
@endsection