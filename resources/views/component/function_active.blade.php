<!-- BEGIN active functions list -->
<h5 class="card-title">Active Functions</h5>
<form method="post" action="/functions" enctype="multipart/form-data">
    {{ csrf_field() }}
    @php
        foreach($activeFunctions as $key=>$value)
        {   
            echo '<div class="input-group mb-3">';
                echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
                        echo '<label class="btn btn-success active">';
                            echo "<input type='radio'  value='". $value->id. "' name='lockId' id='functions' autocomplete='off'>"; 
                                echo $value->functions;
                        echo '</label>';
            echo "</div>";
            // End active function list
            // Begin active function parameters
            echo '<div class="input-group-prepend">';
                    echo '<div class="dropdown px-2">';
                        if(isset($value->parameter1)){  
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter1;
                        echo '</button>';
                        }
                        if(isset($value->parameter2)){
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter2;
                        echo '</button>';
                        }
                        if(isset($value->parameter3)){
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter3;
                        echo '</button>';
                        }
                        if(isset($value->parameter4)){
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter4;
                        echo '</button>';
                        }
                        if(isset($value->parameter5)){
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter5;
                        echo '</button>';
                        }
                        if(isset($value->parameter6)){
                        echo '<button class="btn btn-warning mr-1 mt-1" type="button">';
                        echo $value->parameter6;
                        echo '</button>';
                        }   
                    echo '</div>';
                echo '</div>';
            echo "</div>";
        }
        // End active function parameters list
    @endphp 
    <div class="form-group">
            <button type="submit" class="btn btn-info">Delete</button>
        </div>
    </div>
</form>
<!-- END active functions list -->