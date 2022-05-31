<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('dashboard')}}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="title" :value="__('Movie title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                required autofocus placeholder="Enter a movie title..." />
                        </div>



                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-3">
                                {{ __('Search') }}
                            </x-button>
                        </div>
                    </form>
                    <form method="post" action="{{route('randomCategory')}}">
                        @csrf
                        <input type="submit" value="Surprise me" class="btn btn-primary">
                    </form>
                    <div class="container">
                    @foreach ($movies as $movie)
                        @if ($loop->index % 3 == 0)
                            <div class="row py-6">
                        @endif
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem; height: 32rem;">
                                <img src="{{ $movie->Poster }}" class="card-img-fluid" style="height: 22rem" alt="{{ $movie->Title }}">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{ $movie->Title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $movie->Year }}</h6>
                                    @auth
                                        @if (\App\Http\Controllers\AuthenticatedMovieController::isFavorite($movie->imdbID))
                                        <form style="padding-top: 2rem;" action="{{route('deleteFavorite')}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="movie_id" value="{{ $movie->imdbID}}">
                                            <button class="" type="submit"><i class="fa-regular fa-square-minus"></i> Remove</button>
                                        </form>
                                        @else
                                        <form style="padding-top: 2rem;" action="{{route('addFavorite')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="movie_id" value="{{ $movie->imdbID}}">
                                            <button class="btn btn-outline-primary" type="submit"><i class="fa-regular fa-square-plus"></i> Favorite</button>
                                        </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration % 3 == 0)
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
                        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                        crossorigin="anonymous">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                                        crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
