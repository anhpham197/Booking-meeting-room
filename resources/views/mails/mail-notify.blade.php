<div>
    <h2>{{ $data['type'] }}</h2>
    <p>Meeting title : <b>{{ $data['title'] }}</b></p>
    <p>Starting time : <b>{{ $data['starting_time']}}</b></p>
    <p>Ending time : <b>{{ $data['ending_time']}}</b></p>
    <p><b><i>Click here for details : <a href="{{ $data['url'] }}">{{ $data['url'] }}</a></i></b></p>
</div>