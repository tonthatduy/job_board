<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm p-4">

        <!-- Header -->
        <div class="d-flex align-items-center mb-4">

            <img src="{{ $job->company->logo }}" width="80" class="me-3 rounded">

            <div>
                <h3 class="mb-1">{{ $job->title }}</h3>
                <p class="mb-1 text-muted">{{ $job->company->name }}</p>
                <p class="text-muted small">
                    📍 {{ $job->location->name }} • {{ $job->level->name }} • {{ $job->type }}
                </p>
            </div>

        </div>

        <!-- Remote -->
        <div class="mb-3">
            @if($job->is_remote)
                <span class="badge bg-success">🌍 Remote</span>
            @else
                <span class="badge bg-secondary">🏢 On-site</span>
            @endif
        </div>

        <!-- Categories -->
        <div class="mb-4">
            @foreach($job->categories as $cat)
                <span class="badge bg-dark me-1">{{ $cat->name }}</span>
            @endforeach
        </div>

        <!-- Description -->
        <div>
            <h5>Mô tả công việc</h5>
            <p class="mt-3">
                {!! nl2br(e($job->description)) !!}
            </p>
        </div>

        <!-- Apply -->
        <div class="mt-4">
            <a href="{{ $job->apply_url }}" target="_blank" class="btn btn-primary">
                Apply Now
            </a>
        </div>

    </div>

</div>

</body>
</html>
