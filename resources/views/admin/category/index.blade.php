<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         <b> All Category </b>
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
                            All Categories
                        </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Srial No </th>
                        <th scope="col">Category Name </th>
                        <th scope="col">User Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php($i =1) --}}
                        @foreach ($categories as $category)
                        <tr>
                        {{-- <th scope="row">{{ $i++ }}</th> --}}
                        <th scope="row">{{ $categories->firstitem()+$loop->index }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>
                                @if($category->created_at == Null)
                                <span class="text-danger"> No Date Founded </span>
                                @else
                                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                            @endif
                            </td>
                            <td>
                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-dark" >Delete</a>
                            </td>
                      </tr>
                        @endforeach
                        
                            
                    
                    </tbody>
                  </table>
                  {{ $categories->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> All Categories
                    </div>
                    <div class="card-body">
                    <form action="{{ route('store.category') }} " method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">categoary Name</label>
                          <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('category_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>
                          <button type="submit" class="btn btn-primary">Add Categories</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>











    <div class="container">
        <div class="row">
    <div class="col-md-8">
        {{-- <div class="card">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                
            @endif --}}
            <div class="card-header">
                Trash List
            </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Srial No </th>
            <th scope="col">Category Name </th>
            <th scope="col">User Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            {{-- @php($i =1) --}}
            @foreach ($trachCat as $category)
            <tr>
            {{-- <th scope="row">{{ $i++ }}</th> --}}
            <th scope="row">{{ $categories->firstitem()+$loop->index }}</th>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->user->name }}</td>
                <td>
                    @if($category->created_at == Null)
                    <span class="text-danger"> No Date Founded </span>
                    @else
                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                @endif
                </td>
                <td>
                    <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
                    <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-dark" >P Delete</a>
                </td>
          </tr>
            @endforeach
            
                
        
        </tbody>
      </table>
      {{ $trachCat->links() }}
    </div>
</div>
<div class="col-md-4">

</div>
</div>
</div>

</x-app-layout>
