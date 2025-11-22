<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Child Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" crossorigin="anonymous"/>

  <style>
    .hover-border-green {
        transition: border-color 0.5s;
    }

    .hover-border-green:hover {
        border-color: green !important;
    }

    /* Image Responsive */
    .child-photo {
        width: 100%;
        max-width: 150px;
        height: auto;
    }

    /* Responsive Card */
    .details-card {
        max-width: 500px;
        width: 100%;
    }
  </style>
</head>

<body style="background-color: aliceblue;">

<div class="container d-flex justify-content-center">
  
  <div class="details-card card shadow-lg border-dark p-4 my-5 bg-white">

    <h2 class="text-center mb-4">Child Details</h2>

    <div class="text-center">
      @if($child->photo)
        <img src="{{ asset('storage/'.$child->photo) }}" 
             class="mb-3 rounded-circle border border-5 border-danger hover-border-green shadow-lg child-photo">
      @endif
    </div>

    <p><strong>Name:</strong> {{ $child->name }}</p>
    <p><strong>Age:</strong> {{ $child->age }}</p>
    <p><strong>Family:</strong> {{ $child->family->family_name ?? 'N/A' }}</p>

    <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning w-100 mt-3" onclick="showLoader()">Edit</a>
    <a href="{{ route('children.index') }}" class="btn btn-primary w-100 mt-2" onclick="showLoader()">Back</a>

  </div>

</div>

@include('components.loader')

</body>
</html>
