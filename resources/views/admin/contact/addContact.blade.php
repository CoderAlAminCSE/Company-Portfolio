@extends('admin.admin_master')


@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.contact')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> Email</label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter About title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"> Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter About title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" name="adress" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
