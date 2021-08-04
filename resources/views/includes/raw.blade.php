<div class="col-sm">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Raw Data View</h5>
            <p class="card-text">
                @php 
                if(isset($parameters)){
                    
                    echo '<h6>Data to be passed to webservice functions.</h6>';
                    echo '<h6>CSV will be  used as default when both endpoint and csv are configured.</h6>';

                    echo '<pre>';
                    print_r($parameters);
                    echo '</pre>';

                }

                if(isset($message))
                {
                    echo $message; 
                }
                @endphp
            </p>
        </div>
    </div>
</div>