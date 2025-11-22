
<!DOCTYPE html>
<html>
<head>
    <title>Children List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="" style="background-color: aliceblue">

<div class="container border border-dark my-5 shadow-lg rounded-3" style="width: 400px" style="background-color: azure">  
<h2 class="mt-2">Edit Child</h2>
<form method="POST" action="{{ route('children.update', $child->id) }}" enctype="multipart/form-data" class="w-100 " onsubmit="showLoader()"   >
  @csrf @method('PUT')

  <div class="mb-3">
    <label>Family</label>
    <select name="family_id" class="form-select border-dark">
      @foreach($families as $family)
        <option value="{{ $family->id }}" {{ $child->family_id == $family->id ? 'selected' : '' }}>
          {{ $family->family_name }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control border-dark" value="{{ $child->name }}" required>
  </div>

  <div class="mb-3">
    <label>Age</label>
    <input type="number" name="age" class="form-control border-dark" value="{{ $child->age }}">
  </div>

  <div class="mb-3">
    <label>Current Photo</label><br>
    @if($child->photo)
      <img src="{{ asset('storage/'.$child->photo) }}" width="80"><br>
    @endif
    <input type="file" name="photo" class="form-control mt-2 border-dark">
  </div>

 <div class="mb-1">
  <button type="submit" class="btn btn-success mb-1 w-100">Update</button>
 </div>

 <div class="mb-2">
  <a href="{{ route('children.index') }}" class="btn btn-secondary mb-2 w-100"  onclick="showLoader()"  >Back</a>
 </div>
</form>
</div>

@include('components.loader')
</body>
</html>
