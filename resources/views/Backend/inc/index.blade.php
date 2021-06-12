@extends('backend.layouts.app')

<!-- @section('title', 'Home Page') -->

@section('content')

Welcome, {{ auth()->guard('admin')->user()->name }}

@endsection('content')
