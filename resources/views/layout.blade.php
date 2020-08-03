<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/css/styles.css')}}" rel="stylesheet">
    <script src="{{resource_path('js/hangman.js')}}"></script>
</head>
<body>

<h2>Speel Galgje</h2>
<p>De lengte van het geheime woord is: {{strlen($sword)}}</p>

<div class="container">
    <form method = "post" action="{{route('hangman.index')}}">
        <div class="row">
            <div class="col-25">
                <label for="aantal">Aantal</label>
            </div>
            <div class="col-75">
                <input type="text" id="aantal" value="{{$aantal}}" placeholder="Aantal.." readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="gword">Poging</label>
            </div>
            <div class="col-75">
                <input type="text" id="gword" name="gword" placeholder="Raad een woord.." oninput="checkInput({{strlen($sword)}})">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="rword">Resultaat</label>
            </div>
            <div class="col-75">
                <input type="text" id="rword" value="{{$rword ?? ""}}" placeholder="Het puntjeswoord.." style="color: {{$rcolor ?? "red"}}" disabled>
            </div>
        </div>

        <div class="row">
            <input type="submit" id="probeer" name="action" value="Probeer">
        </div>
    </form>
</div>

</body>
</html>
