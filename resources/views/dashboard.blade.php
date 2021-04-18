@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span>{{ __('Dashboard') }}</span> <span class="pull-right" style="float: right"><a href="/listings/create" class="btn btn-success btn-xs">Add Listings</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>
                        {{ __('Your Listings') }}
                    </h2>
                        @if(count($listings))
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                @foreach ($listings as $listing)
                                <tr>
                                    <td>{{$listing->name}}</td>
                                    <td><a class="pull-right btn btn-default" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\ListingsController@destroy', $listing->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </table>
                        @endif

                </div>
            </div>
        </div>
    </div>

@endsection
