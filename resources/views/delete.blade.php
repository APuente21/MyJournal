@extends('master')

@push('stylings')
    <script src="../js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/MyJournal.css"/>
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
@endpush

@push('content')
    <div class="container-fluid search">
        <h2>Are you sure you want to delete {{$title}}</h2>
        <form class="form-horizontal confirmation" method="POST" action='/delete'>
            {{ csrf_field() }}
            <div class="submit container">
                <input type="hidden" name="date" value="{{$date}}">
                <input type="submit" class="btn btn-warning" name="cancel_button" value="Cancel" />
                <input type="submit" class="btn btn-danger" name="delete_button" value="Delete" />
            </div>
        </form>
    </div> 
@endpush