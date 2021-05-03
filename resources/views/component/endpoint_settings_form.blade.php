<!-- BEGIN endpoint input -->
<form method="post" action="/endpoint" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    @php
      echo '<p class="lead mt-4">'; 
      echo "Active Source Url: ";
      echo  $sourceUrl->url;
      echo '</p>';
    @endphp
    <label for="exampleInputEmail1">Url</label>
    <input type="text" class="form-control"  name='source_url' id="source_url" aria-describedby="emailHelp" placeholder="Source Url" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Token</label>
    <input type="text" class="form-control" name='source_token' id="souce_token" id="exampleInputPassword1" placeholder="Source Token" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Json</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- END endpoint input --> 