<x-frontend-layout>
    <section class="py-5">
        <div class="container">
            <h1 class="text-5xl font-semibold">{{ $latest_article->title }}</h1>

            <img class="pt-3" src="{{ asset(Storage::url($latest_article->image)) }}" alt="news">
        </div>
    </section>

    <a href="">
        <i class="fa-brands fa-facebook"></i>
    </a>
</x-frontend-layout>
