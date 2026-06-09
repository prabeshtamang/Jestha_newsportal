<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    @foreach ($category->articles()->latest()->get() as $article)
                        <div class="grid grid-cols-3 mt-3 shadow-lg rounded-lg overflow-hidden">
                            <img class="h-[250px] object-cover w-full"
                                src="{{asset(Storage::url($article->image))}}" alt="{{$article->title}} Image">
                            <div class="col-span-2 p-3 space-y-3">
                                <h2 class="text-2xl font-semibold">
                                    {{$article->title}}
                                </h2>
                                <p class="text-(--text)/70">{!!Str::limit($article->description,120,'...')!!}
                                </p>
                                <div class="flex flex-col space-y-2">
                                    <small class="font-semibold"><i class="fa-solid fa-calendar-days"></i> प्रकाशित
                                        मितिः
                                        सोमबार, २५ जेठ २०८३</small>
                                    <a href=""> <i class="fa-solid fa-hand-pointer"></i> पुरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</x-frontend-layout>
