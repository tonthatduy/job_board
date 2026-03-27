<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container py-4">

    <!-- 🔍 FILTER BAR -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="🔍 Search...">
        </div>

        <div class="col-md-2">
            <select class="form-select">
                <option>All locations</option>
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-select">
                <option>All categories</option>
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-select">
                <option>All levels</option>
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-select">
                <option>Default order</option>
            </select>
        </div>
    </div>

    <!-- 📋 JOB LIST -->
    @foreach($jobs as $item)
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-body d-flex">

                <!-- Logo -->
                <div class="me-3">
                    <img src="{{ $item->company->logo }}" width="60" height="60" class="rounded-circle">
                </div>

                <!-- Content -->
                <div class="flex-grow-1">

                    <!-- Title -->
                    <a href="/job/{{ $item->slug }}" class="text-decoration-none text-dark">
                        <h5 class="mb-1 fw-bold">
                        {{ $item->title }}
                    </h5>
                    </a>
                    <!-- Company -->
                    <p class="mb-1 text-muted">
                        {{ $item->company->name }}
                    </p>

                    <!-- Info line -->
                    <p class="mb-2 text-muted small">
                        📍 {{ $item->location->name }}
                        • {{ $item->level->name }}
                        • {{ $item->type }}
                    </p>

                    <!-- Categories -->
                    <div class="mb-2">
                        @foreach($item->categories as $cat)
                            <span class="badge bg-secondary me-1">
                                {{ $cat->name }}
                            </span>
                        @endforeach
                    </div>

                </div>

                <!-- Remote badge -->
                <div class="text-end">
                    @if($item->is_remote)
                        <span class="badge bg-success px-3 py-2">
                            🌍 Remote
                        </span>
                    @else
                        <span class="badge bg-secondary px-3 py-2">
                            🏢 On-site
                        </span>
                    @endif
                </div>

            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>

</div>

</body>
</html>
