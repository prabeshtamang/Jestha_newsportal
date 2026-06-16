<header class="pt-5 sticky z-50 top-0 bg-white">
    <div class="container">
        <div class="flex items-center justify-between">
            <div>
                <img class="h-[80px]" src="https://sudamhub.com/images/logo1.png" alt="sudam-hub">
            </div>
            <div class="text-(--primary-dark) text-xl">
                {{toNepaliDate(now()->format('Y-m-d'))}}
                <div class="bg-(--primary) h-[4px] -skew-y-3">

                </div>
            </div>
        </div>
    </div>
    <div class=" bg-(--primary) p-4 mt-2">
        <div class=" flex items-center justify-between container">
            <nav class="flex items-center gap-5 text-white font-semibold text-lg">


                {{--
                  Missing part of day-19 is the below  route  of home and category
                --}}


                <a class="hover:text-(--primary-dark) duration-300 transition-all"
                    href="{{ route('home') }}">गृहपृष्ठ</a>
                @foreach ($categories as $category)
                    <a class="hover:text-(--primary-dark) duration-300 transition-all"
                        href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                @endforeach
                <a href="{{route('contact')}}">contact</a>
            </nav>

            <form class="w-sm" action="{{route('search')}}" method="get">
                <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="q"
                        class="block w-full p-3 ps-9 bg-white border border-(--primary) text-heading text-sm rounded-base focus:ring-brand focus:border-(--primary-dark) shadow-xs placeholder:text-(--primary)"
                        placeholder="Search" required />
                    <button type="submit"
                        class="absolute end-1.5 bottom-1.5 text-white bg-(--primary) hover:bg-(--primary-dark) box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
                </div>
            </form>
        </div>
    </div>

</header>
