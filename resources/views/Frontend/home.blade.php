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
    <section>
        <div class="container">
            @foreach ($categories as $category)
                <div>
                    <h2 class="text-3xl font-semibold border-l-5 text-(--primary) pl-2 my-3">{{$category->title}}</h2>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <img src="https://jawaaf.com/storage/01KRZYXTQGV3Q4BVRM6SZB8P58.jpg" alt="news">
                            <h3 class="text-2xl font-semibold pt-3 text-(--text)">
                                चलचित्र ‘काजी’ घर–घरको कथा हो, दर्शक निराश हुनुहुन्न : विपिन कार्की
                            </h3>
                        </div>

                        <div class="">
                            <div class="grid grid-cols-3 rounded-xl gap-2 hover:shadow-lg">
                                <img class="rounded-l-sm"
                                    src="https://jawaaf.com/storage/01KNGTKV55N0ACWDSG24P9XZPF.jpg" alt="news">

                                <div class="col-span-2">
                                    <h3>‘लालीबजार’ को दोस्रो गीत ‘मिठो संसार’ सार्वजनिक</h3>
                                    <small><i class="fa-solid fa-calendar-days"></i> प्रकाशित मितिः सोमबार, २३ चैत
                                        २०८२</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-frontend-layout>
