<div class="sidenav" id="mySidenav">

<div class="d-flex justify-content-center">
  <a href="javascript:void(0)" class="backbtn" id="prevBtn" onclick="nextPrev(-1)">⇽</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
</div>

  <div class="side_nav tab" id="custom-accordion">
    @foreach($prod_var as $key => $p)
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input lense-input my-0" type="radio" name="exampleRadios" data-value="{{ $p->id }}" value="{{ $p->lense->id }}" @if($key == 0) checked @endif>
          <h4 class="side_h4">{{ $p->lense->title }}</h4>
          <p class="p">{{ $p->lense->description }}</p>
        </label>
      </div>
      <div class="mirror-group" @if($key == 0) style="display: block;" @endif>
        @foreach($p->productmirrors as $k => $mirror)
          <div class="form-group form-check ml-3">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input mirror-input" name="exampleCheck" value="{{ $mirror->mirror->id }}">
              <h4 class="side_h4">{{ $mirror->mirror->title }} - ₹ {{ $mirror->price }}</h4>
              <p class="p">{{ $mirror->mirror->description }}</p>
            </label>
          </div>
        @endforeach
    </div>
  @endforeach

  <hr>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input lense-input my-0" type="radio" name="exampleRadios" value="">
        <h4 class="side_h4">No Lense Need Only Frame</h4>
      </label>
      <label class="form-check-label">
        <input type="hidden" name="exampleCheck" value="">
        <!-- <h4 class="side_h4">No Lense Need Only Frame</h4> -->
      </label>
    </div>

  </div>

  <div class="tab mx-3">
    <h5>
        Right Eye Number
    </h5>
    <form>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="rightspherical" placeholder="Right Spherical">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="rightclyindrical" placeholder="Right Clyindrical">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="rightaxis" placeholder="Right Axis">
        </div>
      </div>
    </form>
    <h5>
        Left Eye Number
    </h5>
    <form>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="leftspherical" placeholder="Left Spherical">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="leftclyindrical" placeholder="Left Clyindrical">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="leftaxis" placeholder="Left Axis">
        </div>
      </div>
    </form>
  </div>

  <div class="prodbtn" id="prod-lense">
    <input type="hidden" class="product_id" value="{{ $product->id }}">
    <input type="hidden" class="qty-input" value="1">
    <input type="hidden" class="url" value="{{ route('home.cart.store') }}">
    <span type="submit" class="btn_prod" id="add-to-cart" onclick="nextPrev(1)">Select Lens</span>
  </div>
</div>
