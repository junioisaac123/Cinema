@extends('layouts.layout')

@section('content')
    @include('home.hero-slider')

    <!-- =============== START OF TOP MOVIES SECTION =============== -->
    <section class="top-movies2">
        <div class="container">
            <div class="row">
                @php
                    $containerClasses = ['col-sm-6 col-xs-12', 'col-sm-6 d-none d-sm-block', 'd-none d-lg-block', 'd-none d-lg-block'];
                @endphp
                @foreach ($top4movies as $movie)
                    @include('components.movie-item-dark', [
                        'movie' => $movie,
                        'containerClass' => $containerClasses[$loop->index],
                    ])
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== END OF TOP MOVIES SECTION =============== -->

    <!-- =============== START OF HOW IT WORKS SECTION =============== -->
    <section class="how-it-works4 pt50 pb100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">How it works?</h2>
                    <h6 class="subtitle">Feeling confused? start here.</h6>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="icon-box2">
                        <i class="fa fa-film"></i>
                        <h4 class="title">Pick your movie</h4>
                        <p>Browse our extensive and exciting collection of movies. Still don't know what to watch? take a
                            look at our <a href={{ route('movies.index') }} class="text-primary">recommendations.</a></p>
                    </div>

                    <div class="icon-box2">
                        <i class="fa fa-ticket"></i>
                        <h4 class="title">Reserve your ticket</h4>
                        <p>Reserve your ticket to your favourite movie!</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="icon-box2">
                        <i class="icon-login"></i>
                        <h4 class="title">Register</h4>
                        <p>Register your account to reserve and pay for tickets. Also to stay up to date with the latest
                            offers and news.</p>
                    </div>

                    <div class="icon-box2">
                        <i class="icon-heart"></i>
                        <h4 class="title">Enjoy!</h4>
                        <p>Enjoy your movie at one of our cinema rooms, order snacks while you're at it. Your convinence is
                            our priority.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =============== END OF HOW IT WORKS SECTION =============== -->

    <!-- =============== START OF LATEST RELEASES SECTION =============== -->
    <section class="latest-releases bg-light ptb100">
        <div class="container">

            <!-- Start of row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Newest Movies</h2>
                    <h6 class="subtitle">View our latest movies collection.</h6>
                </div>
            </div>
            <!-- End of row -->
        </div>
        <!-- End of Container -->

        <!-- Start of Latest Releases Slider -->
        <div class="owl-carousel latest-releases-slider">
            @each('components.movie-item', $newest_movies, 'movie')
        </div>
        <!-- End of Latest Releases Slider -->

        <div class="text-center pt-3">
            <a class="btn btn-main btn-effect" href="{{ route('movies.index') }}">See All Movies</a>
        </div>
    </section>
    <!-- =============== END OF SUBSCRIBE SECTION =============== -->
@endsection
