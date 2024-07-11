@extends('user.layouts-user.main')

@section('title', 'Beranda')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1>SIG - Sistem Informasi Geografis Bencana Banjir</h1>
                    <p>SIG (Sistem Informasi Geografis) Bencana Banjir adalah sebuah sistem berbasis teknologi informasi
                        yang dirancang untuk mengumpulkan, menyimpan, menganalisis, dan menyajikan data geografis terkait
                        dengan kejadian banjir. Sistem ini berfungsi sebagai alat untuk manajemen bencana,
                        memberikan informasi yang akurat kepada pemerintah dan masyarakat umum.</p>
                    <div data-aos="fade-up">
                        <div class="text-left">
                            <a href="#"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Mulai</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets-user/img/logo/bg-1.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets-user/img/logo/bg-2.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up">
                    <div class="content">
                        <h3>TENTANG KAMI</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quas temporibus
                            assumenda, cum dolorum consequatur commodi officiis, sit facere repellendus animi dicta
                            fugit consectetur qui tenetur esse at. Molestiae, nulla!
                            Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor
                            consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam
                            et est corrupti.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Bencana</h2>
                <p>Macam Kebencanaan</p>
            </header>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/1.png') }}" class="custom-img" alt="Banjir">
                        <h3>Banjir</h3>
                        <p> Peristiwa alam di mana air menggenangi daratan yang biasanya kering karena curah
                            hujan yang sangat tinggi, sungai yang meluap, atau gelombang pasang yang tinggi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/2.png') }}" class="custom-img" alt="Gempa Bumi">
                        <h3>Gempa Bumi</h3>
                        <p>Gempa bumi dapat terjadi di perairan dan dapat menyebabkan kerusakan bangunan, tanah longsor,
                            atau tsunami. Terjadi ketika terjadi pelepasan energi yang cepat di dalam kerak bumi, yang
                            menyebabkan goncangan pada permukaan bumi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/3.png') }}" class="custom-img" alt="Tsunami">
                        <h3>Tsunami</h3>
                        <p>Gelombang besar yang muncul di lautan atau perairan yang dalam karena gempa bumi,
                            letusan gunung api di bawah laut, atau longsor bawah laut. Ini dapat menyebabkan banjir di
                            pesisir.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/4.png') }}" class="custom-img" alt="Tanah Longsor">
                        <h3>Tanah Longsor</h3>
                        <p>Tanah longsor terjadi ketika lapisan tanah atau batuan bergeser atau jatuh dari lereng. Ini dapat
                            terjadi karena curah hujan yang berlebihan, gempa bumi, atau aktivitas manusia seperti
                            deforestasi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/5.png') }}" class="custom-img" alt="Letusan Gunung Api">
                        <h3>Letusan Gunung Merapi</h3>
                        <p>Peristiwa pelepasan material vulkanik dari gunung api Merapi, seperti awan panas, lava pijar, dan
                            abu vulkanik, yang dapat mengancam kehidupan orang di sekitarnya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                    <div class="box">
                        <img src="{{ asset('assets-user/img/bencana/6.png') }}" class="custom-img" alt="Karthutla">
                        <h3>Karthutla</h3>
                        <p>Kebakaran yang terjadi di hutan atau lahan yang tidak terkendali yang sering disebabkan oleh
                            aktivitas manusia seperti pembukaan lahan pertanian atau kegiatan ilegal lainnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Values Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Upaya</h2>
                <p>Sistem Penanggulangan Bencana Banjir</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box orange">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Pra Bencana</h3>
                        <ol>
                            <li>Mengetahui istilah peringatan yang berhubungan
                                dengan bahaya banjir, seperti Siaga I sampai dengan Siaga
                                IV dan langkah yang harus dilakukan</li>
                            <li>Mengetahui tingkat kerentanan tempat tinggal kita, apakah
                                berada di zona rawan banjir</li>
                            <li>Mengetahui cara-cara untuk melindungi rumah kita dari banjir.</li>
                            <li>Mengetahui saluran dan jalur yang sering dilalui air banjir dan
                                apa dampaknya untuk rumah kita</li>
                            <li>Melakukan persiapan untuk evakuasi, termasuk memahami
                                rute evakuasi dan daerah yang lebih tinggi.</li>
                            <li>Mengetahui bagaimana mematikan air, listrik, dan gas</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-box orange">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Saat Bencana</h3>
                        <ol>
                            <li>Waspada terhadap arus bawah, saluran air, kubangan, dan tempat lain yang tergenang air.</li>
                            <li>Matikan semua jaringan listrik apabila diberi tahu oleh pihak berwenang. Keluarkan perangkat
                                yang masih terhubung ke listrik.</li>
                            <li>Apabila harus bersiap untuk evakuasi: amankan rumah, apabila masih ada waktu,
                                tempatkan perabot di luar rumah atau di tempat yang aman dari banjir. Jangan menyentuh
                                peralatan yang bermuatan listrik apabila berdiri di atas atau dalam air.</li>
                            <li>Barang yang lebih berharga diletakkan di bagian yang lebih tinggi. Karena banjir sering
                                terjadi tanpa peringatan, berhati-hatilah dengan saluran air atau lokasi di mana air
                                dapat mengalir dengan cepat.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-box orange">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Pasca Bencana</h3>
                        <ol>
                            <li>Hindari air banjir karena kemungkinan kontaminasi zat-zat
                                berbahaya dan ancaman kesetrum.</li>
                            <li>Hindari area yang airnya baru saja surut karena jalan bisa
                                saja keropos dan ambles.</li>
                            <li>Kembali ke rumah sesuai dengan perintah dari pihak
                                yang berwenang.</li>
                            <li>Hati-hati saat memasuki gedung karena ancaman kerusakan
                                yang tidak terlihat seperti pada fondasi.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

@endsection
