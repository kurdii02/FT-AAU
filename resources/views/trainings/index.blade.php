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
                            <h2>Training <b>Management</b></h2>
                        </div>
                        <div class="table-action-group">
                            <a href="{{route('trainings.create')}}" class="btn">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add New Training</span>
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
                        <th>Student Name</th>
                        <th>Admin Name</th>
                        <th>Trainer Name</th>
                        <th>Company</th>
                        <th>Training Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($trainings as $relation)
                        <tr>
                            <td>{{$relation->student->id}}</td>
                            <td>{{$relation->student->name}}</td>
                            <td>{{$relation->admin->name}}</td>
                            <td>{{$relation->trainer->name}}</td>
                            <td>{{ $relation->company->name ?? 'N/A' }}</td>


                            <td>
                                <div class="status-badge">
                                    <span class="status-indicator"></span>
                                    Active
                                </div>
                            </td>
                            <td class="action-group">
                                <a href="{{route('trainings.edit',[$relation])}}" class="action-btn edit" title="Edit">
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                                <form method="POST" action="{{route('trainings.destroy',$relation)}}" onsubmit="return confirmDelete();" class="d-inline">
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