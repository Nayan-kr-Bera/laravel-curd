<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel cure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
     <div class="bg-dark py-3">
        <h3 class="text-white text-center">curd</h3>
     </div>
     <div class="container">
        <div class="row justify-content-center m-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.create')}}" class="btn btn-dark">create</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            @if (Session::has('success')) @endif
            <div class="col-md-10 ">
                <div class="alert alert-success">
                {{Session::get('success')}}
                </div>
              
            </div>
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-3">
                    <div class="card-header bg-black">
                        <h3 class=" text-white">products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>image</th>
                            <th>Name</th>
                            <th>sku</th>
                            <th>price</th>
                            <th>Description</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                        @if ($products-> isNotEmpty() )
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>  
                                @if($product->image != "")
                                <img width="150" src="{{asset('uploads/products/'.$product->image)}}" alt="">
                                @endif
                            </td>
                            <td>{{$product->name}}</td>
                           
                            <td>{{$product->sku}}</td>

                            <td>{{$product->price}}</td>

                            <td>{{$product->description}}</td>

                            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}
                            </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                                <a href="#" onclick="deleteProduct({{$product->id}})" class="btn btn-danger">Delete</a>
                                <form id="delete-product-form-{{$product->id}}" action="{{route('products.delete',$product->id)}}"method="post">
                                 @method('delete')
                                 @csrf
                                </form>
                                
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        </table>
                        
                     </div>
                       
                    </div>
                </div>
            </div>
        </div>
     </div>
  </body>
</html>
<script>
    function deleteProduct(id){
        if(confirm("are you sure you want delete product?")){
            document.getElementById("delete-product-form-"+id).submit();
        }

    }
</script>