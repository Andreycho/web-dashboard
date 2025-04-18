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

        .cell {
            background-color: #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cell-button {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
        }

        .cell-button.gray {
            background-color: #888;
            font-size: 2rem;
        }

        #notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-size: 1rem;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        #notification.fade-out {
            opacity: 0;
        }
    </style>
</head>
<body>

    @if(session('success'))
        <div id="notification">
            {{ session('success') }}
        </div>

        <script>
            const notif = document.getElementById('notification');
            if (notif) {
                setTimeout(() => notif.classList.add('fade-out'), 2500);
                setTimeout(() => notif.remove(), 3000);
            }
        </script>
    @endif

    <div class="grid">
        @foreach ($cells as $cell)
            <div class="cell">
                @if ($cell->link)
                    <form action="{{ $cell->link }}" method="GET" style="width:100%; height:100%;">
                        <button
                            class="cell-button"
                            type="submit"
                            style="background-color: {{ $cell->color ?? '#4f46e5' }};"
                        >
                            {{ $cell->title ?? 'Go' }}
                        </button>
                    </form>
                @else
                    <form action="{{ url('/configure/' . $cell->id) }}" method="GET" style="width:100%; height:100%;">
                        <button class="cell-button gray" type="submit">+</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
