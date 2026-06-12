<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    <div class="flex items-center justify-between pt-4 pb-4 text-(--primary-dark)">
                        <p class="font-semibold">
                            <i class="fa-solid fa-user"></i>
                            {{ $article->author_name }}
                        </p>
                        <p>
                            <i class="fa-solid fa-calendar-days"></i>
                            प्रकाशित मितिः {{toNepaliDate($article->created_at->format('Y-m-d'))}}
                        </p>
                    </div>
                    <h1 class="text-3xl my-2 font-bold">
                        {{$article->title}}
                    </h1>
                    <img class="w-full object-cover" src="{{asset(Storage::url($article->image))}}" alt="{{$article->title}} Image">
                    <div class="text-(--text) tracking-wide pt-4 pb-4 text-lg">
                       {!!$article->description!!}
                    </div>
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
