@extends('layouts.base')

@section('content')

<form action="{{route('post.store')}}" method="post">

    @csrf
    @method('POST')

    <label for="title">title</label>
    <input type="text" name='title' value=''> 
    <br>
    <label for="slug">slug</label>
    <input type="text" name='slug' value=''>
    <br>
    {{-- se ai post voglio avere la possibilità di associare dei tag ? --}}
    {{-- per gestire il passaggio di dati nella select usiamo il name --}}
    <select name ='tags[]' multiple>
        @foreach ($tags as $tag)
        {{-- nella value della option metto l'id perchè 
        cosi posso risalire al tag associato ai post
        ed è il valore che mi vado a cercare nel controller --}}
         <option value="{{$tag -> id}}">
                {{$tag -> title}}
            </option>
        @endforeach
       

    </select>
    <input type="submit" value="Create">
</form>

@endsection