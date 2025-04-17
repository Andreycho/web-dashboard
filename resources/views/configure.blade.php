<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configure Cell</title>
</head>
<body>
    <h2 style="text-align:center;">Configure Cell (Row: {{ $cell->row }}, Col: {{ $cell->col }})</h2>

    <form method="POST" action="{{ url('/configure/' . $cell->id) }}" style="max-width:400px;margin:auto;">
        @csrf

        <label>Link (URL):</label>
        <input type="url" name="link" value="{{ old('link', $cell->link) }}" required style="width:100%;padding:0.5rem;"><br><br>

        <label>Button Color:</label>
        <input type="color" name="color" value="{{ old('color', $cell->color ?? '#888888') }}" required><br><br>

        <button type="submit">Save</button>
    </form>

    @if ($errors->any())
        <ul style="color:red;text-align:center;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
