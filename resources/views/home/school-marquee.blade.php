<section class="school-marquee">
    <div class="container">

        <div class="marquee-wrapper">
            <div class="marquee-track">

                {{-- Duplicate list for infinite scroll --}}
                @foreach (range(1, 2) as $loop)
                    <div class="marquee-group">
                        @foreach ($company_marquees as $item)
                            <div class="logo-card" title="{{ $item->name }}">
                                <img src="{{ env('BACKEND_URL') . '/' . $item->logo }}" alt="{{ $item->name }}">
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>

            </div>
        </div>

    </div>
</section>
