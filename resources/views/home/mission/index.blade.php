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
                            <h2 style="text-transform: capitalize">{{ $missionContent->section }} section<b> management</b>
                            </h2>
                        </div>

                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Title</th>
                            <th>Description</th>
                            <th>Mission 1</th>
                            <th>Mission 2</th>
                            <th>Mission 3</th>
                            <th>Image</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>

                            <td>{{ $missionContent->content['title'] }}</td>
                            <td>{{ $missionContent->content['description'] }}</td>
                            <td>{{ $missionContent->content['mission1'] }}</td>
                            <td>{{ $missionContent->content['mission2'] }}</td>
                            <td>{{ $missionContent->content['mission3'] }}</td>
                            <td><img width="50" src="{{ asset('storage/' . $missionContent->content['image']) }}"
                                    alt="">
                            </td>

                            <td class="action-group">


                                <a href="{{ route('mission.edit', [$missionContent]) }}" class="action-btn edit"
                                    title="Edit">
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
