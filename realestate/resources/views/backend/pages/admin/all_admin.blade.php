@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toogle/2.2.2/css/bootstrap-toogle.min.css" rel="stylesheet">

<div class="page-content">
    <nav class="page_breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.admin')}}" class="btn btn-inverse-info">Add admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6>Admin All</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alladmin as $key=>$item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{(!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/download.jpeg')}}" style="width: 60px;height:40px;">
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        @foreach($item->roles as $role)
                                            <span class="badge badge-pill bg-danger">{{$role->name}}</span>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        <a href="{{route('edit.admin',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                                        <a href="{{route('delete.admin',$item->id)}}" class="btn btn-warning" title="delete" id="delete"><i data-feather="delete"></i></a>
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
</div>

@endsection
