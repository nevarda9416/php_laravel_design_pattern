@extends('layouts.default')
@section('content')
<?php echo htmlspecialchars_decode($page['content']??''); ?>
@endsection
