<div class="col-sm">
    <div class="card">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
                <p class="card-text">
                    @php
                    foreach ($bodyUp as $key => $value) {
                            echo $value['id'];
                            echo '<br>';  
                            echo $value['body'];
                            echo '<br>';
                            echo $value['postId'];
                            echo '<br>'; 
                        }
                    @endphp
                </p>
        </div>
    </div>
</div>