@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('css')
{{ Html::style('Admin/css/trix.css') }}
@endsection

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Product</a></li>
      <li class="breadcrumb-item active">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</li>
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
            <form method="POST" action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              @if(isset($product))
              @method('PUT')
              @endif
              <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="productTitle">Product Title</label>
                  <input type="text" name="title" class="form-control" id="productTitle" aria-describedby="productTitleHelp" placeholder="Enter Product Name" value="{{ isset($product) ? $product->title : '' }}">
                </div>
                <div class="form-group">
                  <label for="productCategory">Product Category</label>
                  <select class="form-control" name="category_id" id="productCategory">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                      @if(isset($product))
                        @if($category->id == $product->category_id)
                          selected
                        @endif
                      @endif
                      >{{ $category->title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="productPrice">Price</label>
                  <input type="number" name="price" class="form-control" id="productPrice" value="{{ isset($product) ? $product->price : '' }}">
                </div>
              </div>

                @if(isset($product))
                <div class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="productImage">Product Image</label>
                          <input type="file" name="files[]" class="form-control-file" multiple id="productImage">
                        </div>
                        <div class="col-md-12 my-5">
                          @foreach(json_decode($product->image) as $image)
                          <img src="{{ asset("/storage/products/".$image) }}" width="100">
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>
                @else
                <div class=" col-md-6">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="productImage">Product Image</label>
                        <input type="file" name="files[]" class="form-control-file" id="productImage" multiple accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
                @endif

                <div class="form-group col-md-12">
                  <label for="productDescription">Product Description</label>
                  <input id="description" type="hidden" name="description" value="{{ isset($product) ? $product->description : '' }}">
                  <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group col-md-6">
                  <label for="seoproductTitle">Product SEO Title</label>
                  <input type="text" name="seo_title" class="form-control" id="seoproductTitle" aria-describedby="seoproductTitleHelp" placeholder="Enter Product SEO Title" value="{{ isset($product) ? $product->seo_title : '' }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="seoproductKeyword">Product SEO Keyword</label>
                  <input type="text" name="seo_keyword" class="form-control" id="seoproductKeyword" aria-describedby="seoproductKeywordHelp" placeholder="Enter Product SEO Keyword" value="{{ isset($product) ? $product->seo_keyword : '' }}">
                </div>
                <div class="form-group col-md-12">
                  <label for="seoproductDescription">Product Description</label>
                  <input id="description" type="hidden" name="seo_description" value="{{ isset($product) ? $product->seo_description : '' }}">
                  <trix-editor input="seo_description"></trix-editor>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">{{ isset($product) ? 'Update' : 'Save' }}</button>
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
