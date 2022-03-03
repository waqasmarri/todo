<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo-List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>

    <body>
        <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
            <!-- App title section -->
            <div class="row m-1 p-4">
                <div class="col">
                    <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                        <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                        <u>Todo-List</u>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="row m-1 p-4">
                <div class="col alert alert-danger">
                    <ul>
                        @foreach ($erros->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if (session()->has('status'))
            <div class="row m-1 p-4">
                <div class="col alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
            @endif
            <!-- Create todo section -->
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="row m-1 p-3 text-center">
                    <div class="col-md-3">
                        <input required class="form-control form-control-lg add-todo-input bg-transparent rounded"
                            type="text" placeholder="Add new task.." name="task">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="date" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="time" name="time" required class="form-control">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
            <div class="p-2 mx-4 border-black-25 border-bottom"></div>
            <!-- Todo list section -->
            @forelse ($todos as $item)
            <div class="row mx-1 px-5 pb-3 w-80">
                <div class="col mx-auto">
                    <!-- Todo Item 1 -->
                    <div class="row px-3 align-items-center todo-item rounded">
                        <div class="col px-1 m-1 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" disabled {{ $item->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $item->task }} - {{ $item->deadline }}
                                </label>
                            </div>
                        </div>
                        <div class="col-auto m-1 p-0 d-flex text-success">
                            @if ($item->status != 1)
                            <a href="{{ route('todo.complete',$item) }}" onclick="return confirm('Are you sure?')">
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fas fa-check"></i>
                                </h5>
                            </a>
                            @endif
                            <a href="{{ route('todo.delete',$item) }}" onclick="return confirm('Are you sure?')">
                                <h5 class="m-0 p-0 px-2 text-danger">
                                    <i class="fas fa-trash"></i>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="row mx-1 my-4 px-5 pb-3 w-80">
                <div class="col mx-auto">
                    <p>Empty</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3da8c9a7bc.js" crossorigin="anonymous"></script>

        <!-- Script -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>

</html>