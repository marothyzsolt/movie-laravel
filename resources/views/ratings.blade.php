@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Ratings</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>movie_id</th>
                            <th>movie_name</th>
                            <th>acting</th>
                            <th>visual</th>
                            <th>story</th>
                            <th>fun</th>
                            <th>logics</th>
                            <th>fin</th>
                            <th>AVG</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                            @foreach($ratings as $rating)
                            <tr>
                                <td>{{$rating->movie_id}}</td>
                                <td>{{$rating->movie->name}}</td>
                                <td>{{$rating->acting}}</td>
                                <td>{{$rating->visual}}</td>
                                <td>{{$rating->story}}</td>
                                <td>{{$rating->fun}}</td>
                                <td>{{$rating->logics}}</td>
                                <td>{{$rating->fin}}</td>
                                <td>{{$rating->avg}}</td>
                                <td>
                                    @if($rating->trashed())
                                        <a class="btn btn-success" href="{{route('users.ratings.delete.restore', ['rating' => $rating->id])}}">RESTORE</a>
                                        <a class="btn btn-danger" href="{{route('users.ratings.delete.force', ['rating' => $rating->id])}}">X</a>
                                    @else
                                        <a class="btn btn-danger" href="{{route('users.ratings.delete', ['rating' => $rating->id])}}">X</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
