<!DOCTYPE html>
<html>
<head>
    <title>Add Child</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: aliceblue">

<div class="container d-flex justify-content-center">
  <div class="w-100 p-4 border border-dark my-5 shadow-lg rounded-3"
       style="max-width: 450px; background-color: azure;">

    <h2 class="mt-2 text-center text-primary">Add New Child</h2>

    <form method="POST" action="{{ route('children.store') }}" 
          enctype="multipart/form-data" onsubmit="showLoader()">
      @csrf

      <div class="mb-3">
        <label>Family</label>
        <select name="family_id" class="form-select border border-dark" required>
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

      <button type="submit" class="btn btn-success w-100 mt-3">Save</button>

      <a href="{{ route('children.index') }}" 
         class="btn btn-secondary mt-3 w-100" 
         onclick="showLoader()">Back</a>
    </form>

    @include('components.loader')
  </div>
</div>

</body>
</html>
