@extends('form')

@push('stylings')
    <script src="../js/myjournal.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/MyJournal.css"/>
@endpush

@push('button')
    <div class="submit">
        <input type="submit" class="btn btn-warning" name="cancel_button" value="Cancel" />
        <input type="submit" class="btn btn-danger" name="delete_button" value="Delete" />
        <input type="submit" class="btn btn-primary" name="update_button" value="Update" />
    </div>
@endpush