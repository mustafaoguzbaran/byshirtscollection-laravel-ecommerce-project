<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->format('Y-m-d\TH:i:sP') }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($products as $product)
        <url>
            <loc>{{ url('/').'/'.$product->category->slug.'/'.$product->slug }}</loc>
            <lastmod>{{ $product->updated_at->format('Y-m-d\TH:i:sP') }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
