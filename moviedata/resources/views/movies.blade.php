@foreach ($movies as $movie)
<div class="card" style="width: 18rem;">
    <img src="{{$movie->Poster}}" class="card-img-top" alt="{{$movie->Title}}">
    <div class="card-body">
        <h5 class="card-title">{{$movie->Title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$movie->Genre}} {{$movie->Year}}</h6>
        <p class="card-text">{{$movie->Plot}}</p>
    </div>
</div>
@endforeach
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>