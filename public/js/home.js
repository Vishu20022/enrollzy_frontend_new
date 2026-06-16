        const observer = new IntersectionObserver((entries) => {

            entries.forEach((entry) => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("show");

                }

            })

        }, {
            threshold: .2
        })

        document
            .querySelectorAll(".animate")
            .forEach(el => observer.observe(el))

        window.addEventListener("scroll", () => {

            const timeline =
                document.querySelector(".timeline");

            const progress =
                document.querySelector(".timeline-progress");

            if (!timeline || !progress) return;

            const rect =
                timeline.getBoundingClientRect();

            const windowHeight =
                window.innerHeight;

            const totalHeight =
                timeline.offsetHeight;

            const visible =
                windowHeight - rect.top;

            let percentage =
                (visible / totalHeight) * 100;

            percentage =
                Math.max(
                    0,
                    Math.min(100, percentage)
                );

            progress.style.height =
                percentage + "%";

        });

        new Swiper(".testimonialSwiper", {

            slidesPerView: 1,
            spaceBetween: 25,

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            breakpoints: {

                576: {
                    slidesPerView: 2
                },

                768: {
                    slidesPerView: 3
                },

                1200: {
                    slidesPerView: 4
                }

            }

        })

        new Swiper(".testimonialSlider", {

            spaceBetween: 25,

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            breakpoints: {

                0: {
                    slidesPerView: 1
                },

                576: {
                    slidesPerView: 2
                },

                992: {
                    slidesPerView: 3
                },

                1200: {
                    slidesPerView: 4
                }

            }

        })


