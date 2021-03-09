<!-- BEGIN endpoint input -->
<form method="post" action="/settings" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="moodle-url">Url</label>
    <input type="text" class="form-control" name='moodle_url'  id="moodle_url" aria-describedby="moodle-url" placeholder="Moodle Url">
  </div>
  @php
    echo '<p class="lead mt-4 font-weight-bold">'; 
    echo "Active Moodle Url: ";
    echo  $moodleUrl->url;
    echo '</p>';
    @endphp
  <div class="form-group">
    <label for="token">Token</label>
    <input type="text" class="form-control" name='moodle_token' id="token" placeholder="Moodle Webservice Token">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="format">
    <label class="form-check-label" for="format">Json</label>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Url</label>
    <input type="text" class="form-control"  name='source_url' id="source_url" aria-describedby="emailHelp" placeholder="Source Url">
  </div>
  @php
    echo '<p class="lead mt-4 font-weight-bold">'; 
    echo "Active Source Url: ";
    echo  $sourceUrl->url;
    echo '</p>';
  @endphp
  <div class="form-group">
    <label for="exampleInputPassword1">Token</label>
    <input type="text" class="form-control" name='source_token' id="souce_token" id="exampleInputPassword1" placeholder="Source Token">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Json</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- END endpoint input --> 