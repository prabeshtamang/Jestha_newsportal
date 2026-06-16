<x-frontend-layout>
    <div class="container py-20">
        <section>
            <div class="text-center">
                <h1 class="text-5xl font-bold text-(--primary)">
                    Request for design
                </h1>
                <span class="text-(--text) my-4 inline-block">
                    Grab your placement of company banner at appropriate price.
                </span>
            </div>

            <form class="grid grid-cols-2 gap-3" action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input class="w-full py-2" type="text" name="name" id="name">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input class="w-full py-2" type="email" name="email" id="email">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input class="w-full py-2" type="text" name="phone" id="phone">
                </div>
                <div>
                    <label for="company_name">Company Name</label>
                    <input class="w-full py-2" type="text" name="company_name" id="company_name">
                </div>
                <div>
                    <label for="banner">Banner</label>
                    <input class=" py-2 " type="file" name="banner" id="banner">
                    {{--
                        Because of file there is always enctype->mul
                        --}}
                    </div>
                    <div>
                        <label for="service_type">Service Type</label>
                        <select name="service_type" id="service_type">
                            <option selected disabled value="">Select an option</option>
                            <option value="one_day">1 day/Rs 500</option>
                            <option value="one_day">1 month/Rs 14000</option>
                            <option value="one_day">1 year/Rs 160000</option>
                        </select>
                    </div>
                <div class="col-span-2">
                    <label for="message">Message</label>
                    <textarea class="w-full" name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button class="font-semibold bg-(--primary) hover:bg-(--primary-dark) duration-100 transition py-1  text-center col-span-2" type="submit">Submit Form</button>
            </form>
        </section>
    </div>



    @include('sweetalert::alert')
</x-frontend-layout>
