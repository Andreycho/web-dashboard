<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configure Cell</title>
</head>
<body>
    <h2 style="text-align:center;">{{ $cell->link ? 'Edit Cell' : 'Configure Cell' }} (Row: {{ $cell->row }}, Col: {{ $cell->col }})</h2>

    <form method="POST" action="{{ url('/configure/' . $cell->id) }}" style="max-width:400px;margin:auto;">
        @csrf

        <label>Title:</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $cell->title) }}"
            required
            style="width:100%;padding:0.5rem;margin-bottom:1rem;"
        ><br>

        <label>Link (URL):</label>
        <input
            type="url"
            name="link"
            value="{{ old('link', $cell->link) }}"
            required
            style="width:100%;padding:0.5rem;margin-bottom:1rem;"
        ><br>

        <label>Button Color:</label>
        <input
            type="color"
            name="color"
            value="{{ old('color', $cell->color ?? '#888888') }}"
            required
            style="margin-bottom:1rem;"
        ><br>

        <button type="submit" style="padding:0.5rem 1rem;">Save</button>
    </form>

    @if ($errors->any())
        <ul style="color:red;text-align:center;margin-top:1rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
