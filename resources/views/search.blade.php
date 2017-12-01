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
        @if('posts')
            @foreach($posts as $entry)
                <div class="search-posts">
                    <a href="/edit-form/{{$entry['created_at']}}">
                                    <h3>{{$entry['title']}}</h3>
                    </a>
                    <p>{{$entry['created_at']}}</p>
                    <p></p>
                </div>
            @endforeach
        @endif
    </div> 
@endpush