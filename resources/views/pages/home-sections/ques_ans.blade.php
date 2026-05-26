@if ($faqs->count() > 0)
<section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-heading">

                            <h2 class="main-heading">
                {!! $section->title ?? 'Questions & Answers' !!}
            </h2>

                            <p>
                                Here are some of the most commonly asked questions by our prospective students.
                            </p>

                            <div class="heading-line"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="qa-section">

            <div class="container">




                <div class="qa-wrapper">

                    <div class="row">


                        <!-- left -->

                        <div class="col-lg-7">

                            <div class="left-side">

                                <h3 class="main-heading">
                                    Asked Questions
                                </h3>

                                <p class="big-text">
                                    Have more specific questions? Reach out to our guidance experts for custom advice.
                                </p>


                                <div class="left-image">

                                    <img src="{{ asset('images/q-a.png') }}" alt="qa">

                                </div>


                                <div class="question-box">

                                    <h4 class="sub-heading">
                                        Still Have Question ?
                                    </h4>

                                    <p>
                                        Fill in our contact form or book a free session with any of our experts to clarify
                                        your doubts.
                                    </p>

                                </div>

                            </div>

                        </div>



                        <!-- right -->

                        <div class="col-lg-5">

                            @foreach ($faqs->skip(1)->take(4) as $faq)
                                <div class="answer-card">

                                    <h4 class="sub-heading">
                                        {{ $faq->question }}
                                    </h4>

                                    <p>
                                        {{ $faq->answer }}
                                    </p>

                                </div>
                            @endforeach

                        </div>


                    </div>

                </div>

            </div>

        </section>
    @endif
