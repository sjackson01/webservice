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
                                echo "<div class='form-group row'>";
                                echo "<label for='titleid' class='col-sm-3 col-form-label'>$value</label>";
                                echo "<div class='col-sm-9'>";
                                echo "<input name='function' type='radio' value='". $value . "' class='form-control' id='functions' placeholder='functions'>";
                                echo "</div>";
                                echo "</div>";
                            }
                        @endphp
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="Add" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <form method="post" action="/database" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        @php
                            $array = json_decode($activeFunctions, true);
                            $array1 = json_decode($lockIds, true);
                            $array2 = array_combine($array1, $array);
                            echo '<pre>';
                            print_r($array2);
                            echo '</pre>';
                            foreach($array2 as $key=>$value)
                            {   
                                echo "<div class='form-group row'>";
                                echo "<label for='titleid' class='col-sm-3 col-form-label'>$value</label>";
                                echo "<div class='col-sm-9'>";
                                echo "<input name='lockId' type='radio' value='". $key . "' class='form-control' id='functions' placeholder='functions'>";
                                echo "</div>";
                                echo "</div>";
                            }
                        @endphp
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </form>
                </p>
            </div>
        </div>
</div>