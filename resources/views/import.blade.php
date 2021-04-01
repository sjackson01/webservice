@extends('layout.app')
@section('content')
<div class="col-sm">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Import File</h5>
            <p class="card-text">
            @php
                if(!empty($status))
                {
                    echo $status; 
                }
                
                echo Form::open(array('url' => '/import','files'=>'true'));
                echo 'Select a .csv to upload ';
                echo Form::file('csv');
                echo Form::submit('Upload File');
                echo Form::close();
            @endphp
        </p>
    </div>
</div>
@endsection