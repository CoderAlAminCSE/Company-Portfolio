
@extends('admin.admin_master')


@section('admin')
    



    <div class="py-12">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{(session('success'))}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                        <div class="card-header"> All Contact Message</div>
                        
                   
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"  width="5%">SL No</th>
                                    <th scope="col"  width="15%">Name</th>
                                    <th scope="col" width="15%">Email</th>
                                    <th scope="col"  width="20%">Subject</th>
                                    <th scope="col"  width="35%">Message</th>
                                    <th scope="col"  width="10%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($messages as $message)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->message}}</td>
                                        <td>
                                            <a href="{{url('/message/delete/'.$message->id)}}" class="btn btn-danger">Delete</a>
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
