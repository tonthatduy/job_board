<h3>Job:</h3>

@foreach($job as $j)
    <p>Title:{{ $j->title }}</p>
    <p>{{ $j->slug }}</p>
    <p>{{ $j->description }}</p>
    <p>{{ $j->salary_from }}</p>
    <p>{{ $j->salary_to }}</p>
    <p>{{ $j->salary_type }}</p>
@endforeach
