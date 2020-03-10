@extends('layout')

@section('head:meta')
@endsection

@section('link:stylesheet')
  <!-- Styles -->
  <link href="{{ mix('/css/maintenance.css') }}" rel="stylesheet" async>
@endsection

@section('head:script')
@endsection

@section('body')
<div class="maintenance"></div>
@endsection
