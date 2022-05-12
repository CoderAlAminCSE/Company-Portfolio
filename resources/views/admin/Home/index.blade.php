
@extends('admin.admin_master')


@section('admin')
    



    <div class="py-12">
        <div class="container">
            <div class="row">
                <a href="{{route('add.about')}}"><button class="btn btn-primary mb-3">Add About</button></a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{(session('success'))}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                        <div class="card-header"> All Home Data</div>
                        
                   
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"  width="5%">SL No</th>
                                    <th scope="col"  width="15%">Title</th>
                                    <th scope="col" width="15%">Short Desc</th>
                                    <th scope="col"  width="20%">Long Desc</th>
                                    <th scope="col"  width="15%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($homeAbouts as $homeAbout)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{$homeAbout->title}}</td>
                                        <td>{{$homeAbout->short_desc}}</td>
                                        <td>{{$homeAbout->long_desc}}</td>
                                        <td>
                                            <a href="{{url('/home/edit/'.$homeAbout->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('/home/delete/'.$homeAbout->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
