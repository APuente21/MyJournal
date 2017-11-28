@extends('master')

@push('stylings')
    <script src="../js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/MyJournal.css"/>
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
@endpush

@push('content')
    <div class="container-fluid search">
        <h2>Search By Tag: {{$search}}</h2>
    </div> 
@endpush