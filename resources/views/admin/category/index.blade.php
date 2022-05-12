<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <b>All Category</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{(session('success'))}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                        <div class="card-header"> All Category</div>
                   
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"> Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    
                                    @foreach ($categoriesData as $categoriesDatas)
                                    <tr>
                                        <th scope="row">{{ $categoriesData -> firstItem()+$loop -> index }}</th>
                                        <td>{{$categoriesDatas->category_name}}</td>
                                        <td>{{$categoriesDatas->user->name}}</td>
                                        <td>{{$categoriesDatas->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{url('/category/edit/'.$categoriesDatas->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('/softDelete/category/'.$categoriesDatas->id)}}" class="btn btn-danger">Trash</a>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categoriesData->Links()}}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" aria-describedby="emailHelp">
                                  @error('category_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- Trash Part --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Trash List</div>
           
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col"> Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            
                            @foreach ($trashCat as $trashData)
                            <tr>
                                <th scope="row">{{ $trashCat -> firstItem()+$loop -> index }}</th>
                                <td>{{$trashData->category_name}}</td>
                                <td>{{$trashData->user->name}}</td>
                                <td>{{$trashData->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{url('/category/restore/'.$trashData->id)}}" class="btn btn-primary">Restore</a>
                                    <a href="{{url('/category/forceDelete/'.$trashData->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    {{$trashCat->Links()}}
            </div>
        </div>
    </div>
</div>
{{-- End Trash --}}
