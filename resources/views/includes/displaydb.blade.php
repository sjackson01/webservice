<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
       <div class="card-body">
            <h5 class="card-title">Db Test</h5>
            <p class="card-text">
                 <!-- BEGIN form --> 
                <form method="post" action="/database" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- BEGIN functions list -->
                    @php
                        $array = json_decode($functions, true);
                        foreach($array as $key=>$value)
                        {   
                            // Begin function radio
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' value='". $value . "' name='function' id='functions'  placeholder='functions'>";
                            echo "<label class='form-check-label' for='flexCheckDisabled'>";
                            echo $value; 
                            echo "</div>";
                            // End function radio
                                
                            // Begin dropdown function parameters
                            echo '<div class="dropdown">';
                            echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo   "Dropdown button";
                            echo '</button>';
                            echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                                echo '<a class="dropdown-item" href="#">Action</a>';
                                echo '<a class="dropdown-item" href="#">Another action</a>';
                                echo '<a class="dropdown-item" href="#">Something else here</a>';
                            echo '</div>';
                            echo '</div>';
                            // End dropdown function parameters
                        }
                    @endphp
                    
                    <div class="form-group row">
                            <button type="submit" class="btn btn-info">Add</button>
                    </div>
                    <!-- END functions list -->
                    <!-- BEGIN active functions list -->
                    <form method="post" action="/database" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @php
                        $array = json_decode($activeFunctions, true);
                        $array1 = json_decode($lockIds, true);
                        $array2 = array_combine($array1, $array);
                        foreach($array2 as $key=>$value)
                        {   
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' value='". $key . "' name='lockId' id='functions'  placeholder='functions'>";
                            echo "<label class='form-check-label' for='flexCheckDisabled'>";
                            echo $value; 
                            echo "</div>";
                        }
                    @endphp
                    <!-- END functions list -->
                    <div class="form-group row">
                            <button type="submit" class="btn btn-info">Delete</button>
                        </div>
                    </div>
                </form>
                <!-- END form --> 
            </p>
        </div>
    </div>
</div>

