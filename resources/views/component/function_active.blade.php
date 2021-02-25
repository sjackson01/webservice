<!-- BEGIN active functions list -->
<h5 class="card-title">Active Functions</h5>
<form method="post" action="/functions" enctype="multipart/form-data">
    {{ csrf_field() }}
    @php
        $array = json_decode($activeFunctions, true);
        $array1 = json_decode($lockIds, true);
        $array2 = array_combine($array1, $array);
        foreach($array2 as $key=>$value)
        {   
            echo '<div class="input-group mb-3">';
                echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
                        echo '<label class="btn btn-success active">';
                            echo "<input type='radio'  value='". $key . "' name='lockId' id='functions' autocomplete='off' checked>"; 
                                echo $value;
                        echo '</label>';
            echo "</div>";
            echo "</div>";
        }
    @endphp
    <div class="form-group">
            <button type="submit" class="btn btn-info">Delete</button>
        </div>
    </div>
</form>
<!-- END active functions list -->