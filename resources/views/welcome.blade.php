<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/main.css', 'resources/css/font-awesome.min.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header id="header" class="alt">


        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end me-5">
                <div class="float-start ms-5">
                    <h3 class="float-md-start mb-0"><img src="" alt="" srcset=""></h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        {{-- <form id="langform" action="{{ route('user.lang') }}" method="get" class="d-flex align-items-center"> --}}
                        <select class="form-select" name="lang" id="lang" onchange="this.form.submit()">
                            <option disabled>Language</option>
                            <option value="en" @if (Session::get('locale', 'en') == 'en') selected @endif> English</option>
                            <option value="fr" @if (session('locale') == 'lt') selected @endif> Lithuania
                            </option>
                        </select>
                        {{-- </form> --}}
                    </nav>
                </div>
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-outline-light">
                        Dashboard
                    </a>
                @else
                    <button type="button" class="btn btn-warning px-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Log in
                    </button>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-decoration-none border rounded ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    @include('logon')
    <!-- Banner --><!--
   To use a video as your background, set data-video to the name of your video without
   its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
   formats to work correctly.
  -->
    <section id="banner" data-video="images/banner" style="background-image: url({{ asset('images/banner.jpg') }})">
        < <div class="inner">
            <h1>Transitive</h1>
            <p>A full responsive, business-oriented HTML5/CSS3 template<br>
                built by <a href="https://templated.co/">Templated</a> and released under the <a
                    href="https://templated.co/license">Creative Commons</a>.</p>
            <a href="#one" class="button special scrolly">Get Started</a>
            </div>
    </section><!-- One -->
    <section id="one" class="wrapper style2">
        <div class="inner">
            <div>
                <div class="box">
                    <div class="image fit">
                        <img src="{{ asset('images/arh.jpeg') }}" alt="" width="3472" height="1035">
                    </div>
                    <div class="content">
                        <header class="align-center py-5">
                            <h2>List of conferences</h2>
                            <p>The agency will host a series of conferences focused on discussing innovations in
                                information technology and systems, bringing together specialists from various fields to
                                collaborate, share experiences, and exchange best practices.</p>

                        </header>
                        @forelse ($products as $product)
                            @if ($product->booked_from_date === $product->booked_to_date)
                                <h5 class=" fst-italic">
                                    {{ $product->booked_from_date }} from
                                    {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }} to
                                    {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                </h5>
                                <h6 class=" fst-italic text-muted">
                                    The duration of the event aproximately
                                    {{ $product->deference }} min.
                                </h6>
                                <h3> {{ $product->name }}</h3>
                                <p> {!! nl2br($product->detail) !!}</p>
                                <h5 class="text-muted fst-italic">Conference lecturer: {{ $product->user->name }}</h5>
                                <hr>
                            @else
                                <h5 class=" fst-italic">
                                    {{ $product->booked_from_date }} from
                                    {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }}
                                    until
                                    {{ $product->booked_to_date }} to
                                    {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                </h5>
                                <h6 class=" fst-italic text-muted">
                                    The duration of the event aproximately
                                    {{ $product->deference }} min.
                                </h6>
                                <h3> {{ $product->name }}</h3>
                                <p> {!! nl2br($product->detail) !!}</p>
                                <h5 class="text-muted fst-italic">Conference lecturer: {{ $product->user->name }}</h5>
                                <hr>
                            @endif
                        @empty
                            <div class=" justify-content-center d-flex">
                                <h3>No conferences found!</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Two -->
    <section id="two" class="wrapper style3" style="background-image: url({{ asset('images/bg.jpg') }})">
        <div class="inner">
            <div id="flexgrid">
                <div>
                    <header>
                        <h3>Tempus Feugiat</h3>
                    </header>
                    <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet,
                        lectus arcu</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </div>
                <div>
                    <header>
                        <h3>Aliquam Nulla</h3>
                    </header>
                    <p>Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh
                        sed </p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </div>
                <div>
                    <header>
                        <h3>Sed Magna</h3>
                    </header>
                    <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper
                        vehicula.</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- Three -->
    <section id="three" class="wrapper style2">
        <div class="inner">
            <div class="grid-style">
                <div class="box">
                    <div class="image fit">
                        <img src="{{ asset('images/pic02.jpg') }}" alt="" width="3472" height="1236">
                    </div>
                    <div class="content">
                        @php
                            $faker = Faker\Factory::create();
                            $faker_header = $faker->realText(500);
                            $faker_free_text = $faker->sentence;
                            $faker_title = $faker->sentence;
                        @endphp
                        <header class="align-center">
                            <h2>{{ $faker_title }}</h2>
                            <p>{{ $faker_free_text }}</p>
                        </header>
                        <hr>
                        <p> {{ $faker_header }}</p>
                    </div>
                </div>


                <div>
                    <div class="box">
                        <div class="image fit">
                            <img src="{{ asset('images/pic03.jpg') }}" alt="" width="3472" height="1236">
                        </div>
                        <div class="content">
                            @php
                                $faker = Faker\Factory::create();
                                $faker_header = $faker->realText(500);
                                $faker_free_text = $faker->sentence;
                                $faker_title = $faker->sentence;
                            @endphp
                            <header class="align-center">
                                <h2>{{ $faker_title }}</h2>
                                <p>{{ $faker_free_text }}</p>
                            </header>
                            <hr>
                            <p> {{ $faker_header }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Four -->
    <section id="four" class="wrapper style3">
        <div class="inner">

            <header class="align-center">
                @php
                    $faker = Faker\Factory::create();
                    $faker_text = $faker->realText(1660);
                    $faker_head = $faker->sentence;
                @endphp
                <h2>{{ $faker_head }}</h2>
                <p>{{ $faker->sentence }}</p>
                <p>{{ $faker_text }}</p>

            </header>
        </div>
    </section><!-- Footer -->
    <footer id="footer" class="wrapper">
        <div class="inner">
            <section>
                <div class="box">
                    <div class="content">
                        <h2 class="align-center">Get in Touch</h2>
                        <hr>
                        <form action="#" method="post">
                            <div class="field half first">
                                <label for="name">Name</label>
                                <input name="name" id="name" type="text" placeholder="Name">
                            </div>
                            <div class="field half">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="email" placeholder="Email">
                            </div>
                            <div class="field">
                                <label for="dept">Department</label>
                                <div class="select-wrapper">
                                    <select name="dept" id="dept">
                                        <option value="">- Category -</option>
                                        <option value="1">Manufacturing</option>
                                        <option value="1">Shipping</option>
                                        <option value="1">Administration</option>
                                        <option value="1">Human Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                            </div>
                            <ul class="actions align-center">
                                <li><input value="Send Message" class="button special" type="submit"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    <div class="copyright">
        Powered by: <a href="https://templated.co/">Templated.co</a>,

        <a href="http://www.ivko.org" target="_balnk">Audrius Ivko PIT-21-I-NT </a>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>



</body>
