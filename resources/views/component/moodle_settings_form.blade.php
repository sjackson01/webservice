<!-- BEGIN endpoint input -->
<form method="post" action="/" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
      @php
        echo '<p class="lead mt-4">'; 
        echo "Active Moodle Url: ";
        echo  $moodleUrl->url;
      echo '</p>';
      @endphp
      <label for="moodle-url">Url</label>
      <input type="text" class="form-control" name='moodle_url'  id="moodle_url" aria-describedby="moodle-url" placeholder="Moodle Url" required>
  </div>
  <div class="form-group">
    <label for="token">Token</label>
    <input type="text" class="form-control" name='moodle_token' id="token" placeholder="Moodle Webservice Token" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="format">
    <label class="form-check-label" for="format">Json</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- END endpoint input --> 