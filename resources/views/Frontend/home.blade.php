<x-frontend-layout>
    <section class="py-5">
        <div class="container">
            @foreach ($latest_articles as $latest_article)
                <div>
                    <h1 class="text-5xl font-semibold py-5">{{ $latest_article->title }}</h1>
                </div>
                <div>
                    <img class="pt-3" src="{{ asset(Storage::url($latest_article->image)) }}" alt="news">
                </div>
            @endforeach
        </div>
    </section>

</x-frontend-layout>
