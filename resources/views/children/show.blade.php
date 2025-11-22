
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" crossorigin="anonymous"/>
  


<style>
.hover-border-green {
    transition: border-color 0.5s; /* Smooth color change */
}

.hover-border-green:hover {
    border-color: green !important; /* Hover pe border green */
}
</style>
</head>
<body class="" style="background-color: aliceblue;">


<div class="container" style="width: 700px">
<h2 class="text-center mt-5 mb-5">Child Details</h2>
<div class="card shadow-lg border-dark  w-50 p-5 h-50 mx-auto " style="background-color: azure;">
  <div class="text-center">
    @if($child->photo)
      <img src="{{ asset('storage/'.$child->photo) }}" width="150" height="150" class="mb-3 rounded-circle border border-5 border-danger hover-border-green shadow-lg">
    @endif
  </div>
  <p><strong>Name:</strong> {{ $child->name }}</p>
  <p><strong>Age:</strong> {{ $child->age }}</p>
  <p><strong>Family:</strong> {{ $child->family->family_name ?? 'N/A' }}</p>

 <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning mb-2 mt-2"  onclick="showLoader()" >Edit</></a>
  <a href="{{ route('children.index') }}" class="btn btn-primary" onclick="showLoader()" >Back</a>

</div>

</div>
@include('components.loader')
</body>
</html>
