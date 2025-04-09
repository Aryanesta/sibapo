<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    {{-- <link rel="stylesheet" href="../src/output.css"> --}}
    @vite('resources/css/app.css')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-green-100 h-screen">
    <!-- Header -->
    <x-admin-header></x-admin-header>
    
    <nav class="flex h-full">
      <!-- Sidebar -->
      <x-admin-sidebar></x-admin-sidebar>
        
      <!-- Content -->
      <main class="w-full">
        {{ $slot }}
      </main>

</body>
</html>
