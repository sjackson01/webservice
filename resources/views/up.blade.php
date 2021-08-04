@extends('layout.app')
    @section('content')
    @php
        echo '<pre>';
        print_r($urls);
        echo '</pre>'; 
    @endphp
@endsection