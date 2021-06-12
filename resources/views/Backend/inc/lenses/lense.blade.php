@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('css')
{{ Html::style('Admin/css/trix.css') }}
@endsection

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">{{ isset($lense) ? 'Edit Lense' : 'Add Lense' }}</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.lense.index') }}">Lense</a></li>
      <li class="breadcrumb-item active">{{ isset($lense) ? 'Edit Lense' : 'Add Lense' }}</li>
    </ol>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="card mb-4">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul class="list-group">
              @foreach($errors->all() as $error)
              <li class="list-group-item text-danger">
                {{ $error }}
              </li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="card-body">
            <form method="POST" action="{{ isset($lense) ? route('admin.lense.update', $lense->id) : route('admin.lense.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              @if(isset($lense))
              @method('PUT')
              @endif
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="lenseTitle">Lense Title</label>
                  <input type="text" name="title" class="form-control" id="lenseTitle" aria-describedby="lenseTitleHelp" placeholder="Enter Lense Name" value="{{ isset($lense) ? $lense->title : '' }}">
                </div>
                <div class="form-group col-md-12">
                  <label for="lenseDescription">Lense Description</label>
                    <textarea class="form-control" name="description" id="lenseDescription" cols="30" rows="5">{{ isset($lense) ? $lense->description : '' }}</textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">{{ isset($lense) ? 'Update' : 'Save' }}</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection('content')

@section('scripts')
@endsection
