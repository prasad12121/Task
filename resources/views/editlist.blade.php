@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="{{route('post.save')}}">
        @csrf
        <input type="hidden" name="id" value="{{$userData->id}}">
        Name: <input type="text" name="name" value="{{$userData->name}}"><br><br>
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        Email:<input type="text" name="email" value="{{$userData->email}}"><br><br><br>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        <input type="submit" value="submit">
    </form>
</div>


@endsection
