<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welkom op het Admin Dashboard</h1>

    <h2>Nieuwe gebruiker aanmaken</h2>
    <form action="{{ route('admin.user.create') }}" method="POST">
        @csrf
        <label for="name">Naam:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <label for="role">Rol:</label>
        <select name="role">
            <option value="user">Gebruiker</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Aanmaken</button>
    </form>

    <h2>Gebruikers beheren</h2>
    
</body>
</html>
