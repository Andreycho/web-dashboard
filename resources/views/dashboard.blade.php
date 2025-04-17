<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }

        .cell-button {
            width: 100%;
            padding: 3rem;
            color: white;
            font-size: 1.2rem;
            border: none;
            cursor: pointer;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <p style="text-align:center; color:green;">{{ session('success') }}</p>
    @endif

    <div class="grid">
        @foreach ($cells as $cell)
            <form action="{{ $cell->link ?? url('/configure/' . $cell->id) }}" method="GET">
                <button
                    class="cell-button"
                    style="background-color: {{ $cell->color ?? '#888' }};"
                    type="submit"
                >
                    {{ $cell->link ? 'Go' : 'Configure' }}
                </button>
            </form>
        @endforeach
    </div>
</body>
</html>
