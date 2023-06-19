<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Roster</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>

        @endif
    </div>
    <form method="post" action="{{route('roster.update', ['roster' => $roster])}}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$roster->name}}"/>
        </div>
        <div>
            <label>Start Time</label>
            <select name="start_time">
                <option value="08:00" {{ $roster->start_time == '08:00' ? 'selected' : '' }}>8:00 am</option>
                <option value="14:00" {{ $roster->start_time == '14:00' ? 'selected' : '' }}>2:00 pm</option>
            </select>
        </div>
        <div>
            <label>End Time</label>
            <select name="end_time">
                <option value="13:00" {{ $roster->end_time == '13:00' ? 'selected' : '' }}>13:00 am</option>
                <option value="16:00" {{ $roster->end_time == '16:00' ? 'selected' : '' }}>16:00 pm</option>
            </select>
        </div>    
        <div>
            <label>Date</label>
            <input type="date" name="date" placeholder="Date" value="{{ $roster->date }}" />
        </div>
        <div>
            <label>Day</label>
            <input type="text" name="day" placeholder="Day" value="{{ $roster->day }}" />
        </div> 
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
