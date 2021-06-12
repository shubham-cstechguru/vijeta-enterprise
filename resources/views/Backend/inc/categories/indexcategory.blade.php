@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">View Category</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Category</a></li>
      <li class="breadcrumb-item active">View Category</li>
    </ol>
    <div class="card mb-4">
      <div class="card-header text-right">
        <a type="button" name="button" class="btn btn-success" href="{{ route('admin.category.create') }}">
          <i class="fas fa-plus mr-1"></i>
          Add Category
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($categories as $category)
              <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $category->title }}</td>
                <td><img src="{{ asset("/storage/categories/".$category->image) }}" alt="" width="100" ></td>
                <td>
                  <a type="button" name="button" class="btn btn-info" href="{{ route('admin.category.edit', $category->id) }}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a type="button" name="button" class="btn btn-danger" onclick="handleDelete({{ $category->id }})">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form class="" action="" method="POST" id="deleteFormModal">
                {!! csrf_field() !!}
                @method('DELETE')
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure to want to Delete This Category ?
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection('content')

@section('scripts')
<script>
  function handleDelete(id) {
    var form = document.getElementById('deleteFormModal')
    form.action = '/admin-control/category/' + id
    console.log('deleting', form)
    $('#deleteModal').modal('show')
  }
</script>
@endsection
