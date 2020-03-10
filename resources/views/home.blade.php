@extends('layout')

@section('head:meta')

@endsection

@section('link:stylesheet')
  <!-- Styles -->
  <link href="{{ mix('/css/hexolus.css') }}" rel="stylesheet" async>
@endsection

@section('head:script')
  <!-- Scripts -->
  <script src="{{ mix('/js/hexolus.js') }}" defer></script>
@endsection
