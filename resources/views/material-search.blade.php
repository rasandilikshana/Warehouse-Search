<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Material Item Search</title>
    <!-- Favicons -->
    <link href="{{ asset('/images/Letter M.svg') }}" rel="icon">
    <link href="{{ asset('/images/Letter M.svg') }}" rel="apple-touch-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bgImage {
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url('https://i0.wp.com/robsforklift.com/wp-content/uploads/2021/03/Forklift-2.jpg?fit=1430%2C1200&ssl=1');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    #search-header {
        position: sticky;
        top: 0;
        z-index: 100;
    }

    #scrollable-table {
        max-height: 400px;
        overflow-y: auto;
    }
    </style>
    @livewireStyles
</head>
<body class="bgImage backdrop-brightness-50">
    <livewire:search-data/>
    @livewireScripts
    <script>
        // Function to adjust the max-height of the table
        function adjustTableMaxHeight() {
            const table = document.getElementById('scrollable-table');
            const viewportHeight = window.innerHeight;
            const headerHeight = document.getElementById('search-header').offsetHeight;
            const maxTableHeight = viewportHeight - headerHeight - 20; // Adjust the padding as needed
            table.style.maxHeight = `${maxTableHeight}px`;
        }

        // Call the function initially and whenever the content changes (e.g., pagination or search)
        adjustTableMaxHeight();

        // Listen for changes in Livewire components (assuming Livewire is used)
        Livewire.hook('element.updated', () => {
            adjustTableMaxHeight();
        });

        // Listen for window resize events to recalculate the max-height
        window.addEventListener('resize', adjustTableMaxHeight);
    </script>
</body>
</html>
