@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('css')
@endsection

@section('content')

<main>
  <div class="container-fluid">
    <h1 class="mt-4">{{ isset($prod_var) ? 'Edit Product Variant' : 'Add Product Variant' }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Product</a></li>
        <li class="breadcrumb-item active">Add Product Variant</li>
    </ol>
    <div class="row">
      <div class="col-md-12 col-xs-12">
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
        <form method="POST" action="{{ isset($prod_var) ? route('admin.productvariant.update', ['product' => $product->id, 'productvariant' => $prod_var->id  ]) : route('admin.productvariant.store', $product->id) }}" enctype="multipart/form-data">
          <div class="card mb-4">  
            <div class="card-body">
              {!! csrf_field() !!}
                @if(isset($prod_var))
                  @method('PUT')
                @endif
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="productTitle">Product Title</label>
                    <input type="text" name="title" class="form-control" id="productTitle" aria-describedby="productTitleHelp" placeholder="Enter Product Name" value="{{ isset($product) ? $product->title : '' }}" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="productPrice">Price</label>
                    <input type="number" name="price" class="form-control" id="productPrice" value="{{ isset($product) ? $product->price : '' }}" disabled>
                </div>
                <div class="form-group col-md-12">
                  <label for="productCategory">Product Category</label>
                  <select class="form-control" name="category_id" id="productCategory" disabled>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}"
                        @if(isset($product))
                          @if($category->id == $product->category_id)
                            selected
                          @endif
                        @endif
                      >
                        {{ $category->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

                <!-- <div class="form-group col-md-4">
                  <label for="productLense">Lense</label>
                  <select class="form-control" name="lense_id" id="productLense">
                    @foreach($lenses as $lense)
                      <option value="{{ $lense->id }}"
                        @if(isset($prod_var))
                          @if($lense->id == $prod_var->lense_id)
                            selected
                          @endif
                        @endif
                      >
                        {{ $lense->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="productMirror">Mirror</label>
                  <select class="form-control" name="mirror_id" id="productMirrore">
                    @foreach($mirrors as $mirror)
                      <option value="{{ $mirror->id }}"
                        @if(isset($prod_var))
                          @if($mirror->id == $prod_var->mirror_id)
                            selected
                          @endif
                        @endif
                      >
                        {{ $mirror->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="productvarPrice">Price</label>
                  <input type="number" name="price" class="form-control" id="productvarPrice" aria-describedby="productTitleHelp" placeholder="Enter Price" value="{{ isset($prod_var) ? $prod_var->price : '' }}">
                </div> -->

              <div class="card my-4">
                <div class="card-body">
                  <div>
                    <div class="form-group row">
                      <label for="productLense" class="col-md-3">Lense</label>
                      <div class="col-md-4">
                        <select class="form-control" class="col-md-6" name="lense_id" id="productLense">
                          @foreach($lenses as $lense)
                            <option value="{{ $lense->id }}"
                              @if(isset($prod_var))
                                @if($lense->id == $prod_var->lense_id)
                                  selected
                                @endif
                              @endif
                            >
                              {{ $lense->title }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <a type="button" name="button" class="text-success col-md-3 mt-1" id="add" href="javascript:void(0);">
                        <i class="fas fa-plus mr-1"></i>
                        Add Mirror
                      </a>
                    </div>
                    <div id="dynamicRow">
                    @if(isset($prod_var))
                      @foreach($prod_mirror as $m)
                        <div class="row input-row">
                          <div class="form-group col-md-5">
                            <label for="productMirror">Mirror</label>
                            <select class="form-control" name="addmore[0][mirror_id]" id="productMirror">
                              @foreach($mirrors as $mirror)
                                <option value="{{ $mirror->id }}"
                                  @if(isset($prod_var))
                                    @if($mirror->id == $m->mirror_id)
                                      selected
                                    @endif
                                  @endif
                                >
                                  {{ $mirror->title }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-5">
                            <label for="productvarPrice">Price</label>
                            <input type="number" name="addmore[0][price]" class="form-control" id="productvarPrice" aria-describedby="productTitleHelp" placeholder="Enter Price" value="{{ isset($prod_var) ? $m->price : '' }}">
                          </div>
                        </div>
                        @endforeach
                      @else
                      <div class="row input-row">
                        <div class="form-group col-md-5">
                          <label for="productMirror">Mirror</label>
                          <select class="form-control" name="addmore[0][mirror_id]" id="productMirror">
                            @foreach($mirrors as $mirror)
                              <option value="{{ $mirror->id }}"
                                @if(isset($prod_var))
                                  @if($mirror->id == $prod_var->mirror_id)
                                    selected
                                  @endif
                                @endif
                              >
                                {{ $mirror->title }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="productvarPrice">Price</label>
                          <input type="number" name="addmore[0][price]" class="form-control" id="productvarPrice" aria-describedby="productTitleHelp" placeholder="Enter Price" value="{{ isset($prod_var) ? $prod_var->price : '' }}">
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2 ml-2">{{ isset($prod_var) ? 'Update' : 'Save' }}</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
      </div>
    </div>
  </div>
</main>

@endsection('content')

@section('scripts')
<script type="text/javascript">
  var i = 0;
  var addButton = $('#add'); //Add button selector
  var wrapper = $('#dynamicRow'); //Input field wrapper
  $(addButton).click(function(){
    ++i;
    $(wrapper).append('<div class="row input-row"> <div class="form-group col-md-5">   <label for="productMirror">Mirror</label>    <select class="form-control" name="addmore['+i+'][mirror_id]" id="productMirror">      @foreach($mirrors as $mirror)          <option value="{{ $mirror->id }}" @if(isset($prod_var))        @if($mirror->id == $prod_var->mirror_id)        selected            @endif         @endif>                {{ $mirror->title }}              </option>      @endforeach       </select>       </div>        <div class="form-group col-md-5">      <label for="productMirror">Price</label>      <input type="number" name="addmore['+i+'][price]" class="form-control" id="productvarPrice" aria-describedby="productTitleHelp" placeholder="Enter Price" value="{{ isset($prod_var) ? $prod_var->price : '' }}">        </div>        <a type="button" name="button" class="text-danger col-md-1 mt-3 remove-row" href="javascript:void(0);">          <i class="fas fa-minus mr-1"></i>        </a>  </div> ');
  });

  $(wrapper).on('click', '.remove-row', function(e){
    e.preventDefault();
    $(this).parent('.input-row').remove();
    i--;
  });
</script>
@endsection
