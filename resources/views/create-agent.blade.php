<!DOCTYPE html>
<html>
<head>
    <title>Create Agent</title>
</head>
<body>
    <h2>Create Agent</h2>
    <form action="{{ route('agents.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="phone" placeholder="Phone" required><br><br>
        <button type="submit">Create Agent</button>
    </form>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
</body>
</html>
