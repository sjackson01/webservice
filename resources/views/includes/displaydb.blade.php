<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">Db Test</h5>
                <p class="card-text">
                 @php
                    $array = json_decode($forView, true);
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                 @endphp 
             </p>
        </div>
    </div>
</div>