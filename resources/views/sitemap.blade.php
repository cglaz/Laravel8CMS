<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>https://example.com/</loc>
        </url>
@foreach($pages as $page)
        <url>
            <loc>https://example.com/page/{{ $page->slug }}</loc>
        </url>
    @endforeach
    @foreach($posts as $post)
        <url>
            <loc>https://example.com/post/{{ $post->slug }}</loc>
        </url>
    @endforeach
</urlset>
