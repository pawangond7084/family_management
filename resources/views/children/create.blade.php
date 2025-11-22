
<!DOCTYPE html>
<html>
<head>
    <title>Children List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="" style="background-color: aliceblue">

  <div class="container border border-dark  my-5 shadow-lg rounded-3 " style="width: 400px;" style="background-color: azure" >
<h2 class="mt-2">Add New Child</h2>
<form method="POST" action="{{ route('children.store') }}" enctype="multipart/form-data" class="w-100"  onsubmit="showLoader()"      >
  @csrf
  <div class="mb-3">
    <label>Family</label>
    <select name="family_id" class="form-select border border-dark">
      <option value="">Select Family</option>
      @foreach($families as $family)
        <option value="{{ $family->id }}">{{ $family->family_name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control border-dark" required>
  </div>

  <div class="mb-3">
    <label>Age</label>
    <input type="number" name="age" class="form-control border-dark">
  </div>

  <div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control border-dark">
  </div>

 
<div class="mb-2">
  <button type="submit" class="btn btn-success  mt-3 w-100">Save</button>
</div>

<div class="mb-3">
  <a href="{{ route('children.index') }}" class="btn btn-secondary mb-1 w-100" onclick="showLoader()" >Back</a>
</div>
</form>


@include('components.loader')

</body>
</html>
