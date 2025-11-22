<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Family Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        crossorigin="anonymous"/>

<style>
.hover-border-red {
    transition: border-color 0.5s;
}

.hover-border-red:hover {
    border-color: red !important;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-lg">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary mx-2" href="#" style="font-size: 30px">FAMILY MANAGEMENT</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

      @if(Auth::check())
      <span class="me-3 fw-bold text-primary">
          👤 {{ Auth::user()->name }}
      </span>
      @endif

      <form action="{{ route('logout') }}" class="d-flex" method="POST">
        @csrf
        <button class="btn btn-outline-danger shadow-lg" type="submit">Logout</button>
      </form>

    </div>
  </div>
</nav>

<h2 class="my-5 text-primary text-center">CHILDREN LIST</h2>


<!-- ======================= -->
<!-- 🔥 RESPONSIVE SEARCH FORM -->
<!-- ======================= -->
<form method="GET" action="{{ route('children.index') }}"
      class="row g-3 mb-4 px-2" onsubmit="showLoader()">

  <div class="col-12 col-md-3">
      <a href="{{ route('children.index') }}" class="btn btn-light w-100 shadow-lg">All Children</a>
  </div>

  <div class="col-12 col-md-3">
      <input type="text" name="search"
             class="form-control shadow-lg border-danger"
             placeholder="Search by name"
             value="{{ $search ?? '' }}">
  </div>

  <div class="col-12 col-md-3">
      <a href="{{ route('children.index') }}" class="btn btn-success w-100 shadow-lg border-primary">Reset</a>
  </div>

  <div class="col-12 col-md-3">
      <select name="family_id"
              class="form-select shadow-lg border-dark"
              onchange="this.form.submit()">

          <option value="">-- Select Family --</option>

          @foreach($families as $family)
            <option value="{{ $family->id }}"
              {{ $family_id == $family->id ? 'selected' : '' }}>
                {{ $family->family_name }}
            </option>
          @endforeach

      </select>
  </div>

</form>


<div class="px-2">
  <a href="{{ route('children.create') }}"
     class="btn btn-dark mb-4 shadow-lg"
     onclick="showLoader()">+ Add Child</a>
</div>


<!-- ======================= -->
<!-- 🔥 RESPONSIVE TABLE -->
<!-- ======================= -->
<div class="table-responsive px-2">
<table class="table table-hover align-middle">
  <thead class="table-primary">
    <tr>
      <th>ID</th>
      <th>Photo</th>
      <th>Name</th>
      <th>Age</th>
      <th>Family</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($children as $child)
    <tr>
      <td>{{ $child->id }}</td>

      <td>
        @if($child->photo)
          <img src="{{ asset('storage/'.$child->photo) }}"
               class="img-fluid rounded-circle shadow-lg border border-5 border-primary hover-border-red"
               style="width:120px; height:120px; object-fit:cover;">
        @else
          N/A
        @endif
      </td>

      <td>{{ $child->name }}</td>
      <td>{{ $child->age }}</td>
      <td>{{ $child->family->family_name ?? 'N/A' }}</td>

      <td>

        <a href="{{ route('children.show', $child->id) }}"
           class="btn btn-outline-primary btn-sm mb-1"
           onclick="showLoader()">
            <i class="fa fa-eye"></i>
        </a>

        <a href="{{ route('children.edit', $child->id) }}"
           class="btn btn-outline-warning btn-sm mb-1"
           onclick="showLoader()">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('children.destroy', $child->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this?')"
              class="d-inline">

          @csrf
          @method('DELETE')

          <button class="btn btn-outline-danger btn-sm mb-1">
              <i class="fa fa-trash"></i>
          </button>
        </form>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>
</div>


<div class="d-flex justify-content-center my-4">
    {{ $children->links('pagination::bootstrap-5') }}
</div>

@include('components.loader')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
