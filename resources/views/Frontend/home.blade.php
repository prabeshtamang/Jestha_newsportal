<x-frontend-layout>
    <section class="py-5">
        <div class="container">
            @forelse ($latest_articles as $latest_article)
                <a href="{{ route('article', $latest_article->slug) }}">
                    <div>
                        <h1 class="text-5xl font-semibold py-5">{{ $latest_article->title }}</h1>
                    </div>
                    <div>
                        <img class="pt-3 w-full object-cover" src="{{ asset(Storage::url($latest_article->image)) }}"
                            alt="{{ $latest_article->title }} Image">
                    </div>
                </a>
            @empty
                <p class="text-gray-500 py-5">No articles available.</p>
            @endforelse
        </div>
    </section>

    <section class="container">
        <div class="flex items-center justify-center text-center">
            @foreach ($advertises as $advertise)
                <div class="m-2 hover:scale-101 shadow-md hover:shadow-md duration-300 transition-all">
                    <a href="{{ $advertise->redirect_link }}" target="-blank">
                        <img src="{{ asset(Storage::url($advertise->banner)) }}" alt="{{ $advertise->company_name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <div class="container">
            @foreach ($categories as $category)
                <div>
                    <h2 class="text-3xl font-semibold border-l-5 text-(--primary) pl-2 my-3 ">
                        {{ $category->title }}
                    </h2>

                    @php
                        $latest_cat_art = $category->articles()->where('status', true)->latest()->first();
                        $other_articles = $category
                            ->articles()
                            ->where('status', true)
                            ->latest()
                            ->skip(1)
                            ->take(4)
                            ->get();
                    @endphp

                    @if ($latest_cat_art)
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <a href="{{ route('article', $latest_cat_art->slug) }}">
                                    <img class="w-full object-cover"
                                        src="{{ asset(Storage::url($latest_cat_art->image)) }}"
                                        alt="{{ $latest_cat_art->title }}">
                                    <h3 class="text-2xl font-semibold pt-3 text-(--text)">
                                        {{ $latest_cat_art->title }}
                                    </h3>
                                </a>
                            </div>

                            <div class="">
                                @forelse ($other_articles as $article)
                                    <a class="inline-block mb-2" href="{{ route('article', $latest_cat_art->slug) }}">
                                        <div class="grid grid-cols-3 rounded-xl mb-3 gap-2 shadow-lg">
                                            <img class="rounded-l-sm h-[86px] w-full object-cover"
                                                src="{{ asset(Storage::url($article->image)) }}"
                                                alt="{{ $article->title }}">
                                            <div class="col-span-2">
                                                <h3>{{ $article->title }}</h3>
                                                <small>
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                    {{ toNepaliDate($article->created_at->format('Y-m-d')) }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-gray-500 text-sm">No other articles in this category.</p>
                                @endforelse
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 py-3">No articles in this category yet.</p>
                    @endif
                </div>
            @endforeach

        </div>

    </section>
</x-frontend-layout>
