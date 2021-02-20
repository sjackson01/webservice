<div class="card">
    <div class="card-body">
        <h5 class="card-title">Functions</h5>
        <p class="card-text">
                <!-- BEGIN form --> 
            <form method="post" action="/database" enctype="multipart/form-data">
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
            <!-- BEGIN active functions list -->
            <h5 class="card-title">Active Functions</h5>
            <form method="post" action="/database" enctype="multipart/form-data">
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
            <!-- END functions list -->
                <div class="form-group">
                        <button type="submit" class="btn btn-info">Delete</button>
                    </div>
                </div>
            </form>
            <!-- END form --> 
        </p>
    </div>
</div>


