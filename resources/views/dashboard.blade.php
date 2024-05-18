@extends('layout')

@section('content')
    aja
    {!! $chart->container() !!}

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
