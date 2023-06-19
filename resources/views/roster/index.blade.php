<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
     {{--Header--}}
    <header class="bg-primary text-white text-center py-3">
        <h1>Roster List</h1>
    </header>
    <div class="mx-3 my-3">  {{--mx=horizontal margin on both sides, my=vertical margin on the top and bottom--}}
        <div class="mb-3">  {{--mb=width of the left and right margins--}}
             {{--button create--}}
            <a href="{{route('roster.create')}}">
                <button type="button" class="btn btn-primary">Create Roster</button>
            </a>
        </div>
        {{-- table --}}
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Day</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>                 
                </tr>
            </thead>
            <tbody>
                @foreach($roster as $roster)
                    <tr>
                        <td>{{$roster->id}}</td>
                        <td>{{$roster->name}}</td>
                        <td>{{$roster->start_time}}</td>
                        <td>{{$roster->end_time}}</td>
                        <td>{{$roster->date}}</td>
                        <td>{{$roster->day}}</td>
                        {{--button edit --}}
                        <td>
                            <a href="{{route('roster.edit', ['roster' => $roster])}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                        {{-- button delete  --}}
                        <td>
                            <form method="post" action="{{route('roster.destroy', ['roster' => $roster])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>
