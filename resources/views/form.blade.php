@extends('master')

@push('stylings')
    <script src="js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="css/MyJournal.css"/>
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
@endpush

@push('content')
    <div class="container-fluid mainPanel">
        <form class="form-horizontal" method="POST" action='/process-form'>
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="control-label col-sm-1">Date:</label>
                <div class="col-md-4">
                    @if(isset($edit))
                        <label>{{$edit[0]['created_at']}}</label>
                        <input type="hidden" name="date" value="{{$edit[0]['created_at']}}">
                    @else
                        <input type="text" id="datepicker" name="date" class="from-control">
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-1">Title:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="title" id="title" value="{{isset($edit)?$edit[0]['title']:''}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-1">Post:</label>
                <div class="col-sm-11 ">
                    <textarea class="form-control" name="journal-entry" rows="20" id="comment">{{isset($edit)?$edit[0]['post']:''}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                    <label class="control-label col-sm-1">Tags:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tags" id="tags"
                        value="{{isset($edit)?$tagsForForm:''}}">
                    </div>
                
            </div> 
            @stack('button')
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
@endpush