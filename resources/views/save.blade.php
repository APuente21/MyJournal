@extends('form')

@push('stylings')
    <script src="../js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/MyJournal.css"/>
@endpush

@push('button')
    <div class="submit">
        <input type="submit" class="btn btn-primary" name="save_button" value="Save" />
    </div>
@endpush