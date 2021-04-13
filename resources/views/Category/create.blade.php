
<div class="">
<h3 class="title">Category Create</h3>
<form action="/category/store" method="post">
@csrf()
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" id="name" class="form-control" name="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<button onclick="getLocation()">Try It</button>

<p id="demo"></p>
<div id="mapholder"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$('#name').on('input', function() {
  var name=$('#name').val();
  console.log($('#name').val());
  if(name=='inventics')
  alert('success');
});


</script> 

<script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}

</script>
