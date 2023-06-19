<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h1>Create Roster</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>

        @endif
    </div>
    <form method="post" action="{{route('roster.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" />
        </div>
        <div>
            <label>Start Time</label>
            <select name="start_time">
                <option value="08:00">8:00 am</option>
                <option value="14:00">2:00 pm</option>
            </select>
        </div>
        <div>
            <label>End Time</label>
            <select name="end_time">
                <option value="13:00">13:00 pm</option>
                <option value="16:00">16:00 pm</option>
            </select>
        </div>
        <div>
            <label>Date</label>
            <input type="date" name="date" placeholder="Date" />
        </div>
        <div>
            <label>Day</label>
            <input type="text" name="day" placeholder="Day" />
        </div>
        <div>
            <input type="submit" value="Save Roster">
        </div>
    </form>
</body>
</html>