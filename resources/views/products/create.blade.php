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
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
            <div class="container">
        <div class="row justify-content-center m-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
                <div class="card border-0 shadow-lg my-3">
                    <div class="card-header bg-black">
                        <h3 class=" text-white">create product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{Route('products.store')}}" method='post'>
                        @csrf
                       <div class="card-body">
                            <div class="mb-3">
                               <label for="name" class="form-lable h6">Name</label>
                                <input type="text" class="form-control form-control-lg   @error('name') is-invalid @enderror " placeholder="name" name="name" value="{{old('name')}}">
                                @error('name')
                                <p class="invalid-message">{{$message}}</p>
                                @enderror

                            </div>
                       
                         <div class="mb-3">
                            <label for="sku" class="form-lable h6">sku</label>
                            <input type="text" class="form-control form-control-lg @error('sku') is-invalid @enderror" placeholder="sku" name="sku"  value="{{old('sku')}}">
                            @error('sku')
                                <p class="invalid-message">{{$message}}</p>
                                @enderror

                         </div>
                         <div class="mb-3">
                            <label for="price" class="form-lable h6">price</label>
                            <input type="number" class="form-control form-control-lg @error('price') is-invalid @enderror" placeholder="price" name="price"  value="{{old('price')}}">
                            @error('price')
                                <p class="invalid-message">{{$message}}</p>
                                @enderror

                         </div>
                         <div class="mb-3">
                            <label for="description" class="form-lable h6">Description</label>
                            <textarea name="description"  class="form-control form-control-lg"  value="{{old('description')}}" ></textarea>
                         </div>
                         <div class="mb-3">
                            <label for="image" class="form-lable h6">image</label>
                            <input type="file" class="form-control form-control-lg"  value="{{old('image')}}" name="image">
                         </div>
                         <div class="d-grid">
                            <button class="btn btn-lg btn-secondary">submit</button>
                        </div>
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
     </div>
  </body>
</html>