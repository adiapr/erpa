<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Styles -->
</head>
<body>
    <div id="app">
        <div class="container">
            <main class="py-4">
                <div class="form-group mt-10">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pasien') }}</label>
                    <div class="col-md-6">
                        <input type="text" id='pasien' class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Puskesmas') }}</label>
                    <div class="col-md-6">
                        <input type="text" id='puskesmas' class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>
                    <div class="col-md-6">
                        <input type="text" id='kecamatan' class="form-control">
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $( "#pasien" ).autocomplete({
                source: function( request, response ) {
                    console.log(request.term)
                $.ajax({
                    url:"{{route('pasien')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        cari: request.term
                    },
                    success: function( data ) {
                    response( data );
                    }
                });
                },
                select: function (event, ui) {
                $('#pasien').val(ui.item.label);
                $('#puskesmas').val(ui.item.faskes);
                $('#kecamatan').val(ui.item.kecamatan);
                return false;
                }
            });
        });
  </script>
</html>
