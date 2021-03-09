<div class="col-sm">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Test Server</h5>
            <p class="card-text">
                @php 
                if(isset($bodyDown)){
                    echo '<pre>';
                    print_r($bodyDown);
                    echo '</pre>';
                    echo '<pre>';
                    print_r($key);
                    echo '</pre>'; 
                    echo '<pre>';
                    print_r($value);
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