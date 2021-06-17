<form method="post" action="/functions" id="function_form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!-- BEGIN functions list -->
    @php
        foreach($functions as $key=>$value)
        {   
            // Begin function radio
            echo '<div class="input-group mb-3">';
                echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
                    echo '<label class="btn btn-primary active">';
                        echo "<input type='radio' value='". $value->functions ."' name='function' id='functions' autocomplete='off'>"; 
                            echo $value->functions;
                    echo '</label>';
                echo "</div>";
                // End function radio
                // Begin dropdown function parameters
                echo '<div class="input-group-prepend">';
                    echo '<div class="dropdown px-2">';
                        if(isset($value->parameter1)){   
                                echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter1">';
                                    echo '<option disabled="disabled" selected="selected">';
                                        echo "$value->parameter1"; 
                                            foreach($parameters as $param)
                                            {      
                                                echo "<option value='". $value->paramstring1 . $param ."'>";
                                                    echo $param;
                                                echo'</option>';
                                            }
                                    echo '</optionn>';
                                echo '</select>'; 
                        }
                        if(isset($value->parameter2)){   
                            echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter2">';
                                echo '<option disabled="disabled" selected="selected">';
                                    echo "$value->parameter2"; 
                                        foreach($parameters as $param)
                                        {      
                                            echo "<option value='". $value->paramstring2 . $param ."'>";
                                                echo $param;
                                            echo'</option>';
                                        }
                                echo '</optionn>';
                            echo '</select>'; 
                        }
                        if(isset($value->parameter3)){   
                            echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter3">';
                                echo '<option disabled="disabled" selected="selected">';
                                    echo "$value->parameter3"; 
                                        foreach($parameters as $param)
                                        {      
                                            echo "<option value='". $value->paramstring3 . $param ."'>";
                                                echo $param;
                                            echo'</option>';
                                        }
                                echo '</optionn>';
                            echo '</select>'; 
                        }
                        if(isset($value->parameter4)){   
                            echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter4">';
                                echo '<option disabled="disabled" selected="selected">';
                                    echo "$value->parameter4"; 
                                        foreach($parameters as $param)
                                        {      
                                            echo "<option value='". $value->paramstring4 . $param ."'>";
                                                echo $param;
                                            echo'</option>';
                                        }
                                echo '</optionn>';
                            echo '</select>';  
                        }
                        if(isset($value->parameter5)){   
                            echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter5">';
                                echo '<option disabled="disabled" selected="selected">';
                                    echo "$value->parameter5"; 
                                        foreach($parameters as $param)
                                        {      
                                            echo "<option value='". $value->paramstring5 . $param ."'>";
                                                echo $param;
                                            echo'</option>';
                                        }
                                echo '</optionn>';
                            echo '</select>'; 
                        }
                        if(isset($value->parameter6)){   
                            echo '<select class="btn btn-secondary dropdown-toggle mr-1 mt-1" name="parameter6">';
                                echo '<option disabled="disabled" selected="selected">';
                                    echo "$value->parameter6"; 
                                        foreach($parameters as $param)
                                        {      
                                            echo "<option value='". $value->paramstring6 . $param ."'>";
                                                echo $param;
                                            echo'</option>';
                                        }
                                echo '</optionn>';
                            echo '</select>'; 
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        // End dropdown function parameters
    @endphp
    <div class="form-group">
        <button type="submit" class="btn btn-info">Add</button>
    </div>
</form>
<!-- END functions list -->
                            
            