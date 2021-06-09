@extends('layout.app')
    @section('content')
    @php
        echo '<pre>';
        print_r($query);
        echo '</pre>'; 
    @endphp
@endsection