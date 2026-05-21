<section class="college-faq-section ">
  <div class="container">

    <!-- Heading -->
    <div class="faq-heading text-center mb-5">
      <span class="faq-badge">FAQs</span>
      <h2>Everything You Need to Know</h2>
      <p>
        Get clarity on admissions, colleges, and career guidance before you decide.
      </p>
    </div>

    <div class="accordion faq-accordion" id="collegeFaq">

      @forelse ($faqs as $index => $faq)
        @php
          $headingId = "faqHeading{$index}";
          $collapseId = "faqCollapse{$index}";
        @endphp

        <div class="accordion-item">
          <h2 class="accordion-header" id="{{ $headingId }}">
            <button
              class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#{{ $collapseId }}"
              aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
              aria-controls="{{ $collapseId }}"
            >
              <span class="faq-icon"></span>
              {{ $faq->question }}
            </button>
          </h2>

          <div
            id="{{ $collapseId }}"
            class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
            data-bs-parent="#collegeFaq"
          >
            <div class="accordion-body">
              {!! nl2br(e($faq->answer)) !!}
            </div>
          </div>
        </div>
      @empty
        <div class="text-center py-4">
            <p class="text-muted">Stay tuned for FAQs.</p>
        </div>
      @endforelse

    </div>
  </div>
</section>
