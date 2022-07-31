<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         <b> All Brand </b>
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session('success') }}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                            
                        @endif
                        <div class="card-header">
                            All Brand
                        </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Srial No </th>
                        <th scope="col">Brand Name </th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php($i =1) --}}
                        @foreach ($brands as $brand)
                        <tr>
                        {{-- <th scope="row">{{ $i++ }}</th> --}}
                        <th scope="row">{{ $brands->firstitem()+$loop->index }}</th>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="" alt=""></td>
                            <td>
                                @if($brand->created_at == Null)
                                <span class="text-danger"> No Date Founded </span>
                                @else
                                {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                            @endif
                            </td>
                            <td>
                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-dark" >Delete</a>
                            </td>
                      </tr>
                        @endforeach
                        
                            
                    
                    </tbody>
                  </table>
                  {{ $brands->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> All brands
                    </div>
                    <div class="card-body">
                    <form action="{{ route('store.brand') }}" method="POST" enctype="/multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Brand Name</label>
                          <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('brand_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Image</label>
                            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('brand_image')
                              <span class="text-danger"> {{ $message }}</span>
                          @enderror
                          </div>


                          <button type="submit" class="btn btn-primary">Add Brand</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>









</div>
</div>

</x-app-layout>
