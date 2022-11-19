<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        
        <div class="container">
    @auth

   

    <div class="bg-dark rounded shadow-sm text-white my-5 p-3">
        <h1>Albums :</h1>
        <div class="ms-4">
                @foreach ($albums as $album)
                <div class="p-3 mb-5 rounded" style="@if($album->id == 1) background-color:#d8850f @elseif($album->id == 2) background-color:#11226d @elseif($album->id == 3) background-color:#932a62 @else background-color:#fee76b @endif ">
                    <h2>{{$album->name}} <span style="font-size:.9rem">| {{count($album->songs)}} extraits</span></h2> 

                    {!! Form::open(['url' => route('add-song'), 'files' => true])  !!}
                    <div class="row my-3 py-3 ms-3 bg-success rounded">
                        <div class="col-md-3">
                            <input required type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Titre du morceau">
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control form-control-sm" name="lyrics" id="paroles" placeholder="Paroles du morceau" rows="1"></textarea>
                        </div>
                        <div class="col-md-2">
                            <input required class="form-control form-control-sm" name="audio_src" id="formFileSm" type="file">
                        </div>
                        <div class="col-md-1">
                            {{Form::submit("Ok", ['class' => 'btn ms-auto d-block btn-sm btn-light'])}}
                        </div>
                    </div>

                    {!! Form::hidden('album_id', $album->id)!!}
                    {!! Form::close()!!}


                    <div class="row mb-1 ms-3">
                        <div class="col-md-3">
                            Titre :
                        </div>
                        <div class="col-md-6">
                            Paroles :
                        </div>
                        <div class="col-md-3">
                            Audio :
                        </div>
                    </div>
                 
                    @foreach ($album->songs as $song)
                    {!! Form::open(['url' => route('edit-song')])  !!}
                        <div class="row align-items-center mb-3 ms-3" data-id="{{$song->id}}">
                            <div class="col-md-3 d-flex">
                                {!! Form::submit('e', ['class' => 'btn btn-primary btn-sm me-2']) !!}
                                <input name="title" type="text" class="form-control form-control-sm" id="title" value="{{$song->title}}">
                            </div>
                            <div class="col-md-6">
                                <textarea name="lyrics" class="form-control form-control-sm" id="paroles" rows="1">{{$song->lyrics}}</textarea>
                            </div>
                            
                            <div class="col-md-3">
                                <figure class="m-0">
                                    <audio
                                    class="w-100 d-block mt-auto" style="height:30px"
                                        controls
                                        
                                        src="{{ url('storage/albums/'.$album->name.'/'.$song->audio_src) }}">
                                            Your browser does not support the
                                            <code>audio</code> element.
                                    </audio>
                                </figure>
                            </div>
                            </div>
                    {!! Form::hidden('song_id', $song->id)!!}
                    {!! Form::close()!!}
                        @endforeach
                    </div>
                @endforeach
        </div>
            
        </div>

           
        @else
        <h1>aïe</h1>
        @endauth
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
