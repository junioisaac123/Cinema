<div class="col-lg-3 col-md-6 {{ $containerClass }}">
    <div class="movie-box-4">
        <div class="listing-container">

            <!-- Movie List Image -->
            <div class="listing-image">
                <!-- Image -->
                <img src={{ $movie->image }} alt="">
            </div>

            <!-- Movie List Content -->
            <div class="listing-content">
                <div class="inner">
                    <h2 class="title">{{ $movie->title }}</h2>

                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-main btn-effect">details</a>
                </div>
            </div>

        </div>
    </div>
</div>
