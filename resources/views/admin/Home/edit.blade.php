@extends('admin.admin_master')


@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit About</h2>
        </div>
        <div class="card-body">
            <form action="{{url('update/HomeAbout/'.$editDatas->id)}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> Title</label>
                    <input type="text" name="title" value="{{$editDatas->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter About title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea  class="form-control" name="short_desc"  id="exampleFormControlTextarea1" rows="3">{{$editDatas->long_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea  class="form-control" name="long_desc"  id="exampleFormControlTextarea1" rows="3"> {{$editDatas->long_desc}}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
