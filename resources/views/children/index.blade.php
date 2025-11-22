<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Family  Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" crossorigin="anonymous"/>
  

<style>
.hover-border-red {
    transition: border-color 0.5s; /* Smooth color change */
}

.hover-border-red:hover {
    border-color: red !important; /* Hover pe border green */
}


</style>
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-light shadow-lg ">
  <div class="container-fluid ">
    <a class="navbar-brand fw-bold text-primary mx-5" href="#" style="font-size: 35px">FAMILY MANAGEMENT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
      </ul>

@if(Auth::check())
  <span class="me-3 fw-bold text-primary">
      👤 {{ Auth::user()->name }}
  </span>
@endif


        <!-- Search Form -->
        <form action="{{ route('logout') }}" class="d-flex ms-lg-3 mt-3 mt-lg-0" method="POST">
          @csrf
          <button class="btn btn-outline-danger shadow-lg" type="submit">Logout</button>
        </form>

    </div>
  </div>
</nav>


<h2 class="my-5 text-primary text-center">CHILDREN LIST</h2>

<form method="GET" action="{{ route('children.index') }}" class="d-flex gap-4 mb-4 mt-4"  onsubmit="showLoader()"  >

  <div class="card h-100 w-50  border-dark">
      <a href="{{ route('children.index') }}" class="btn btn-light w-100  shadow-lg "  onclick="showLoader()"    >All children</a>
    <!--<button class="btn btn-outline-primary"  value="{{ $search ?? '' }}"      >All childen</button>-->

  <!--<input type="text" name="search" class="form-control w-45 shadow-lg border-danger " placeholder="Search by name" value="{{ $search ?? '' }}">-->
  </div>

  <div class="card h-100 w-50 ">
      <input type="text" name="search" class="form-control w-45 shadow-lg border-danger " placeholder="Search by name" value="{{ $search ?? '' }}">
  </div>

  <div class="card h-100 w-50 ">
  <!--data ko clear krne k liye-->
  <a href="{{ route('children.index') }}" class="btn btn-success w-10 shadow-lg border-primary" onclick="showLoader()"  >Reset</a>
    </div>

    
  <div class="card h-100 w-50 " >
  <select name="family_id"    class="form-select w-45 shadow-lg border-dark" onchange="this.form.submit()">
    <option value="" >-- Select Family --</option>
    @foreach($families as $family)
      <option value="{{ $family->id }}"   {{ $family_id == $family->id ? 'selected' : ''  }} >
        {{ $family->family_name }} 
      </option>
    
    
    @endforeach
  </select>
    </div>
</form>

<div class="">
<a href="{{ route('children.create') }}" class="btn btn-dark mb-5 shadow-lg "      onclick="showLoader()">+ Add Child</a>
</div>



<table class="table table-hover w-100 ">
  <thead>
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
          <img src="{{ asset('storage/'.$child->photo) }}" width="120" height="120" class="rounded-circle shadow-lg border border-5 border-primary hover-border-red">
        @else N/A @endif
      </td>
      <td>{{ $child->name }}</td>
      <td>{{ $child->age }}</td>
      <td>{{ $child->family->family_name ?? 'N/A' }}</td>
     
      <td>
        <a href="{{ route('children.show', $child->id) }}" class="btn btn-outline-primary" onclick="showLoader()" ><i class="fa fa-eye " aria-hidden="true"></i></a>
        <a href="{{ route('children.edit', $child->id) }}" class="btn btn-outline-warning"  onclick="showLoader()" ><i class="fas fa-edit "></i></a>
        <form action="{{ route('children.destroy', $child->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this?')" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-outline-danger"     onclick="return confirm('Are You Confirm ,Delete this child?')"><i class="fa fa-trash " aria-hidden="true"></i></button>
    
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>



    <div class="d-flex justify-content-center "  onclick="showLoader()" >
        {{ $children->links('pagination::bootstrap-5') }}
    </div>
  

<!--{{ $children->appends(['search'=>$search,'family_id'=>$family_id])->links() }}-->

@include('components.loader')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>