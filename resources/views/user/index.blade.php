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
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class="table-action-group">
                            <a href="{{route('user.create')}}" class="btn">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add New User</span>
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
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>
                                <div class="status-badge {{$user->status == 1 ? 'active' : 'inactive'}}">
                                    <span class="status-indicator {{$user->status == 1 ? 'active' : 'inactive'}}"></span>
                                    {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </td>




                            <td class="action-group">

                            @if (auth()->user()->role->name == 'super_admin')


                                    @if ($user->status == 1)
                                        <form action="{{ route('user.updateStatus', [$user->id, 0]) }}" method="POST" style="display:inline;">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Deactivate</button>
                                        </form>
                                    @else
                                        <!-- If the user is inactive, allow activation -->
                                        <form action="{{ route('user.updateStatus', [$user->id, 1]) }}" method="POST" style="display:inline;">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-success">Activate</button>
                                        </form>
                                    @endif

                            @endif
                                <a href="{{route('user.edit',[$user])}}" class="action-btn edit" title="Edit">
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                                <form method="POST" action="{{route('user.destroy',$user)}}" onsubmit="return confirmDelete();" class="d-inline">
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
                <div class="clearfix">
                    <div class="pagination">
                        {!! $users->links('vendor.pagination.bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }

    </script>
@endsection
