<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
     @include('admin.css')
     </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
@include('admin.navbar')
        <!-- partial -->
        <div style="padding-bottom:30px" class="container-fluid page-body-wrapper">
        <div class="container" align="center">
        @if(session()->has('message'))
 <div class="alert alert-success">

 <button type="button" class="close" data-dismiss="alert">x</button>
 {{session()->get('message')}}

</div>
@endif
            <table>
                <tr style="backgound-color:gray;">
                    <td style="padding:20px;">Title</td>
                    <td style="padding:20px;">Description</td>
                    <td style="padding:20px;">Price</td>
                    <td style="padding:20px;">Quantity</td>
                    <td style="padding:20px;">Image</td>
                    <td style="padding:20px;">Update</td>
                    <td style="padding:20px;">Delete</td>

                </tr>
                @foreach($data as $product)
                <tr align="center" style="background-color:black; ">
                    <td style="padding:20px;">{{$product->title}}</td>
                    <td style="padding:20px;">{{$product->description}}</td>
                    <td style="padding:20px;">{{$product->price}}</td>
                    <td style="padding:20px;">{{$product->quantity}}</td>
                    <td style="padding:20px;"><img height="200" width="200" src="/productimage/{{$product->image}}" alt=""></td>
<td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a></td>
<td><a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}">Danger</a></td>

                </tr>
@endforeach
            </table>
            </div>
            </div>          <!-- partial -->
 @include('admin.script')
          <!-- End custom js for this page -->
  </body>
</html>
