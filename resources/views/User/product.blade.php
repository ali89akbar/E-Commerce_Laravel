
<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{url('products')}}">view all products <i class="fa fa-angle-right"></i></a>

              <form action="{{url('search')}}" method="" class="form-inline" style="float:right; padding:10px;" >
                @csrf
                <input type="search" class="form-control" placeholder="search" name="search">
                <input type="submit" value="Search" class="btn btn-success">
              </form>
            </div>
          </div>
 
       @foreach($data as $product)

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="300" width="150" src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>${{$product->price}}</h6>
                <p>{{$product->description}}</p>
                <!-- <a class="btn btn-primary" href="">Add to Cart</a> -->
   
                <form action="{{url('addcart',$product->id)}}" method="post">
                  @csrf
                  <input type="number" value="1" min="1" class="form-control " name="quantity" style="width:100px;">
                  <br>
                  <input class="btn btn-primary" value="Add to Cart" type="submit">
                </form>
              </div>
            </div>
          </div>
          @endforeach
          @if(method_exists($data,'links'))

<div class="d-flex justify-content-center">
    {!!$data->links()!!}

</div>
@endif
        </div>
      </div>
    </div>