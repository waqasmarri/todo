<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        {{-- <p>Please Wait...</p> --}}
        <form action="{{ route('todo.index') }}" id="form" method="POST">
            @csrf
            <input type="hidden" name="timezone" id="timezone">
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script>
            $(function(){
                var timezone = moment.tz.guess();
                $('#timezone').val(timezone);
                console.log(timezone)
                $('#form').submit();
            });
        </script>
    </body>

</html>