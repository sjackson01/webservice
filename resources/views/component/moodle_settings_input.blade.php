<!-- BEGIN moodle input -->
<form>
  <div class="form-group">
    <label for="moodle url">Url</label>
    <input type="moodle url" class="form-control" id="moodle url" aria-describedby="moodle url" placeholder="Moodle Url">
  </div>
  <div class="form-group">
    <label for="token">Token</label>
    <input type="token" class="form-control" id="token" placeholder="Moodle Webservice Token">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="format">
    <label class="form-check-label" for="format">Json</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@php
  echo '<p class="lead mt-4 font-weight-bold">'; 
  echo "Current Url: ";
  echo  $moodleUrl->url;
  echo '</p>';
@endphp
<!-- END moodle input --> 