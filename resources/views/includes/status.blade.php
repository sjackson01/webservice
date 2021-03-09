<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">Up</h5>
            <p class="card-text">
                @php
                if(empty($upStatus)){
                    echo "Please configure endpoint settings";
                }else{
                    echo $upStatus;
                }
                @endphp
            </p>
        </div>
    </div>
</div>
<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
        <h5 class="card-title">Down</h5>
            <p class="card-text">
                @php
                    if(empty($downStatus)){
                        echo "Please configure endpoint settings";
                    }else{
                        echo $downStatus;
                    }
                @endphp
            </p>
        </div>
    </div>
</div>