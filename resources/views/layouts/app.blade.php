<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crowdfunding Platform</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            Crowdfunding
        </a>

        <div>

            <a href="/campaigns" class="btn btn-light me-2">
                Campaigns
            </a>

            <a href="/campaigns/create" class="btn btn-warning">
                Add Campaign
            </a>

        </div>

    </div>

</nav>

@if(session('success'))

<div class="container mt-3">

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

</div>

@endif

<main class="container mt-5 grow">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center p-3 mt-auto">
    © 2026 Crowdfunding Platform
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>