<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-2">
                    @foreach ($category->articles()->latest()->get() as $article)
                        <div class="grid grid-cols-3 mt-3 shadow-lg rounded-lg overflow-hidden">
                            <img class="h-[250px] object-cover w-full" src="{{ asset(Storage::url($article->image)) }}"
                                alt="{{ $article->title }} Image">
                            <div class="col-span-2 p-3 space-y-3">
                                <h2 class="text-2xl font-semibold">
                                    {{ $article->title }}
                                </h2>
                                <div class="text-(--text)/70">
                                    {!! Str::limit($article->description, 120, '...') !!}
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <small class="font-semibold"><i class="fa-solid fa-calendar-days"></i> प्रकाशित
                                        मितिः
                                        {{toNepaliDate($article->created_at->format('Y-m-d'))}}</small>
                                    <a href=""> <i class="fa-solid fa-hand-pointer"></i> पुरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <div class="m-2 hover:scale-101 shadow-md hover:shadow-md duration-300 transition-all">
                            <a href="{{ $advertise->redirect_link }}" target="-blank">
                                <img src="{{ asset(Storage::url($advertise->banner)) }}"
                                    alt="{{ $advertise->company_name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
