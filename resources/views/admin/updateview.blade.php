<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
     @include('admin.css')
     <style>
        .title{
            color:white; padding-top:25px; font-size:25px;
        }
        label{
            display: inline-block;
            width:200px;
        }
        </style>
     </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
@include('admin.navbar')
        <!-- partial -->
          <!-- partial -->

          <div class="container-fluid page-body-wrapper">
<div class="container" align="center">
 <h1 class="title">Update Products</h1>

 @if(session()->has('message'))
 <div class="alert alert-success">

 <button type="button" class="close" data-dismiss="alert">x</button>
 {{session()->get('message')}}

</div>
@endif
 <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data" >
    @csrf     
 <div style="padding:15px;">
            <label for="">Product title</label>
            <input style="color:black;" type="text" name="title" value="{{$data->title}}" required="">
        </div>

        <div style="padding:15px;">
            <label for="">Product Price</label>
            <input style="color:black;" type="number" name="price" value="{{$data->price}}" required="">
        </div>
        <div style="padding:15px;">
            <label for="">Product description</label>
            <input style="color:black;" type="text" name="description" value="{{$data->description}}" required="">
        </div>
        <!-- <div style="padding:15px;">
            <label for="">Product quantity</label>
            <input type="text" name="quantity" placeholder="Give a product quantity" required="">
        </div> -->
        <div style="padding:15px;">
            <label for="">Product quantity</label>
            <input style="color:black;" type="text" name="quantity" value="{{$data->quantity}}" required="">
        </div>  
        <div style="padding:15px;">
            <!-- <label for="">Product File</label> -->
             <label for="">Product Image</label>
             <img height="100" width="150" src="/productimage/{{$data->image}}" alt="">
        </div>
        <div style="padding:15px;">
            <!-- <label for="">Product File</label> -->
            <input  type="file" name="file" placeholder="Give a product File" >
        </div>
        <div style="padding:15px;">
            <input class="btn btn-success" type="submit" >
        </div>
</form>
 </div>
</div>
 @include('admin.script')
          <!-- End custom js for this page -->
  </body>
</html>
