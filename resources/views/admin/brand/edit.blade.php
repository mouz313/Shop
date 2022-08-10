<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         <b> Edit Brand </b>
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

            <div class="col-md-4"> 
                <div class="card">
                    <div class="card-header"> Edit Brand
                    </div>
                    <div class="card-body">
                    <form action="{{ url('/brand/update/'.$brands->id) }} " method="POST">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Update Brand Name</label>
                          <input type="text" name="brand_name" value="{{ $brands->brand_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('brand_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Brand Image</label>
                            <input type="file" name="brand_image" value="{{ $brands->brand_image }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('brand_image')
                              <span class="text-danger"> {{ $message }}</span>
                          @enderror

                          <div class="form-group">
                            <img src="{{ asset($brands->brand_image) }}" style="width: 400px; height=200px;">
                          </div>
        
                          <button type="submit" class="btn btn-primary"> Update Brand</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
