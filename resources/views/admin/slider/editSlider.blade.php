

@extends('admin.admin_master')


@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Slider</div>
                        <div class="card-body">
                            <form action="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$sliders->image}}">
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Title</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$sliders->title}}" aria-describedby="emailHelp">
                                  @error('brand_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="{{$sliders->description}}" aria-describedby="emailHelp">
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                  </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Slider Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="image" value="{{$sliders->image}}" aria-describedby="emailHelp">
                                    @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div>
                                    <img src="{{asset($sliders->image)}}" alt="" style="height:200px;width:250px">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
