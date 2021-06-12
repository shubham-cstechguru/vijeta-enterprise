@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">Product Variant</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Product</a></li>
      <li class="breadcrumb-item active">Product Variant</li>
    </ol>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between">
        <h3>{{ $product->title }}</h3>
        <a type="button" name="button" class="btn btn-success" href="{{ route('admin.productvariant.create', $product->id) }}">
          <i class="fas fa-plus mr-1"></i>
            Add Variant
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Number</th>
                <th>Lense</th>
                <th>Mirror</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
              @php
                $i = 1;
              @endphp
              @foreach($prod_var as $product)
                <tr>
                  <td>{{ $i++ }}.</td>
                  <td>{{ $product->lense->title }}</td>
                  <td>
                    <ol>
                      @foreach($product->productmirrors as $mirror)
                        <li>{{ $mirror->mirror->title }}</li>
                      @endforeach
                    </ol>
                  </td>
                  <td>
                    <ul>
                      @foreach($product->productmirrors as $mirror)
                        <li> ₹&nbsp; {{ $mirror->price }}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                    <a type="button" name="button" class="btn btn-info" href="{{ route('admin.productvariant.edit', ['product' => $product->product->id, 'productvariant' => $product->id]) }}">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" name="button" class="btn btn-danger"  onclick="handleDelete({{ $product->id }},{{ $product->id }})">
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
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure to want to Delete This Product ?
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
  function handleDelete(prod_id, var_id) {
    var form = document.getElementById('deleteFormModal')
    form.action = '/admin-control/product/' + prod_id + '/productvariant/' + var_id
    console.log('deleting', form)
    $('#deleteModal').modal('show')
  }
</script>
@endsection
