@extends('layout', ['title' => 'Home '])

@section('page-content')

    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h3>HidwayCafe</h3>
                            <h4>THE BEST EXPERIENCE</h4>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            @foreach ($banners as banner)
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('assets/images' . $banner->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
