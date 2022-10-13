@extends('layouts.master')
@section('title', 'All Drops')
@section('heading', 'All Drops')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
        <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">All Drops</h4>
    </div>
    <div class="card-body">
        @if(count($drops)  > 0)
        <div class="table-responsive">
        <table class="table table-shopping">
            <thead>
                <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>Eye Type</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($drops as $drop)
            <tr>
                <td>
                    <div style="height:150px;">
                        <img class="img-fluid h-100" src="{{asset($drop->image)}}" alt="{{$drop->name}}">
                    </div>
                </td>
                <td>{{$drop->name}}</td>
                <td>{{$drop->is_left == true && $drop->is_right == true ? "Both Eyes" : ($drop->is_left == true ? "Left Eye" : ($drop->is_right == true ? "Right Eye" : "None"))}}</td>
                <td>{{$drop->is_active == true ? "Active" : "Inactive"}}</td>
                <td class="td-actions text-right">
                    <a href="{{route('editDrop', $drop->id)}}" rel="tooltip" class="btn btn-success btn-link">
                        <i class="material-icons">edit</i>
                    </a>
                    <form class="d-inline" action="{{route('deleteDrop', $drop->id)}}" method="post">
                        @csrf
                        <button  rel="tooltip" class="btn btn-danger btn-link">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        @else
        <h2 class="text-center">No Record Found</h2>
        @endif
    </div>
    </div>
</div>
</div>
@endsection