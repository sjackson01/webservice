<div class="col-sm">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Import File</h5>
            <h6>Active FIle</h6>
            <p class="card-text">
            @php
                if(!empty($status))
                {
                    echo $status; 
                }
                
                echo Form::open(array('url' => '/import','files'=>'true'));
                echo 'Select a .csv to upload ';
                echo Form::file('csv');
                echo Form::submit('Upload File');
                echo Form::close();

                echo "<h5 class='mt-3'>";
                echo "Note";
                echo "<h5>";

                echo "<h6>";
                echo "Imported CSVs will override any import settings you have configured.";
                echo "</h6>";

                echo "<h6>";
                echo "Uploading a new file will overwrite the active file.";
                echo "</h6>";
            @endphp
        </p>
    </div>
</div>