@extends('clientMaster')
@section('title', 'Trang chủ - Sản phẩm Disnep')
@section('content')


    <!-- Slider -->
    @include('../client/slider/slider')

    <!-- Banner -->
    @include('../client/banner/banner')

    <!-- Product -->
    @include('client/products/product')

@endsection
