@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('css')
{{ Html::style('Admin/css/trix.css') }}
@endsection

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Category</a></li>
      <li class="breadcrumb-item active">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</li>
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
            <form method="POST" action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              @if(isset($category))
              @method('PUT')
              @endif
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="categoryTitle">Category Title</label>
                  <input type="text" name="title" class="form-control" id="categoryTitle" aria-describedby="categoryTitleHelp" placeholder="Enter Category Name" value="{{ isset($category) ? $category->title : '' }}">
                </div>

                @if(isset($category))
                <div class="form-group col-md-3">
                  <label for="categoryImage">Category Image</label>
                  <input type="file" name="image" class="form-control-file" id="categoryImage" value="{{ isset($category) ? $category->image : '' }}">
                </div>
                <div class="form-group col-md-3">
                  <img src="{{ asset("/storage/categories/".$category->image) }}" alt="" width="100">
                </div>
                @else
                <div class="form-group col-md-6">
                  <label for="categoryImage">Category Image</label>
                  <input type="file" name="image" class="form-control-file" id="categoryImage" value="{{ isset($category) ? $category->image : '' }}">
                </div>
                @endif

                <div class="form-group col-md-12">
                  <label for="categoryDescription">Category Description</label>
                  <input id="description" type="hidden" name="description" value="{{ isset($category) ? $category->description : '' }}">
                  <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group col-md-6">
                  <label for="seocategoryTitle">Category SEO Title</label>
                  <input type="text" name="seo_title" class="form-control" id="seocategoryTitle" aria-describedby="seocategoryTitleHelp" placeholder="Enter Category SEO Title" value="{{ isset($category) ? $category->seo_title : '' }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="seocategoryKeyword">Category SEO Keyword</label>
                  <input type="text" name="seo_keyword" class="form-control" id="seocategoryKeyword" aria-describedby="seocategoryKeywordHelp" placeholder="Enter Category SEO Keyword" value="{{ isset($category) ? $category->seo_keyword : '' }}">
                </div>
                <div class="form-group col-md-12">
                  <label for="seocategoryDescription">Category Description</label>
                  <input id="description" type="hidden" name="seo_description" value="{{ isset($category) ? $category->seo_description : '' }}">
                  <trix-editor input="seo_description"></trix-editor>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">{{ isset($category) ? 'Update' : 'Save' }}</button>
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
{{ Html::script('Admin/js/trix.js') }}
@endsection
