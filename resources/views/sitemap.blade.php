{{ Request::header('Content-Type : text/xml') }}
<?php echo'<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($main_page->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{url('ru/')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($main_page->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{url('en/')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($main_page->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

    @foreach ($pages as $page)
        <url>
            <loc>{{url($page->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($page->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($pages as $page)
        <url>
            <loc>{{url('en/'.$page->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($page->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($pages as $page)
        <url>
            <loc>{{url('ru/'.$page->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($page->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    <url>
        <loc>{{url('/contacts')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($contacts->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('ru/contacts')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($contacts->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{url('en/contacts')}}</loc>
        <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($contacts->updated_at))}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach ($categories as $category)
        <url>
            <loc>{{url($category->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($category->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($categories as $category)
        <url>
            <loc>{{url('ru/'.$category->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($category->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($categories as $category)
        <url>
            <loc>{{url('en/'.$category->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($category->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

    @foreach ($products as $product)
        <url>
            <loc>{{url('/'.$product->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($product->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>{{url('ru/'.$product->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($product->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>{{url('en/'.$product->url)}}</loc>
            <lastmod>{{gmdate('Y-m-d\TH:i:s\Z',strtotime($product->updated_at))}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

</urlset>
