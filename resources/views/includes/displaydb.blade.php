<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
       <div class="card-body">
            <h5 class="card-title">Db Test</h5>
            <p class="card-text">
                <form method="post" action="/database" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @php
                        $array = json_decode($functions, true);
                        foreach($array as $key=>$value)
                        {   
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' value='". $value . "' name='function' id='functions'  placeholder='functions'>";
                            echo "<label class='form-check-label' for='flexCheckDisabled'>";
                            echo $value; 
                            echo "</div>";
                        }
                    @endphp
                    <div class="form-group row">
                            <button type="submit" class="btn btn-info">Add</button>
                    </div>
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
                    <div class="form-group row">
                            <button type="submit" class="btn btn-info">Delete</button>
                        </div>
                    </div>
                </form>
            </p>
        </div>
    </div>
</div>