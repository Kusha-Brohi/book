@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Storycontent {{ $storycontent->id }}</h3>
                    @can('view-'.str_slug('Storycontent'))
                        <a class="btn btn-success pull-right" href="{{ url('/admin/storycontent') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $storycontent->id }}</td>
                            </tr>
                            <tr><th> Story Id </th><td> {{ $storycontent->story_id }} </td></tr><tr><th> Title </th><td> {{ $storycontent->title }} </td></tr><tr><th> Descrtiption </th><td> {{ $storycontent->descrtiption }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection

