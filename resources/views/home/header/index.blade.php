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
                            <h2>Home Page <b>Management</b></h2>
                        </div>

                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Top Title</th>
                            <th>Title</th>
                            <th>Sub-Title</th>
                            <th>Image</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>

                            <td>{{ $headerContent['subtitle'] }}</td>
                            <td>{{ $headerContent['title'] }}</td>
                            <td>{{ $headerContent['description'] }}</td>
                            <td><img width="50" src="{{ asset('storage/' . $headerContent['image']) }}" alt="">
                            </td>

                            <td class="action-group">


                                <a href="{{ route('header.edit', [$header]) }}" class="action-btn edit" title="Edit">
                                    <i class="fa-solid fa-gear"></i>
                                </a>

                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="pagination">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
