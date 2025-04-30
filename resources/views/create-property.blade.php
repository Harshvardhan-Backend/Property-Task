<!DOCTYPE html>
<html>
<head>
    <title>Create Property</title>
</head>
<body>
    <h2>Create Property</h2>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <input type="text" name="address" placeholder="Address" required><br><br>
        <input type="number" name="price" placeholder="Price" required><br><br>
        <textarea name="description" placeholder="Description"></textarea><br><br>
        <input type="text" name="image_urls" placeholder='["url1","url2"]'><br><br>
        <select name="agent_id" required>
            <option value="">Select Agent</option>
            @foreach ($agents as $agent)
                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Create Property</button>
    </form>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
</body>
</html>
