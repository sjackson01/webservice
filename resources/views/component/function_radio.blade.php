<form method="post" action="/functions" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!-- BEGIN functions list -->
    @php
        foreach($functions as $key=>$value)
        {   
            // Begin function radio
            echo '<div class="input-group mb-3">';
                echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
                    echo '<label class="btn btn-primary active">';
                        echo "<input type='radio' value='". $value->functions . "' name='function' id='functions' autocomplete='off' checked>"; 
                            echo $value->functions;
                    echo '</label>';
                echo "</div>";
                // End function radio
                // Begin dropdown function parameters
                echo '<div class="input-group-prepend">';
                    echo '<div class="dropdown px-2">';
                        if(isset($value->parameter1)){  
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter1;
                        echo '</button>';
                        }
                        if(isset($value->parameter2)){
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter2;
                        echo '</button>';
                        }
                        if(isset($value->parameter3)){
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter3;
                        echo '</button>';
                        }
                        if(isset($value->parameter4)){
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter4;
                        echo '</button>';
                        }
                        if(isset($value->parameter5)){
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter5;
                        echo '</button>';
                        }
                        if(isset($value->parameter6)){
                        echo '<button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $value->parameter6;
                        echo '</button>';
                        }
                            echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                                foreach($parameters as $param)
                                {
                                echo '<a class="dropdown-item">';
                                echo $param;
                                echo'</a>';
                                }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            // End dropdown function parameters
        }
    @endphp
    <div class="form-group">
        <button type="submit" class="btn btn-info">Add</button>
    </div>
</form>
<!-- END functions list -->
                            
            