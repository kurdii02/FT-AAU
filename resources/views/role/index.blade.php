@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Roles <b>Management</b></h2>
                    </div>
                    <div class="table-action-group">
                        <a href="{{route('role.create')}}" class="btn">
                            <i class="fa-solid fa-plus"></i>
                            <span>Add New Role</span>
                        </a>
                        <a href="#" class="btn">
                            <i class="fa-solid fa-file-export"></i>
                            <span>Export to Excel</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                    <td class="action-group">
                        <a href="{{route('role.edit',[$role])}}" class="action-btn edit" title="Edit">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <form method="POST" action="{{route('user.destroy',$role)}}" onsubmit="return confirmDelete();" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }

    </script>
@endsection
