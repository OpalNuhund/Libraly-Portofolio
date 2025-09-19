<aside class="sidebar" aria-label="Kategori Buku">
    <h2>Kategori Buku</h2>
    <ul class="categories" role="list">
        <li><a href="{{ url()->current() }}" class="{{ !request('category') ? 'active' : '' }}" tabindex="0" aria-current="{{ !request('category') ? 'page' : 'false' }}">Semua</a></li>
        @foreach ($categories as $item)
            <li>
                <a href="{{ url()->current() }}?category={{ $item->id }}" 
                    class="{{ request('category') == $item->id ? 'active' : '' }}" 
                    tabindex="0"
                    aria-current="{{ request('category') == $item->id ? 'page' : 'false' }}">
                    {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>
</aside>