@extends('layouts.master')

@section('title', 'Home2')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/test/header-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test/common-title.css') }}">

    <link rel="stylesheet" href="{{ asset('css/test/university.css') }}">
    <style>
        /* info */
        .info-section {
            position: relative;
            background:
                linear-gradient(rgba(87, 61, 180, .55),
                    rgba(87, 61, 180, .55)),

                url('https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1200');

            background-size: cover;
            background-position: center;
            overflow: hidden;
            transition: all .5s ease;
        }


        .custom-card {
            background: #fff;
            border-radius: 35px;
            padding: 15px 15px 22px;
            text-align: center;

            box-shadow:
                0 8px 15px rgba(0, 0, 0, .15);

            height: 100%;
            transition: .3s;
        }

        .custom-card:hover {
            transform: translateY(-8px);
        }

        .card-image {

            width: 100%;
            height: 190px;

            border-radius: 30px;

            overflow: hidden;

            box-shadow:
                0 6px 10px rgba(0, 0, 0, .2);

            margin-bottom: 18px;

        }

        .custom-card {

            overflow: hidden;

        }

        .custom-card img {

            transition: all .5s ease;

        }

        .custom-card:hover img {

            transform:
                scale(1.08) translateY(-8px);

        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #7c57e5;
            margin-bottom: 15px;
        }

        .card-desc {
            font-size: 16px;
            line-height: 1.4;
            color: #333;
        }

        .learn-btn {

            background: var(--darkclr);
            color: var(--plainclr);
            border: none;

            padding: 10px 28px;

            border-radius: 40px;


            box-shadow:
                0 4px 10px rgba(0, 0, 0, .3);

        }

        .learn-btn:hover {
            background: var(--themethirteenclr);
            color: var(--plainclr);
        }

        @media(max-width:991px) {

            .custom-card {
                margin-bottom: 25px;
            }

            .card-image {
                height: 220px;
            }

        }

        @media(max-width:576px) {

            .info-section {
                padding: 40px 15px;
            }

            .card-image {
                height: 200px;
            }

            .learn-btn {
                padding: 9px 24px;
            }

        }



        /* about */
        .about-section {
            background: #f3eefc;
        }

        .info-row {
            margin-bottom: 30px;
        }
        .info-row:hover img{
            transform: scale(1.05);
        }

        .image-box {
            max-height: 270px;
            border-radius: 22px;
            overflow: hidden;
            background: #fff;
            padding: 6px;

        }

        .image-box img {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 18px;
            object-fit: cover;
        }

        .content-box {
            padding: 20px 15px;
        }

        .content-box h2 {

            font-size: 44px;
            font-weight: 800;
            color: #7b5be6;
            margin-bottom: 25px;

        }

        .content-box p {
            line-height: 1.8;
            color: #444;

            margin-bottom: 25px;

        }



        @media(max-width:991px) {

            .content-box {
                text-align: center;
                padding-top: 30px;
            }

            .info-row {
                margin-bottom: 50px;
            }

            .content-box h2 {
                font-size: 34px;
            }

            .content-box p {
                line-height: 1.7;
            }

        }

        @media(max-width:767px) {

            .about-section {
                padding: 40px 0;
            }

            .content-box h2 {
                font-size: 28px;
            }

            .learn-btn {
                padding: 10px 24px;
            }

        }



        /* timeline */
        .timeline-section {
            position: relative;
            overflow-x: hidden;
        }

        .timeline-section .section-title {
            font-size: 50px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 10px;
        }

        .timeline-section .section-desc {
            text-align: center;
            max-width: 700px;
            margin: auto;
            color: #555;
        }

        .timeline-section .title-line {
            width: 120px;
            height: 8px;
            background: #7e5bef;
            border-radius: 20px;
            margin: 20px auto 50px;
        }

        .timeline-section .timeline {
            position: relative;
            max-width: 1100px;
            margin: auto;
        }

        .timeline-section .timeline::before {

            content: '';

            position: absolute;

            left: 50%;

            top: 0;

            width: 3px;

            height: 100%;

            background: #d6d6d6;

            transform: translateX(-50%);
        }

        .timeline-section .timeline-item {
            position: relative;
            margin-bottom: 40px;
        }

        .timeline-section .timeline-content {
            width: 44%;
        }

        .timeline-section .left {
            margin-right: auto;
        }

        .timeline-section .right {
            margin-left: auto;
        }

        .timeline-section .card-box {

            background: #eaf5fb;

            padding: 30px;

            border-radius: 18px;

            box-shadow:
                0 5px 12px rgba(0, 0, 0, .15);

        }

        .card-box h3 {
            font-size: 38px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .card-box p {
            color: #444;
            line-height: 1.6;
        }

        .find-btn {

            background: #000;
            color: #fff;

            border: none;

            padding: 10px 38px;
            width: fit-content;
            border-radius: 30px;
            box-shadow: 0px 4px 4px 3px #00000040;
            margin-top: 15px;

        }

        .timeline-section .image-box {
            text-align: center;
        }

        .timeline-section .image-box img {
            width: 240px;
        }

        @media (min-width:350px) and (max-width:767px) {
            .timeline-section .image-box img {
                width: 150px;
            }

            .timeline-content {
                padding-left: 14px;
            }

            .timeline-section .card-box p {
                font-size: 14px !important;
            }

            .timeline-section .timeline-content {
                width: 50%;
            }

            .timeline-section .btn-theme-1 {
                margin-top: 10px;
                font-size: .8rem;
                padding: 10px 10px;
                border-radius: 20px;
                line-height: 18px;
            }
        }

        .timeline-section .animate {

            opacity: 0;
            transform: translateY(60px);

            transition:
                all .8s ease;
        }

        .animate.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media(max-width:991px) {

            .timeline::before {
                left: 20px;
            }

            .timeline-content {
                width: 100%;
                padding-left: 50px;
            }

            .right,
            .left {
                margin: 0;
            }

            .image-box {
                margin-bottom: 30px;
            }

            .card-box h3 {
                font-size: 20px;
            }



        }

        @media (min-width:350px) and (max-width:767px) {

            .timeline-content {
                padding-left: 20px;
            }

            .find-btn {
                min-width: 80px;
                padding: 8px 20px;
                font-size: 12px;
                line-height: 18px;
            }

            .timeline-section .card-box {
                padding: 12px;
            }
        }

        .timeline {
            position: relative;
            max-width: 1100px;
            margin: auto;
        }

        .timeline::before {

            content: '';

            position: absolute;

            left: 50%;

            top: 0;

            width: 3px;

            height: 100%;

            background: #d8d8d8;

            transform: translateX(-50%);
            z-index: 1;
        }

        .timeline-progress {

            position: absolute;

            left: 50%;

            top: 0;

            width: 4px;

            height: 0;

            background: linear-gradient(to bottom,
                    #7e5bef,
                    #5d35da);

            transform: translateX(-50%);

            transition: height .15s linear;

            z-index: 2;

            border-radius: 20px;
        }



        /* scholarship */
        .scholarship-section {
            background: #f4f4f4;
            overflow-x: hidden;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-heading h2 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-heading p {
            max-width: 700px;
            margin: auto;
            color: #555;
            line-height: 1.7;
        }

        .title-line {
            width: 120px;
            height: 8px;
            background: #7d58e7;
            margin: 20px auto 0;
            border-radius: 30px;
        }

        .scholar-card {

            background: linear-gradient(180deg, #8EDEFF 0%, #05348A 100%);

            padding: 16px;
            border-radius: 32px;
            color: var(--plainclr);
            text-align: center;
            height: 100%;
            box-shadow:
                0 8px 15px rgba(0, 0, 0, .15);
            transition: .4s;
        }

        .scholar-card:hover {
            transform: translateY(-8px);
        }

        .scholar-card img {

            width: 140px;
            margin-bottom: 20px;

        }

        .scholar-card h3 {
            font-weight: 700;
            margin-bottom: 15px;

        }

        .scholar-card p {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        .top-card {
            margin-top: -70px;
        }

        .bottom-card {
            margin-top: 70px;
        }

        @media(max-width:991px) {

            .top-card,
            .bottom-card {
                margin-top: 0;
            }

            .scholar-card {
                margin-bottom: 25px;
            }

        }

        @media(max-width:576px) {

            .section-heading h2 {
                font-size: 34px;
            }



        }


        /* testimonial */

        .testimonial-section .fa-play {
            color: #805CD8;
        }

        .heading-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 25px;
            margin-bottom: 40px;
        }

        .heading-wrap h2 {
            font-size: 52px;
            font-weight: 800;
            margin: 0;
        }

        .heading-line {
            width: 120px;
            height: 4px;
            background: #8b67e8;
            border-radius: 20px;
        }

        .testimonial-card {

            background: #c8b5f1;

            padding: 35px 25px;

            border-radius: 28px;

            text-align: center;

            height: 100%;

            transition: .3s;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
        }

        .play-btn {

            width: 55px;
            height: 55px;

            background: #fff;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            margin: auto auto 20px;

            color: #8b67e8;

            font-size: 22px;
        }

        .testimonial-card h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .testimonial-card p {
            font-size: 15px;
            line-height: 1.4;
            min-height: 70px;
        }

        .rating {
            margin-top: 18px;
        }

        .rating i {
            color: #FFD700;
            font-size: 18px;
            margin: 0 2px;
        }

        .swiper-pagination {
            margin-top: 25px;
            position: relative;
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: #fff;
            border: 1px solid #6e58dd;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background: #b8a2f2;
        }

        @media(max-width:991px) {

            .heading-wrap h2 {
                font-size: 38px;
            }

            .heading-line {
                width: 70px;
            }

        }

        @media(max-width:576px) {

            .heading-wrap {
                gap: 10px;
            }

            .heading-wrap h2 {
                font-size: 28px;
            }

            .heading-line {
                width: 45px;
            }

        }




        /* slider */
        .custom-slider {
            padding: 20px 0;
        }

        .custom-slider .slider-wrapper {

            position: relative;

            background:
                url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1400');

            background-size: cover;
            background-position: center;

            min-height: 500px;

            overflow: hidden;
        }

        .custom-slider .left-image {

            position: absolute;

            left: 30px;
            top: 0;

            width: 40%;
            height: 100%;

            z-index: 3;
        }

        .left-image img {

            width: 100%;
            height: 100%;

            object-fit: cover;
            border-radius: 0;
        }

        .custom-slider .content-box {

            background: #fff;

            width: 58%;

            padding: 80px;

            border-radius:
                0 50px 50px 0;

            position: absolute;

            right: 25px;

            top: 50%;

            transform: translateY(-50%);

            z-index: 4;
        }

        .custom-slider .content-box h2 {
            font-weight: 800;
        }

        .custom-slider .content-box p {
            line-height: 1.7;
            color: #555;
        }

        .custom-slider .carousel-indicators {

            bottom: 15px;
            justify-content: center;
            margin-right: 60px;
        }

        .custom-slider .carousel-indicators button {

            width: 14px !important;
            height: 14px !important;

            border-radius: 50%;

            background: #fff !important;
            opacity: 1;
            border: none !important;
        }

        .custom-slider .carousel-indicators .active {
            background: #b798f2 !important;
        }

        .custom-slider .custom-slider .carousel-indicators [data-bs-target] {
            background-color: #fff !important;
            height: 16px !important;
            width: 16px !important;
        }

        @media(max-width:991px) {

            .custom-slider .slider-wrapper {
                min-height: auto;
                padding: 30px;
            }

            .custom-slider .left-image {
                position: relative;
                width: 100%;
                height: 300px;
                left: auto;
                margin-bottom: 25px;
            }

            .custom-slider .content-box {

                position: relative;

                width: 100%;

                right: auto;
                top: auto;

                transform: none;

                padding: 35px;

                border-radius: 30px;

            }





            .custom-slider .carousel-indicators {
                justify-content: center;
                margin-right: 0;
            }

        }



        /* faqs */
        .faq-section {
            background: #f4f4f4;

            .faq-heading {

                text-align: center;
                margin-bottom: 40px;

                h2 {
                    font-size: 50px;
                    font-weight: 800;
                    margin-bottom: 15px;
                }

                p {
                    max-width: 700px;
                    margin: auto;
                    color: #555;
                    line-height: 1.5;
                }

            }

            .faq-wrapper {
                max-width: 1050px;
                margin: auto;
            }


            .accordion {

                .accordion-item {

                    border: none;
                    margin-bottom: 22px;

                    border-radius: 18px !important;

                    overflow: hidden;

                    box-shadow:
                        0 5px 10px rgba(0, 0, 0, .15);

                    background: #fff;

                }


                .accordion-button {

                    background: #fff;

                    padding: 16px 14px;

                    font-size: 20px;

                    font-weight: 600;

                    color: #333;

                    box-shadow: none;

                    display: flex;
                    align-items: center;
                    gap: 15px;
                }

                .accordion-button::after {
                    color: #d3d3d3;
                }

                .accordion-button {
                    font-size: 16px;
                }

                .accordion-button:not(.collapsed) {
                    font-size: 16px;
                    background: #efebfb;

                    color: #8460e7;
                }


                .faq-icon {

                    width: 26px;
                    height: 26px;

                    border-radius: 50%;

                    background: #ede8fa;

                    display: flex;

                    align-items: center;
                    justify-content: center;

                    color: #8460e7;

                    flex-shrink: 0;
                }


                .accordion-body {

                    padding: 10px 54px;
                    font-size: 14px;
                    color: #444;

                    line-height: 1.7;

                    border-top:
                        1px solid #ececec;
                }

            }

        }


        @media(max-width:991px) {

            .faq-section {

                .faq-heading {

                    h2 {
                        font-size: 38px;
                    }

                }

                .accordion {

                    .accordion-button {
                        font-size: 17px;
                        padding: 18px;
                    }

                    .accordion-body {
                        padding: 20px;
                        font-size: 13px;
                    }

                }

            }

        }



        @media(max-width:576px) {

            .faq-section {

                padding: 40px 0;

                .faq-heading {

                    h2 {
                        font-size: 30px;
                    }

                    p {
                        font-size: 14px;
                    }

                }

            }

        }

        .faq-icon {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #ede8fa;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #8460e7;
            flex-shrink: 0;
            position: relative;
        }

        /* Default = + */
        .faq-icon::before {
            content: "+";
            font-size: 18px;
            font-weight: 700;
        }

        /* Open state = - */
        .accordion-button:not(.collapsed) .faq-icon::before {
            content: "−";
        }



        /* blog */
        .blog-section {

            background: #8dd8ff;
            padding: 50px 0;
        }

        .blog-heading {
            text-align: center;
        }

        .blog-heading h2 {
            font-size: 48px;
            font-weight: 800;
        }



        .blog-card {

            background: #fff;

            overflow: hidden;

            height: 100%;

            transition: .4s;

            box-shadow:
                0 5px 12px rgba(0, 0, 0, .12);

        }

        .blog-card:hover {

            transform:
                translateY(-8px);

        }

        .blog-image {

            height: 240px;
            overflow: hidden;
        }

        .blog-image img {

            width: 100%;
            height: 100%;

            object-fit: cover;
            transition: .5s;
        }

        .blog-card:hover img {
            transform: scale(1.05);
        }

        .blog-content {
            padding: 25px;
            text-align: center;
        }

        .update-btn {

            background: #000;
            color: #fff;

            padding: 4px 18px;

            border: none;

            border-radius: 40px;

            font-weight: 600;

            box-shadow:
                0 4px 8px rgba(0, 0, 0, .25);

            margin-top: -42px;

            position: relative;
            font-size: 14px;
            z-index: 5;
        }

        .blog-title {
            font-weight: 700;

            margin: 25px 0 20px;
        }

        .blog-desc {

            font-size: 15px;

            color: #444;

            line-height: 1.5;

            min-height: 60px;
        }

        .read-more {
            color: #8664eb;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .read-more:hover {
            color: #6846d5;
        }

       

        @media(max-width:576px) {

            .blog-heading h2 {
                font-size: 34px;
            }

            .blog-wrapper {
                padding: 30px 20px;
            }

            .blog-image {
                height: 220px;
            }

            .read-more {
                font-size: 22px;
            }

        }


        /* Q&A */
        .qa-section {

            background: #b394f0;
        }

        .top-heading {
            text-align: center;
        }

        .top-heading h2 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .top-heading p {
            max-width: 650px;
            margin: auto;
            line-height: 1.5;
            color: #555;
        }

        .heading-line {
            width: 90px;
            height: 8px;
            background: #7e58e8;
            margin: 18px auto 0;
            border-radius: 20px;
        }

        .qa-wrapper {}

        .qa-wrapper .left-side {
            padding-right: 30px;
        }

        @media (max-width:991px) {
            .qa-wrapper .left-side {
                padding-right: 0;
            }
        }

        .left-side h3 {
            font-size: 58px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
        }

        .left-side .big-text {
            line-height: 1.3;
            color: #fff;
            margin-bottom: 25px;
        }

        .left-image {

            height: 310px;

            border-radius: 16px;

            overflow: hidden;

            margin-bottom: 20px;
        }

        .left-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .question-box {

            background: #fff;

            padding: 20px;

            border-radius: 14px;

            box-shadow:
                0 5px 10px rgba(0, 0, 0, .15);

        }

        .question-box h4 {
            font-size: 34px;
            font-weight: 700;
            color: #7e58e8;
            margin-bottom: 15px;
        }

        .question-box p {
            line-height: 1.8;
            color: #444;
            font-size: 14px;
            margin-bottom: 0;
        }

        .answer-card {

            background: #fff;

            padding: 20px;

            border-radius: 14px;

            box-shadow:
                0 5px 10px rgba(0, 0, 0, .15);

            margin-bottom: 22px;

        }

        .answer-card h4 {

            font-size: 34px;
            font-weight: 700;

            color: #7e58e8;

            margin-bottom: 15px;
        }

        .answer-card p {
            line-height: 1.8;
            color: #444;
            font-size: 14px;
            margin-bottom: 0;
        }

        @media(max-width:991px) {

            .left-side {
                margin-bottom: 35px;
            }

            .left-side h3 {
                font-size: 40px;
            }



            .answer-card h4,
            .question-box h4 {
                font-size: 26px;
            }

        }

        @media(max-width:576px) {

            .qa-section {
                padding: 40px 0;
            }

            .top-heading h2 {
                font-size: 32px;
            }

            .left-side h3 {
                font-size: 32px;
            }



            .answer-card,
            .question-box {
                padding: 10px;
            }

            .answer-card h4,
            .question-box h4 {
                font-size: 22px;
            }

            .left-image {
                height: 220px;
            }

        }



        /* compare */
        .compare-section {

            background: #f5f5f5;
            background:
                linear-gradient(rgba(78, 56, 144, .65),
                    rgba(78, 56, 144, .65)),

                url('../images/comparison.png');

            background-size: cover;
            background-position: center;
        }

        .param-tab-btn {
            position: relative;
            padding-right: 20px;

        }

        .param-tab-btn::after {

            content: "|";

            position: absolute;

            right: 0;

            top: 50%;

            transform: translateY(-50%);

            color: #999;

        }

        .param-tab-btn:last-child::after {
            display: none;
        }

        .heading-wrap {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading-wrap h2 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .heading-wrap p {
            max-width: 700px;
            margin: auto;
            color: #555;
            line-height: 1.5;
        }

        .title-line {
            width: 120px;
            height: 8px;
            background: #7f5ae8;
            border-radius: 30px;
            margin: 20px auto 0;
        }


        .compare-card {

            background: #fff;

            border: 3px solid #8d66f1;

            border-radius: 12px;

            padding: 15px;

            box-shadow:
                0 5px 12px rgba(0, 0, 0, .15);

            height: 100%;
        }

        .card-top {

            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 15px;
        }

        .option-tag {

            background: #efe8ff;

            color: #8d66f1;

            font-size: 12px;

            padding: 6px 12px;

            border-radius: 20px;

            font-weight: 700;
        }

        .delete-icon {
            color: #8d66f1;
            font-size: 14px;
            cursor: pointer;
        }

        .compare-card label {

            font-size: 14px;
            font-weight: 700;

            display: block;

            margin-bottom: 8px;

            color: #666;
        }

        .form-select {
            background-color: #f1f1f1;
            border: none;
            font-size: 14px;
        }

        .compare-card .field {
            margin-bottom: 18px;
        }

        @media(max-width:991px) {

            .compare-card {
                margin-bottom: 25px;
            }

            .heading-wrap h2 {
                font-size: 38px;
            }

        }

        @media(max-width:576px) {

            .compare-section {
                padding: 40px 0;
            }

            .heading-wrap h2 {
                font-size: 30px;
            }

            .heading-wrap p {
                font-size: 14px;
            }

            .compare-bg {
                padding: 40px 20px;
            }

        }



        /* testimonial */

        .text-testimonial .swiper-wrapper {
            padding: 20px 0;
        }

        .testimonial-card img {
            transition: all .5s ease;
        }

        .testimonial-card:hover img {
            transform: scale(1.08) translateY(-8px);
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h2 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .heading h2 span {
            color: #8460e7;
            font-size: 52px;

        }

        .heading p {
            max-width: 650px;
            margin: auto;
            color: #444;
            line-height: 1.5;
        }

        .heading-line {
            width: 110px;
            height: 8px;
            background: #8460e7;
            border-radius: 30px;
            margin: 20px auto 0;
        }

        .testimonial-card {

            border: 1.8px solid #c9b6ff;

            border-radius: 35px;

            padding: 25px;

            text-align: center;

            background: #fff;

            height: 100%;

            transition: .4s;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
        }

        .profile {

            width: 70px;
            height: 70px;

            margin: auto auto 20px;

            border-radius: 50%;

            overflow: hidden;

            border: 2px solid #8460e7;
        }

        .profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-card h3 {

            font-size: 20px;
            font-weight: 700;

            margin-bottom: 18px;
        }

        .testimonial-card p {
            font-size: 15px;
            line-height: 1.5;
            min-height: 55px;
        }

        .stars {
            margin-top: 20px;
        }

        .stars i {
            color: #f1cb18;
            font-size: 16px;
            margin: 0 2px;
        }

        .swiper-pagination {
            margin-top: 30px;
            position: relative;
        }

        .swiper-pagination-bullet {

            width: 14px;
            height: 14px;

            border: 1px solid #6f58d8;

            background: #fff;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background: #8e67ec;
        }

        @media(max-width:991px) {

            .heading h2,
            .heading h2 span {
                font-size: 38px !important;
            }

        }

        @media(max-width:576px) {

            .text-testimonial {
                padding: 50px 0;
            }

            .heading h2,
            .heading h2 span {
                font-size: 30px !important;
            }

            .heading p {
                font-size: 14px;
            }

            .testimonial-card {
                padding: 20px;
            }

        }





        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading h2,
        .section-heading h2 span {
            font-size: 50px;
            font-weight: 800;
        }

        .section-heading span {
            color: #7e58e8;
        }

        .section-heading p {
            max-width: 700px;
            margin: auto;
            color: #444;
        }

        .heading-line {
            width: 140px;
            height: 8px;
            background: #7e58e8;
            border-radius: 30px;
            margin: 20px auto 0;
        }

        .mention-column {

            background: #f8f8f8;

            padding: 18px;

            border-radius: 14px;

            height: 100%;
        }

        .column-top {

            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 18px;
        }

        .column-top h4 {
            font-weight: 700;
            margin: 0;
        }

        .column-top i {
            color: #9f82ef;
            font-size: 18px;
        }

        .mention-card {

            padding: 16px;

            border-radius: 10px;

            display: flex;

            gap: 15px;

            align-items: center;

            margin-bottom: 14px;

            box-shadow:
                0 3px 8px rgba(0, 0, 0, .12);
        }

        .purple {
            background: #cdbbf3;
        }

        .cream {
            background: #f2efeb;
        }

        .green {
            background: #bcccb8;
        }

        .icon-box {
            font-size: 28px;
        }

        .card-content h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .card-content p {
            margin: 5px 0 0;
            font-size: 14px;
        }

        @media(max-width:991px) {

            .section-heading h2,
            .section-heading h2 span {
                font-size: 38px;
            }

            .mention-column {
                margin-bottom: 25px;
            }

        }

        @media(max-width:576px) {

            .mention-section {
                padding: 40px 0;
            }

            .section-heading h2,
            .section-heading h2 span {
                font-size: 30px;
            }

            .section-heading p {
                font-size: 14px;
            }

            .card-content h5 {
                font-size: 14px;
            }

        }





        .section-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-heading h2 {
            font-size: 54px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-heading h2 span {
            color: #7c59e8;
        }

        .section-heading p {
            color: #444;
            max-width: 650px;
            margin: auto;
        }

        .heading-line {
            width: 145px;
            height: 8px;
            background: #7c59e8;
            border-radius: 30px;
            margin: 20px auto 0;
        }

        .exam-card {
            width: 250px;
            height: 250px;

            border: 1.8px solid #000;

            border-radius: 50%;

            background: #fff;

            display: flex;

            flex-direction: column;

            justify-content: center;
            align-items: center;

            padding: 14px;

            margin: auto;

            transition: .4s;
        }

        .exam-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, .12);
        }

        .exam-icon {

            width: 70px;
            height: 70px;

            border-radius: 50%;

            overflow: hidden;

            margin-bottom: 20px;
        }

        .exam-icon img {

            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .exam-card h3 {

            font-size: 16px;

            font-weight: 800;

            text-align: center;

            color: #7c59e8;

            line-height: 1.25;

            margin-bottom: 14px;
            display: -webkit-box;

            -webkit-line-clamp: 2;

            -webkit-box-orient: vertical;

            overflow: hidden;

            text-overflow: ellipsis;

            line-height: 1.4;
        }

        .exam-card p {

            font-size: 13px;

            text-align: center;

            line-height: 1.5;

            max-width: 150px;

            margin: 0;
            display: -webkit-box;

            -webkit-line-clamp: 2;

            -webkit-box-orient: vertical;

            overflow: hidden;

            text-overflow: ellipsis;

            line-height: 1.4;
        }

        @media(max-width:991px) {

            .section-heading h2 {
                font-size: 40px;
            }

            .exam-card {
                margin-bottom: 14px;
            }

        }

        @media(max-width:576px) {

            .exam-section {
                padding: 50px 0;
            }

            .section-heading h2 {
                font-size: 32px;
            }

            .section-heading p {
                font-size: 14px;
            }

            .exam-card {

                width: 230px;
                height: 230px;

            }

            .exam-card h3 {
                font-size: 14px;
            }

            .exam-section .exam-card p {
                font-size: 12px !important;
            }

        }




        /* contact */

        .contact-box {

            background: #e7ddff;

            position: relative;

            overflow: hidden;
        }

        .contact-box::before {

            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 110px;
            height: 100%;

            background: #f3d53c;
        }

        .left-panel img {

            animation: floatImage 3s ease-in-out infinite;

        }

        @keyframes floatImage {

            0% {

                transform: translateY(0);

            }

            50% {

                transform: translateY(-15px);

            }

            100% {

                transform: translateY(0);

            }

        }

        .left-panel {

            background: #7c58e7;

            min-height: 400px;

            border-radius:
                0 25px 25px 0;

            display: flex;

            align-items: center;
            justify-content: center;

            position: relative;

            z-index: 2;

            padding: 40px;
        }

        .left-panel img {
            width: 100%;
            max-width: 320px;
        }

        .form-side {
            padding: 20px 50px;
            position: relative;
            z-index: 2;
        }

        .form-side h2 {

            font-weight: 800;
            margin-bottom: 5px;
        }

        .form-side p {
            color: #444;
            margin-bottom: 20px;
        }

        .input-label {

            display: flex;

            align-items: center;

            gap: 10px;

            font-weight: 500;

            margin-bottom: 10px;
        }

        .custom-input {

            border: none;

            height: 38px;

            border-radius: 40px;

            box-shadow:
                0 4px 10px rgba(0, 0, 0, .12);
        }

        .custom-textarea {

            height: 140px;

            resize: none;

            border: none;

            border-radius: 12px;

            box-shadow:
                0 4px 10px rgba(0, 0, 0, .12);
        }

        .send-btn {

            background: #000;
            color: #fff;

            border: none;

            padding: 12px 70px;

            border-radius: 35px;

            margin-top: 30px;

            font-weight: 600;

            box-shadow:
                0 4px 10px rgba(0, 0, 0, .2);
        }

        .send-btn:hover {
            opacity: .9;
        }

        @media(max-width:991px) {

            .left-panel {
                min-height: 320px;
                border-radius: 0;
            }

            .form-side {
                padding: 35px;
            }

            .form-side h2 {
                font-size: 42px;
            }

        }

        @media(max-width:576px) {

            .contact-section {
                padding: 30px 0;
            }

            .contact-box::before {
                width: 50px;
            }

            .form-side h2 {
                font-size: 32px;
            }

            .form-side {
                padding: 25px;
            }

            .send-btn {
                width: 100%;
            }

        }
    </style>
@endpush

@section('content')
    @php
        $orgTypes = \App\Models\OrganisationType::where('status', true)->orderBy('sort_order')->get();
    @endphp
    @if ($orgTypes->count() > 0)
        <section class="school-nav">
            <div class="container">
                <ul class="school-list">
                    @foreach ($orgTypes as $type)
                        <li>
                            <a href="#">{{ $type->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif


    <section class="hero-slider">
        <div class="container-fluid px-0">

            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                <!-- indicators -->

                <div class="carousel-indicators">
                    @foreach ($hero_sliders as $index => $slider)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>


                <div class="carousel-inner">
                    @forelse($hero_sliders as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}"
                                alt="{{ $slider->heading ?? 'banner' }}">
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img src="{{ asset('images/bannertest.png') }}" alt="banner">
                        </div>
                    @endforelse
                </div>

            </div>

        </div>
    </section>


    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                Featured University
            </h2>

            <p class="featured-desc">

                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's

            </p>

            <div class="title-line"></div>

        </div>

    </section>


    <section class="university-section ">

        <div class="container">

            <div class="row g-4 justify-content-center">

                @foreach ($organisations->take(12) as $org)
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="{{ route('pages.organisations.detail', $org->slug) }}" class="text-decoration-none">
                            <div class="uni-card">
                                @if ($org->logo_url)
                                    <img src="{{ env('BACKEND_URL') . '/' . $org->logo_url }}" alt="{{ $org->name }}">
                                @else
                                    <span class="fw-bold text-center px-2"
                                        style="font-size: 13px; color: #333;">{{ $org->name }}</span>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>


            <div class="text-center">
                <a href="{{ route('pages.home') }}"
                    class="btn-theme-1 mt-3 text-decoration-none d-inline-block text-center pt-2">
                    View More
                </a>
            </div>
        </div>

    </section>


    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                Talk To Experts
            </h2>

            <p class="featured-desc">

                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's

            </p>

            <div class="title-line"></div>

        </div>

    </section>


    <section class="info-section">

        <div class="container">

            <div class="row g-4 justify-content-center">

                @foreach ($experts->take(4) as $expert)
                    @php
                        $imgUrl = str_starts_with($expert->img, 'http')
                            ? $expert->img
                            : env('BACKEND_URL') . '/' . $expert->img;
                    @endphp
                    <div class="col-lg-3 col-md-6">

                        <div class="custom-card">

                            <div class="card-image" style="height: 250px; overflow: hidden;">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}">
                                    <img src="{{ $imgUrl }}" alt="{{ $expert->name }}"
                                        style="object-fit: cover; height: 100%; width: 100%;">
                                </a>
                            </div>

                            <h3 class="card-title">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}"
                                    class="text-decoration-none text-dark">{{ $expert->name }}</a>
                            </h3>

                            <p class="card-desc">
                                {{ $expert->role }} · {{ $expert->degree }}<br>
                                {{ $expert->exp }} · ⭐ {{ $expert->rating }}
                            </p>

                            <button class="btn-theme-2 btn-book-session" data-bs-toggle="modal"
                                data-bs-target="#bookingModal" data-provider-id="{{ $expert->id }}"
                                data-provider-type="expert" data-provider-name="{{ $expert->name }}"
                                data-provider-role="{{ $expert->role }}" data-provider-img="{{ $imgUrl }}">
                                Book Session
                            </button>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section>


    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                Our Trending Program
            </h2>
        </div>

    </section>


    <section class="about-section">

        <div class="container">

            @php
                $trending_courses = [];
                foreach ($organisations as $org) {
                    foreach ($org->courses as $c) {
                        if (count($trending_courses) < 3) {
                            $trending_courses[] = [
                                'org' => $org,
                                'course' => $c,
                            ];
                        }
                    }
                }
            @endphp

            @forelse($trending_courses as $index => $tc)
                @php
                    $org = $tc['org'];
                    $c = $tc['course'];
                    $img = $org->logo_url
                        ? env('BACKEND_URL') . '/' . $org->logo_url
                        : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=900';
                @endphp
                <div class="row align-items-center info-row">
                    @if ($index % 2 == 0)
                        <div class="col-lg-5">
                            <div class="image-box">
                                <img src="{{ $img }}" alt="{{ $c->course->name ?? 'Course' }}"
                                    style="max-height: 250px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="content-box">
                                <h2 class="sub-heading">{{ $c->course->name ?? 'N/A' }}</h2>
                                <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                    Offered by <strong>{{ $org->name }}</strong>.<br>
                                    Mode: {{ $c->mode ?? 'N/A' }} | Duration: {{ $c->duration ?? 'N/A' }}<br>
                                    {!! Str::limit(
                                        strip_tags(
                                            $c->placement_details ??
                                                ($c->eligibility ??
                                                    'Learn more about this dynamic program, its curriculum, fees, and career placement options.'),
                                        ),
                                        200,
                                    ) !!}
                                </p>
                                <a href="{{ route('pages.organisations.detail', $org->slug) }}"
                                    class="btn-theme-2 text-decoration-none d-inline-block text-center pt-2">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-7 order-lg-1 order-2">
                            <div class="content-box">
                                <h2 class="sub-heading">{{ $c->course->name ?? 'N/A' }}</h2>
                                <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                    Offered by <strong>{{ $org->name }}</strong>.<br>
                                    Mode: {{ $c->mode ?? 'N/A' }} | Duration: {{ $c->duration ?? 'N/A' }}<br>
                                    {!! Str::limit(
                                        strip_tags(
                                            $c->placement_details ??
                                                ($c->eligibility ??
                                                    'Learn more about this dynamic program, its curriculum, fees, and career placement options.'),
                                        ),
                                        200,
                                    ) !!}
                                </p>
                                <a href="{{ route('pages.organisations.detail', $org->slug) }}"
                                    class="btn-theme-2  text-decoration-none d-inline-block text-center pt-2">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-2 order-1">
                            <div class="image-box">
                                <img src="{{ $img }}" alt="{{ $c->course->name ?? 'Course' }}"
                                    style="max-height: 250px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <!-- fallback mock if no courses in database -->
                <div class="row align-items-center info-row">
                    <div class="col-lg-5">
                        <div class="image-box">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=900"
                                alt="students">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="content-box">
                            <h2>What is Lorem Ipsum?</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                            <button class="learn-btn">Learn More</button>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>

    </section>


    <section class="timeline-section">

        <div class="container">

            <h2 class="section-title main-heading">
                Why Choose enrollzy
            </h2>

            <p class="section-desc">
                We assist you with the right guidance for a successful career ahead.
            </p>

            <div class="title-line"></div>


            <div class="timeline">
                <div class="timeline-progress"></div>

                @forelse($home_services as $index => $service)
                    <div class="timeline-item row">
                        @if ($index % 2 == 0)
                            <div class="timeline-content left animate">
                                <div class="image-box">
                                    <img src="{{ asset('images/Choose-enrollzy.png') }}" alt="timeline">
                                </div>
                            </div>

                            <div class="timeline-content right animate">
                                <div class="card-box">
                                    <h3 class="sub-heading">{{ $service->title }}</h3>
                                    <p>{{ $service->description }}</p>
                                    @if ($service->footer_text)
                                        <button class="btn-theme-1">
                                            {{ $service->footer_text }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="timeline-content left animate">
                                <div class="card-box">
                                    <h3 class="sub-heading">{{ $service->title }}</h3>
                                    <p>{{ $service->description }}</p>
                                    @if ($service->footer_text)
                                        <button class="btn-theme-1">
                                            {{ $service->footer_text }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="timeline-content right animate">
                                <div class="image-box">
                                    <img src="{{ asset('images/Choose-enrollzy.png') }}" alt="timeline">
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <!-- default fallback mock items -->
                    <div class="timeline-item row">
                        <div class="timeline-content left animate">
                            <div class="image-box">
                                <img src="{{ asset('images/Choose-enrollzy.png') }}" alt="timeline">
                            </div>
                        </div>
                        <div class="timeline-content right animate">
                            <div class="card-box">
                                <h3 class="sub-heading">Stage 1</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <button class="btn-theme-1">Find</button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>

    </section>



    <section class="scholarship-section">

        <div class="container">

            <div class="section-heading heading">

                <h2 class="main-heading">
                    Scholarships & Benefits
                </h2>

                <p>
                    Check out the top student benefits and programs designed for your success.
                </p>

                <div class="title-line"></div>

            </div>


            <div class="row justify-content-center align-items-center g-4">

                @forelse($home_benefits->take(4) as $index => $benefit)
                    @php
                        $cardClass = $index == 0 || $index == 3 ? 'top-card' : 'bottom-card';
                    @endphp
                    <div class="col-lg-3 col-md-6">

                        <div class="scholar-card {{ $cardClass }}">

                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">

                            <h3 class="sub-heading-two text-white">{{ $benefit->title }}</h3>

                            <p class="text-white">
                                {{ $benefit->content }}
                            </p>

                            <button class="btn-theme-3">
                                Learn More
                            </button>

                        </div>

                    </div>
                @empty
                    <div class="col-lg-3 col-md-6">
                        <div class="scholar-card top-card">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
                            <h3 class="sub-heading-two text-white">Lorem Ipsum</h3>
                            <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                            <button class="learn-btn">Learn More</button>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>

    </section>



    <section class="testimonial-section">

        <div class="container">

            <div class="heading-wrap">

                <div class="heading-line"></div>

                <h2 class="main-heading">
                    Testimonials
                </h2>

                <div class="heading-line"></div>

            </div>



            <div class="swiper testimonialSwiper">

                <div class="swiper-wrapper">

                    @forelse($video_testimonials as $video)
                        <div class="swiper-slide">
                            <div class="testimonial-card"
                                style="background-image:linear-gradient(rgba(173, 41, 172, 0.35),rgba(111, 68, 117, 0.70)), url('{{ env('BACKEND_URL') . '/' . $video->thumbnail }}'); background-size: cover; background-position: center; min-height: 250px;">
                                <a href="{{ $video->video_url }}" target="_blank"
                                    class="play-btn text-decoration-none text-white d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 50px; height: 50px; background: #fff; backdrop-filter: blur(5px); border-radius: 50%;">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <h3>{{ $video->name }}</h3>
                                <p>
                                    {{ $video->course }}
                                </p>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star" style="color: #ffc107;"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="play-btn">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>



    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                Alumnai
            </h2>

            <p class="featured-desc">

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's

            </p>

            <div class="title-line"></div>

        </div>

    </section>





    @if ($site_alumni->count() > 0)
        <section class="custom-slider">

            <div class="container-fluid px-lg-4">

                <div id="customCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">


                    <div class="carousel-indicators">
                        @foreach ($site_alumni as $index => $alumnus)
                            <button type="button" data-bs-target="#customCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>



                    <div class="carousel-inner">

                        @foreach ($site_alumni as $index => $alumnus)
                            @php
                                $imgUrl = $alumnus->image
                                    ? (str_starts_with($alumnus->image, 'http')
                                        ? $alumnus->image
                                        : env('BACKEND_URL') . '/' . $alumnus->image)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($alumnus->name);
                            @endphp
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="slider-wrapper">

                                    <div class="left-image">
                                        <a href="{{ route('pages.alumni.detail', $alumnus->id) }}">
                                            <img src="{{ $imgUrl }}" alt="{{ $alumnus->name }}"
                                                style=" object-fit: cover; width: 100%;">
                                        </a>
                                    </div>


                                    <div class="content-box text-center">

                                        <h2 class="sub-heading text-center">
                                            {{ $alumnus->name }}
                                        </h2>

                                       
                                        <p class="mt-2 text-center">
                                            {{ $alumnus->experience_years ? $alumnus->experience_years . ' years of professional experience.' : '' }}
                                            Connect with our alumni working in top organizations worldwide to get real-world
                                            insights, career guidance, and mentorship.
                                        </p>

                                        <button type="button" class="btn-theme-1 mt-2 btn-book-session"
                                            data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            data-provider-id="{{ $alumnus->id }}" data-provider-type="alumni"
                                            data-provider-name="{{ $alumnus->name }}"
                                            data-provider-role="{{ $alumnus->designation }}"
                                            data-provider-img="{{ $imgUrl }}">
                                            Book Session
                                        </button>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>
    @endif





    @if ($faqs->count() > 0)
        <section class="faq-section">

            <div class="container">

                <div class="faq-heading">

                    <h2 class="main-heading">
                        FAQ
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




    @if ($blogs->count() > 0)
        <section class="featured-section">
            <div class="container">
                <div class="row col-12">
                    <div class="blog-heading">

                        <h2 class="main-heading">
                            Our Latest Blog
                        </h2>

                    </div>


                </div>
            </div>
        </section>
        <section class="blog-section">

            <div class="container">


                <div class="blog-wrapper">

                    <div class="row g-4">

                        @foreach ($blogs->take(3) as $blog)
                            <div class="col-lg-4 col-md-6">

                                <div class="blog-card">

                                    <div class="blog-image">

                                        <img src="{{ env('BACKEND_URL') . '/' . $blog->image }}"
                                            alt="{{ $blog->title }}">

                                    </div>


                                    <div class="blog-content">

                                        <button class="update-btn">
                                            Update
                                        </button>

                                        <h3 class="blog-title sub-heading-two">
                                            {{ $blog->title }}
                                        </h3>

                                        @if (!empty($blog->description))
                                            <p class="blog-desc">
                                                {!! Str::limit(strip_tags($blog->description), 100) !!}
                                            </p>
                                        @endif

                                        <a href="{{ route('pages.blogs.detail', $blog->slug) }}" class="read-more">
                                            Read More →
                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>
    @endif




    @if ($faqs->count() > 0)

        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-heading">

                            <h2 class="main-heading">
                                Questions & Answers
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



    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                Comparison
            </h2>

            <p class="featured-desc">

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's

            </p>

            <div class="title-line"></div>

        </div>

    </section>

    <section class="compare-section">

        <div class="container">
            <div class="compare-bg">

                <div class="container">

                    <div class="row g-4 justify-content-center">

                        @for ($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4 col-md-6">

                                <div class="compare-card" data-slot-card="{{ $i }}">

                                    <div class="card-top">

                                        <span class="option-tag">
                                            OPTION {{ $i }}
                                        </span>

                                        <img src="{{ asset('images/Vector.svg') }}" alt="img">

                                    </div>


                                    <div class="field">

                                        <label>
                                            UNIVERSITY
                                        </label>

                                        <select class="form-select org-selector" data-slot="{{ $i }}">

                                            <option value="">
                                                Choose Institution
                                            </option>
                                            @foreach ($organisations as $org)
                                                <option value="{{ $org->id }}">{{ $org->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>


                                    <div class="field">

                                        <label>
                                            Program
                                        </label>

                                        <select class="form-select course-selector" data-slot="{{ $i }}"
                                            disabled>

                                            <option value="">
                                                Select Course
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>
                        @endfor

                    </div>

                </div>

            </div>

            <!-- Parameters Quick Access -->
            <div id="paramTabs" class="param-tabs-wrapper mb-4 mt-4 d-none">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    <span class="fw-bold small text-uppercase">Quick Jump</span>
                </div>
                <div class="param-tabs-scroll d-flex gap-2"
                    style="overflow-x: auto; white-space: nowrap; padding-bottom: 10px;">
                    <!-- Tabs will be injected here -->
                </div>
            </div>

            <!-- Comparison Matrix -->
            <div id="comparisonResults"
                class="comparison-matrix-wrapper d-none shadow-premium rounded-4 overflow-hidden border-0 mt-4 bg-white p-3">
                <div class="table-responsive">
                    <table class="table comparison-matrix-table mb-0">
                        <thead>
                            <tr id="matrixHead">
                                <th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>
                                <!-- Slot headers injected here -->
                            </tr>
                        </thead>
                        <tbody id="matrixBody">
                            <!-- Comparison rows injected here -->
                        </tbody>
                    </table>
                </div>

                <div class="text-center py-4 bg-light border-top mt-3">
                    <button id="resetComparison" class="btn btn-dark rounded-pill px-5 py-2 shadow-sm">
                        <i class="fas fa-undo me-2"></i> Reset Comparison
                    </button>
                </div>
            </div>

            <div id="emptyMessage"></div>

        </div>

    </section>




    @if ($testimonials->count() > 0)
        <section class="text-testimonial">

            <div class="container">

                <div class="heading">

                    <h2 class="main-heading">
                        <span class="main-heading">Text</span> Testimonials
                    </h2>

                    <p>
                        What our students and parents have to say about their experience with us.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="swiper testimonialSlider">

                    <div class="swiper-wrapper">

                        @foreach ($testimonials as $testi)
                            <div class="swiper-slide">

                                <div class="testimonial-card">

                                    <div class="profile">
                                        @php
                                            $avatar = $testi->image
                                                ? (str_starts_with($testi->image, 'http')
                                                    ? $testi->image
                                                    : env('BACKEND_URL') . '/' . $testi->image)
                                                : 'https://ui-avatars.com/api/?name=' . urlencode($testi->name);
                                        @endphp
                                        <img src="{{ $avatar }}" alt="{{ $testi->name }}">

                                    </div>

                                    <h3>{{ $testi->name }}</h3>
                                    <h6 class="text-muted small mb-2">{{ $testi->role }}</h6>

                                    <p>
                                        {{ $testi->content }}
                                    </p>

                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa-solid fa-star" style="color: #ffc107;"></i>
                                        @endfor
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>

        </section>
    @endif



    @if ($noteworthy_categories->count() > 0)
        <section class="mention-section">

            <div class="container">

                <div class="section-heading heading">

                    <h2 class="main-heading">
                        <span class="main-heading">Noteworthy</span> Mentions
                    </h2>

                    <p>
                        Explore our popular certificates, credentials, and achievements.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="row g-4">

                    @php
                        $colors = ['purple', 'cream', 'green'];
                    @endphp
                    @foreach ($noteworthy_categories->take(3) as $cIndex => $category)
                        <div class="col-lg-4 col-md-6">

                            <div class="mention-column">

                                <div class="column-top">

                                    <h4 class="sub-heading-two text-capitalize">{{ $category->name }}</h4>

                                    <i class="fa-solid fa-arrow-right"></i>

                                </div>

                                @foreach ($category->mentions->take(6) as $mention)
                                    @php
                                        $colorClass = $colors[$cIndex % 3];
                                    @endphp
                                    @if ($mention->url)
                                        <a href="{{ $mention->url }}" class="text-decoration-none text-dark">
                                    @endif
                                    <div class="mention-card {{ $colorClass }}">

                                        <div class="icon-box">
                                            @if ($mention->image)
                                                <img src="{{ env('BACKEND_URL') . '/' . $mention->image }}"
                                                    alt="img" style="width: 32px; height: 32px; border-radius: 50%;">
                                            @else
                                                🏅
                                            @endif
                                        </div>

                                        <div class="card-content">

                                            <h5 class="text-white">
                                                {{ $mention->title }}
                                            </h5>

                                            <p>
                                                {{ $mention->subtitle }} @if ($mention->badge_text)
                                                    | {{ $mention->badge_text }}
                                                @endif
                                            </p>

                                        </div>

                                    </div>
                                    @if ($mention->url)
                                        </a>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif




    @if ($exams->count() > 0)
        <section class="exam-section">

            <div class="container">

                <div class="section-heading heading">

                    <h2 class="main-heading">
                        <span class="main-heading">Top</span> Exams
                    </h2>

                    <p>
                        Prepare for the top competitive exams in the country.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="row justify-content-center g-4">

                    @foreach ($exams->take(6) as $exam)
                        <div class="col-lg-4 col-md-6">

                            <div class="exam-card">

                                <div class="exam-icon">
                                    <img src="{{ asset('images/upsc.jpg') }}" alt="icon">
                                </div>

                                <h3>
                                    {{ $exam->name }}
                                </h3>

                                <p>
                                    {{ $exam->exam_type }} | {{ $exam->exam_category }}
                                </p>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif



    <section class="contact-section">

        <div class="container-fluid px-0">

            <div class="contact-box">

                <div class="row g-0 align-items-center">


                    <!-- LEFT -->

                    <div class="col-lg-5">

                        <div class="left-panel">

                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/customer-support-3483562-2912010.png"
                                alt="contact">

                        </div>

                    </div>


                    <!-- RIGHT -->

                    <div class="col-lg-7">


                        <form class="form-side" action="{{ route('leads.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Contact Form Enquiry">

                            <h2 class="main-heading">
                                Contact Us
                            </h2>

                            <p>
                                Leave us a message and our advisors will get back to you shortly.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-2">

                                    <div class="input-label">

                                        <i class="fa-solid fa-user"></i>

                                        <span>Name</span>

                                    </div>

                                    <input type="text" name="name" class="form-control custom-input" required>

                                </div>


                                <div class="col-md-6 mb-2">

                                    <div class="input-label">

                                        <i class="fa-solid fa-phone"></i>

                                        <span>Mobile</span>

                                    </div>

                                    <input type="tel" name="phone" class="form-control custom-input">

                                </div>

                            </div>

                            <div class="mb-2 d-none">

                                <div class="input-label">

                                    <i class="fa-solid fa-envelope"></i>

                                    <span>Email Address</span>

                                </div>

                                <input type="email" name="email" class="form-control custom-input" required>

                            </div>

                            <div class="input-label">

                                <i class="fa-solid fa-message"></i>

                                <span>Message</span>

                            </div>

                            <textarea name="message" class="form-control custom-textarea" required></textarea>


                            <button type="submit" class="btn-theme-1 mt-3">

                                Send

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection




@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
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
    </script>

    <script>
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
    </script>

    <script>
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
    </script>

    <script>
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
    </script>

    @php
        $compData = $organisations->mapWithKeys(function ($org) {
            return [
                $org->id => [
                    'name' => $org->name,
                    'courses' => $org->courses->map(function ($c) {
                        return [
                            'id' => $c->id,
                            'name' => $c->course->name ?? 'N/A',
                            'fee' => $c->fees ?? 'N/A',
                            'mode' => $c->mode ?? 'N/A',
                            'duration' => $c->duration ?? 'N/A',
                            'rating' => $c->rating ?? 0,
                            'placement' => strip_tags($c->placement_details) ?: 'N/A',
                            'eligibility' => strip_tags($c->eligibility) ?: 'N/A',
                            'admission' => strip_tags($c->admission_process) ?: 'N/A',
                            'roi' => $c->roi ?: 'N/A',
                            'industrial' => strip_tags($c->industrial_collaboration) ?: 'N/A',
                            'internship' => $c->internship_ranking ?: 'N/A',
                        ];
                    }),
                ],
            ];
        });
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orgData = @json($compData);

            const orgSelectors = document.querySelectorAll('.org-selector');
            const courseSelectors = document.querySelectorAll('.course-selector');
            const resultsDiv = document.getElementById('comparisonResults');
            const emptyMessage = document.getElementById('emptyMessage');
            const paramTabs = document.getElementById('paramTabs');
            const matrixHead = document.getElementById('matrixHead');
            const matrixBody = document.getElementById('matrixBody');
            const resetBtn = document.getElementById('resetComparison');

            const params = [{
                    label: 'Mode of Study',
                    key: 'mode',
                    icon: 'fas fa-laptop-house'
                },
                {
                    label: 'Total Fees',
                    key: 'fee',
                    icon: 'fas fa-money-bill-wave'
                },
                {
                    label: 'Duration',
                    key: 'duration',
                    icon: 'fas fa-clock'
                },
                {
                    label: 'Rating',
                    key: 'rating',
                    isRating: true,
                    icon: 'fas fa-star'
                },
                {
                    label: 'Eligibility',
                    key: 'eligibility',
                    icon: 'fas fa-user-check'
                },
                {
                    label: 'Admission Process',
                    key: 'admission',
                    icon: 'fas fa-file-signature'
                },
                {
                    label: 'Placement',
                    key: 'placement',
                    icon: 'fas fa-briefcase'
                },
                {
                    label: 'ROI',
                    key: 'roi',
                    icon: 'fas fa-chart-line'
                },
                {
                    label: 'Ind. Collaboration',
                    key: 'industrial',
                    icon: 'fas fa-handshake'
                },
                {
                    label: 'Internship Rank',
                    key: 'internship',
                    icon: 'fas fa-medal'
                }
            ];

            let selections = {
                1: null,
                2: null,
                3: null
            };

            orgSelectors.forEach(select => {
                select.addEventListener('change', function() {
                    const slot = this.getAttribute('data-slot');
                    const orgId = this.value;
                    const courseSelect = document.querySelector(
                        `.course-selector[data-slot="${slot}"]`);

                    courseSelect.innerHTML = '<option value="">Select Course</option>';
                    selections[slot] = null;

                    if (orgId && orgData[orgId]) {
                        courseSelect.disabled = false;
                        const compareCard = this.closest(".compare-card");
                        if (compareCard) compareCard.classList.add('active-slot');

                        orgData[orgId].courses.forEach(course => {
                            const option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                    } else {
                        courseSelect.disabled = true;
                        const compareCard = this.closest(".compare-card");
                        if (compareCard) compareCard.classList.remove('active-slot');
                    }

                    updateComparison();
                });
            });

            courseSelectors.forEach(select => {
                select.addEventListener('change', function() {
                    const slot = this.getAttribute('data-slot');
                    const courseId = this.value;
                    const orgId = document.querySelector(`.org-selector[data-slot="${slot}"]`)
                        .value;

                    if (courseId && orgId) {
                        const courseData = orgData[orgId].courses.find(c => c.id == courseId);
                        selections[slot] = {
                            orgName: orgData[orgId].name,
                            ...courseData
                        };
                    } else {
                        selections[slot] = null;
                    }

                    updateComparison();
                });
            });

            function updateComparison() {
                const activeSelections = Object.values(selections).filter(s => s !== null);

                if (activeSelections.length > 0) {
                    emptyMessage.classList.add('d-none');
                    resultsDiv.classList.remove('d-none');
                    paramTabs.classList.remove('d-none');
                    renderTabs();
                    renderMatrix(activeSelections);
                } else {
                    emptyMessage.classList.remove('d-none');
                    resultsDiv.classList.add('d-none');
                    paramTabs.classList.add('d-none');
                }
            }

            function renderTabs() {
                const scrollContainer = paramTabs.querySelector('.param-tabs-scroll');
                scrollContainer.innerHTML = '';
                params.forEach(p => {
                    const btn = document.createElement('div');
                    btn.className = 'param-tab-btn';
                    btn.innerHTML = `<i class="${p.icon} me-1 small"></i> ${p.label}`;
                    btn.onclick = () => {
                        const target = document.getElementById('row-' + p.key);
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            target.style.backgroundColor = 'rgba(128, 92, 216, 0.05)';
                            setTimeout(() => target.style.backgroundColor = '', 2000);
                        }
                    };
                    scrollContainer.appendChild(btn);
                });
            }

            function renderMatrix(data) {
                let headHtml = `<th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>`;
                data.forEach(item => {
                    headHtml += `
                        <th class="matrix-org-header">
                            <div class="matrix-org-badge text-truncate px-2" style="font-size:1.1rem;font-weight:700;color:#fff;">${item.orgName}</div>
                            <div class="matrix-course-badge text-truncate px-2" style="font-size:0.8rem;background:rgba(255,255,255,0.2);padding:2px 8px;border-radius:4px;color:#fff;">${item.name}</div>
                        </th>`;
                });
                matrixHead.innerHTML = headHtml;

                let bodyHtml = '';
                params.forEach(p => {
                    bodyHtml += `<tr id="row-${p.key}">
                        <td class="params-column ps-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3 bg-light text-primary d-none d-lg-flex" style="width:30px;height:30px;border-radius:50%;align-items:center;justify-content:center;font-size:0.8rem;">
                                    <i class="${p.icon}"></i>
                                </div>
                                <div class="matrix-label" style="font-weight:700;font-size:0.8rem;text-transform:uppercase;">${p.label}</div>
                            </div>
                        </td>`;
                    data.forEach(item => {
                        let val = item[p.key] || 'N/A';
                        if (p.isRating) {
                            const starCount = Math.round(val);
                            let stars = '';
                            for (let i = 1; i <= 5; i++) {
                                stars +=
                                    `<i class="fa${i <= starCount ? 's' : 'r'} fa-star text-warning"></i>`;
                            }
                            val =
                                `<div class="rating-box">${stars} <span class="ms-1 text-dark fw-bold">${val}</span></div>`;
                        }
                        bodyHtml += `<td>
                            <div class="matrix-value-card">
                                <div class="matrix-value" style="color:#475569;">${val}</div>
                            </div>
                        </td>`;
                    });
                    bodyHtml += '</tr>';
                });
                matrixBody.innerHTML = bodyHtml;
            }

            resetBtn.addEventListener('click', function() {
                orgSelectors.forEach(s => s.value = '');
                courseSelectors.forEach(s => {
                    s.innerHTML = '<option value="">Select Course</option>';
                    s.disabled = true;
                });
                document.querySelectorAll('.compare-card').forEach(c => c.classList.remove('active-slot'));
                selections = {
                    1: null,
                    2: null,
                    3: null
                };
                updateComparison();
            });
        });
    </script>
@endpush
