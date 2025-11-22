<!DOCTYPE html>
<html>
<head>
    <title>Edit Child</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Make image responsive */
        .child-img {
            width: 100%;
            max-width: 120px;
            height: auto;
            border-radius: 5px;
        }

        /* Responsive container */
        .edit-container {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>

<body style="background-color: aliceblue">

<div class="container d-flex justify-content-center">
  <div class="edit-container border border-dark my-5 shadow-lg rounded-3 p-3 bg-white">

    <h3 class="text-center mb-3">Edit Child</h3>

    <form method="POST" action="{{ route('children.update', $child->id) }}" enctype="multipart/form-data" onsubmit="showLoader()">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="fw-bold">Family</label>
        <select name="family_id" class="form-select border-dark">
          @foreach($families as $family)
            <option value="{{ $family->id }}" {{ $child->family_id == $family->id ? 'selected' : '' }}>
              {{ $family->family_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="fw-bold">Name</label>
        <input type="text" name="name" class="form-control border-dark" value="{{ $child->name }}" required>
      </div>

      <div class="mb-3">
        <label class="fw-bold">Age</label>
        <input type="number" name="age" class="form-control border-dark" value="{{ $child->age }}">
      </div>

      <div class="mb-3">
        <label class="fw-bold">Current Photo</label><br>

        @if($child->photo)
          <img src="{{ asset('storage/'.$child->photo) }}" class="child-img mb-2">
        @endif

        <input type="file" name="photo" class="form-control border-dark">
      </div>

      <button type="submit" class="btn btn-success w-100 mt-2">Update</button>
      <a href="{{ route('children.index') }}" class="btn btn-secondary w-100 mt-2" onclick="showLoader()">Back</a>

    </form>

  </div>
</div>

@include('components.loader')

</body>
</html>
