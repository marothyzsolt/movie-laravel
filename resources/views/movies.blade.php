@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Movie DB</div>

                    <div class="card-body">
                        <form action="{{route('movies.search')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input value="{{old('name')}}" placeholder="Movie Name" class="form-control" type="text" name="name">
                                <input class="form-control" type="submit" value="Search">
                            </div>
                        </form>

                        @if(Session::has('movies'))
                            <table class="table table-striped">
                                @foreach(Session::get('movies') as $movie)
                                    <tr>
                                        <td>
                                            <img src="{{$movie->getThumbnailImage()}}" width="48" alt="">
                                        </td>
                                        <td>{{$movie->getHungarianTitle()}}</td>
                                        <td>{{$movie->getYear()}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
