@extends('layout', ['title' => 'Home'])

@section('page-content')
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <!-- Left -->
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

                <!-- Right: Banner Slider -->
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            @forelse ($banners as $banner)
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('assets/images/' . ltrim($banner->image ?? '', '/')) }}"
                                            alt="Banner">
                                    </div>
                                </div>
                            @empty
                                {{-- Fallback bila tidak ada banner --}}
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('assets/images/banner-default.jpg') }}" alt="Banner">
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        // Ambil satu data about_us (yang pertama) untuk ditampilkan
        $a_us = $about_us->first();
        $title = $a_us->title ?? 'Welcome to Midway Dine';
        $desc = $a_us->description ?? null;
        $thumb1 = $a_us->image1 ?? null;
        $thumb2 = $a_us->image2 ?? null;
        $thumb3 = $a_us->image3 ?? null;
        $yt = $a_us->youtube_link ?? '#';
        $vdImg = $a_us->vd_image ?? null;
    @endphp

    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <!-- Kiri -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>{{ $title }}</h2>
                            @if (!empty($desc))
                                <p>{!! nl2br(e($desc)) !!}</p>
                            @endif
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/about-thumb-01.jpg') }}" alt="">

                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/about-thumb-02.jpg') }}" alt="">
                                {{-- <img src="{{ $thumb2 ? asset('assets/images/' . ltrim($thumb2, '/')) : asset('assets/images/about-thumb-02.jpg') }}"
                                    alt="About 2"> --}}
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/about-thumb-01.jpg') }}" alt="">
                                {{-- <img src="{{ $thumb3 ? asset('assets/images/' . ltrim($thumb3, '/')) : asset('assets/images/about-thumb-03.jpg') }}"
                                    alt="About 3"> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="right-content">
                        <div class="thumb position-relative">
                            {{-- Tombol play hanya aktif kalau ada link --}}
                            <a rel="nofollow" href="{{ $yt ?: '#' }}" target="_blank"
                                @if (!$a_us || !$yt || $yt === '#') aria-disabled="true" @endif>
                                <i class="fa fa-play"></i>
                            </a>

                            {{-- <img src="{{ $vdImg ? asset('assets/images/' . ltrim($vdImg, '/')) : asset('assets/images/video-placeholder.jpg') }}"
                                alt="About Video"> --}}
                            <img src="{{ asset('assets/images/about-video-bg.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Menu --}}
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Hidway week</h6>
                        <h2>Special Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                            <li><a href="#tab-1"><img src="{{ asset('assets/images/tab-icon-01.png') }}"
                                                        alt=""></a></li>
                                            <li><a href="#tab-1"><img src="{{ asset('assets/images/tab-icon-02.png') }}"
                                                        alt=""></a></li>
                                            <li><a href="#tab-1"><img src="{{ asset('assets/images/tab-icon-03.png') }}"
                                                        alt=""></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
