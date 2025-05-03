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
                            <h2 style="text-transform: capitalize">{{ $featuresContent->section }} section<b> management</b>
                            </h2>
                        </div>

                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Feature 1</th>
                            <th>Description 1</th>
                            <th>Feature 2</th>
                            <th>Description 2</th>
                            <th>Feature 3</th>
                            <th>Description 3</th>


                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>

                            <td>{{ $featuresContent->content['title'] }}</td>
                            <td>{{ $featuresContent->content['sub_title'] }}</td>
                            <td>{{ $featuresContent->content['feature1'] }}</td>
                            <td>{{ $featuresContent->content['feature1_description'] }}</td>
                            <td>{{ $featuresContent->content['feature2'] }}</td>
                            <td>{{ $featuresContent->content['feature2_description'] }}</td>
                            <td>{{ $featuresContent->content['feature3'] }}</td>
                            <td>{{ $featuresContent->content['feature3_description'] }}</td>


                            <td class="action-group">


                                <a href="{{ route('features.edit', [$featuresContent]) }}" class="action-btn edit"
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
