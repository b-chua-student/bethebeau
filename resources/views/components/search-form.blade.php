<form action="{{ route('search.' . $route) }}" method="GET">
    <input type="text" name="query" placeholder="Search..." value="{{ request('query') }}"/>
    <button type="submit">Search</button>
</form>
