@extends("layouts.base")

@section('title', 'hello')
@section('html-head')
@parent
<!-- comment -->
@endsection



@section('body')
@parent
<br/>
hello
@endsection
