@php
    $degrees = [
        [
            'university' => 'O.P. Jindal Global University',
            'degree' => 'MBA in Business Analytics',
            'level' => 'Master',
            'desc' => 'Learn to lead in a data-driven world with India’s top private university.',
            'logo' =>
                'https://storage-prtl-co.imgix.net/endor/organisations/23105/logos/1745430705_untitled-design-8.png',
            'deadline' => 'Dec 31, 2025',
        ],
        [
            'university' => 'BITS Pilani',
            'degree' => 'B.Sc Computer Science',
            'level' => 'Bachelor',
            'desc' => 'Build strong foundations in coding, data and problem-solving skills.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTSF8cRz631owFF1Bi3xfqrTpm1UNoPzsbDw&s',
            'deadline' => 'Jan 30, 2026',
        ],
        [
            'university' => 'IIT Guwahati',
            'degree' => 'B.Sc Data Science & AI',
            'level' => 'Bachelor',
            'desc' => 'Become an IITian and build a career in AI & Data Science.',
            'logo' => 'https://event.iitg.ac.in/icann2019/Proceedings_LaTeX/2019/IITG_White.png',
            'deadline' => 'Jan 29, 2026',
        ],
        [
            'university' => 'University of Huddersfield',
            'degree' => 'BSc Data Science',
            'level' => 'Bachelor',
            'desc' => 'Launch your data science career with a UK top-ranked university.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTo6kpmwBGA48ug2cykOwjLhqxTBui6K3deug&s',
            'deadline' => 'Jan 28, 2026',
        ],
        [
            'university' => 'Great Lakes Institute of Management',
            'degree' => 'PGPM',
            'level' => 'Master',
            'desc' => 'Globally recognized PGPM with top recruiters and placements.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb6rbAiExMrSe1LTGF0rO8bTRUIKbT6F4W_A&s',
            'deadline' => 'Feb 05, 2026',
        ],
        [
            'university' => 'Amity University',
            'degree' => 'B.Tech Computer Science',
            'level' => 'Bachelor',
            'desc' => 'Industry-driven curriculum with global exposure.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxsvh8dgq2DFre6zWuKW-GL_DEjTb2qrv0Iw&s',
            'deadline' => 'Jan 20, 2026',
        ],
        [
            'university' => 'VIT Vellore',
            'degree' => 'B.Tech AI & ML',
            'level' => 'Bachelor',
            'desc' => 'National level entrance based engineering program.',
            'logo' => 'https://i.pinimg.com/474x/2d/1d/36/2d1d3632086bf8503d9d6fe8e44d8427.jpg',
            'deadline' => 'Jan 18, 2026',
        ],
        [
            'university' => 'NMIMS',
            'degree' => 'MBA Tech',
            'level' => 'Master',
            'desc' => 'Blend of technology and management from a reputed institute.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUKItZ7cnaCdLULSfC-B9nLX4ACncq5RwFjQ&s',
            'deadline' => 'Feb 10, 2026',
        ],
         [
            'university' => 'IIT Guwahati',
            'degree' => 'B.Sc Data Science & AI',
            'level' => 'Bachelor',
            'desc' => 'Become an IITian and build a career in AI & Data Science.',
            'logo' => 'https://event.iitg.ac.in/icann2019/Proceedings_LaTeX/2019/IITG_White.png',
            'deadline' => 'Jan 29, 2026',
        ],
        [
            'university' => 'University of Huddersfield',
            'degree' => 'BSc Data Science',
            'level' => 'Bachelor',
            'desc' => 'Launch your data science career with a UK top-ranked university.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTo6kpmwBGA48ug2cykOwjLhqxTBui6K3deug&s',
            'deadline' => 'Jan 28, 2026',
        ],
        [
            'university' => 'Great Lakes Institute of Management',
            'degree' => 'PGPM',
            'level' => 'Master',
            'desc' => 'Globally recognized PGPM with top recruiters and placements.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb6rbAiExMrSe1LTGF0rO8bTRUIKbT6F4W_A&s',
            'deadline' => 'Feb 05, 2026',
        ],
        [
            'university' => 'Great Lakes Institute of Management',
            'degree' => 'PGPM',
            'level' => 'Master',
            'desc' => 'Globally recognized PGPM with top recruiters and placements.',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb6rbAiExMrSe1LTGF0rO8bTRUIKbT6F4W_A&s',
            'deadline' => 'Feb 05, 2026',
        ],
    ];
@endphp

<section class="degree-section">
    <div class="container">

        <div class="degree-header">
            <h2>Find the right degree for you</h2>

            <div class="filters">

                <div class="filter-dropdown">
                    <button class="filter-btn">
                        Program Level ▾
                    </button>

                    <div class="filter-menu">
                        <label>
                            <input type="checkbox" value="Bachelor"> Bachelor's Degree
                        </label>
                        <label>
                            <input type="checkbox" value="Master"> Master's Degree
                        </label>

                        <div class="filter-actions">
                            <button class="apply-filter">Apply</button>
                            <button class="clear-filter">Clear all</button>
                        </div>
                    </div>
                </div>

                <button class="btn btn-theme-one">
                    Email me info
                </button>

            </div>
        </div>
        <div class="row g-4 degree-grid">

            @foreach ($degrees as $degree)
                <div class="col-lg-3 col-md-6 degree-card-wrapper" data-level="{{ $degree['level'] }}">
                    <a href="#!">

                        <div class="degree-card">

                            <img src="{{ $degree['logo'] }}" alt="{{ $degree['university'] }}">

                            <h6>{{ $degree['university'] }}</h6>
                            <h5>{{ $degree['degree'] }}</h5>

                            <p>{{ $degree['desc'] }}</p>

                            <span class="deadline">
                                Application due {{ $degree['deadline'] }}
                            </span>

                        </div>
                    </a>

                </div>
            @endforeach

        </div>

    </div>
</section>
