@extends('layout')

@section('head:meta')
<meta name="robots" content="noindex">
@endsection

@section('link:stylesheet')
  <!-- Styles -->
  <link href="{{ mix('/css/not-found.css') }}" rel="stylesheet" async>
@endsection

@section('head:script')
@endsection

@section('body')
<div class="not-found"></div>
@endsection
