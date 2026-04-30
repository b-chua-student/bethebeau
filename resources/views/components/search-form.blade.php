<form action="{{ route('search.' . $route) }}" method="GET">
    <input type="text" name="query" placeholder="Search..." value="{{ request('query') }}"/>
    <input type="hidden" name="from" value="app.product-listing"/>
    <button type="submit">Search</button>
</form>
