@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Movie list

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Rating</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{$movie->id}}</td>
                                <td>{{$movie->name}}</td>
                                <td>{{$movie->year}}</td>
                                <td>{{($movie->stars)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <hr>

                    @include('layouts.errors')

                    <form action="{{route('users.movies.save')}}" method="post">
                        @csrf
                        <select name="movie">
                            @foreach($movies as $movie)
                                <option value="{{$movie->id}}">
                                    {{$movie->name}} ({{$movie->year}})
                                </option>
                            @endforeach
                        </select>

                        <input type="number" name="acting" value="5">

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
