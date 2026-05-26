@if ($faqs->count() > 0)
<section class="faq-section">

            <div class="container">

                <div class="faq-heading">

                    <h2 class="main-heading">
                {!! $section->title ?? 'FAQ' !!}
            </h2>

                    <p>
                        Find answers to frequently asked questions about our programs and admissions.
                    </p>

                </div>


                <div class="faq-wrapper">

                    <div class="accordion" id="faqAccordion">

                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">

                                <h2 class="accordion-header">

                                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">

                                        <div class="faq-icon"></div>

                                        {{ $faq->question }}

                                    </button>

                                </h2>


                                <div id="faq{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">

                                        {{ $faq->answer }}

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>
    @endif
