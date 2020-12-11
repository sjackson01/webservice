<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">Posts</h5>
                <p class="card-text">
                    @php
                    foreach ($bodyDown as $key => $value) {
                            echo $value['source'];
                        }
                    @endphp
                </p>
        </div>
    </div>
</div>