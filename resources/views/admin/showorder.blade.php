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
                <tr style="background-color:gray;">
                    <td style="padding:20px;">Customer Name</td>
                    <td style="padding:20px;">Phone</td>
                    <td style="padding:20px;">Address</td>
                    <td style="padding:20px;">Product Title</td>
                    <td style="padding:20px;">Price</td>
                    <td style="padding:20px;">Quantity</td>
                    <td style="padding:20px;">Status</td>
                    <td style="padding:20px;">Action</td>
                </tr>
                @foreach($order as $orders)
                <tr style="background-color:black;">
                    <td  style="padding:20px">{{$orders->name}}</td>
                    <td style="padding:20px">{{$orders->phone}}</td>
                    <td style="padding:20px">{{$orders->address}}</td>
                    <td style="padding:20px">{{$orders->product_name}}</td>
                    <td style="padding:20px">{{$orders->price}}</td>
                    <td style="padding:20px">{{$orders->quantity}}</td>
                    <td style="padding:20px">{{$orders->status}}</td>
                    <td style="padding:20px;">
                        <a href="{{url('updatestatus',$orders->id)}}" class="btn btn-success">Delieved</a>
                    </td>
                </tr>
                @endforeach

            </table>
            </div>
            </div>
          @include('admin.script')
          <!-- End custom js for this page -->
  </body>
</html>
