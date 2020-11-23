<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">Age</h5>
                <p class="card-text">
                    @php
                    foreach ($body['data'] as $key => $value) {
                            echo $value['employee_age']; 
                            echo '<br>'; 
                        }
                    @endphp
                </p>
        </div>
    </div>
</div>    