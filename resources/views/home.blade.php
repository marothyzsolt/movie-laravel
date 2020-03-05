@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @include('components.filter')

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
                        <select name="movie_id">
                            @foreach($movies as $movie)
                                <option value="{{$movie->id}}">
                                    {{$movie->name}} ({{$movie->year}})
                                </option>
                            @endforeach
                        </select>

                        <input type="number" name="acting" value="{{old('acting', 5)}}">
                        <input type="number" name="visual" value="5">
                        <input type="number" name="story" value="5">
                        <input type="number" name="fun" value="5">
                        <input type="number" name="logics" value="5">
                        <input type="number" name="fin" value="5">

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
