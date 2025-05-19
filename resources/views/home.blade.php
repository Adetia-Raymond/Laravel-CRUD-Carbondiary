@extends('carbonApp')

@section('content')
    <style>
        /*================= MAIN/HERO SECTION =================*/
        .hero-section {
            position: relative;
            padding: 60px 70px;
            display: flex;
            justify-content: center;
        }


        .hero-title {
            color: #006769;
            font-size: 48px;
            font-weight: 600;
            line-height: 55px;
            max-width: 648px;
            margin-bottom: 40px;
        }

        .cta-button {
            position: relative;
            background: transparent;
            border: 2px solid #006769;
            border-radius: 50px;
            color: #006769;
            font-size: 24px;
            font-weight: 500;
            padding: 20px 40px;
            cursor: pointer;
            overflow: hidden;
            z-index: 1;
            transition: color 0.3s ease;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 150%;
            background: #006769;
            z-index: -1;
            transition: top 0.5s ease;
            border-radius: 50% 50% 0 0;
        }

        .cta-button:hover::before {
            top: -40%;
        }

        .cta-button:hover {
            color: white;
        }

        .hero-image {
            object-fit: none;
            width: 650px;
            height: 600px;
        }

        @media (max-width: 991px) {
            .hero-section {
                padding: 50px 20px;
            }

            .hero-title {
                font-size: 24px;
                line-height: 32px;
            }

            .hero-image {
                display: none;
            }

            .cta-button {
                position: relative;
                background: transparent;
                border: 2px solid #006769;
                border-radius: 50px;
                color: #006769;
                font-size: 18px;
                font-weight: 500;
                padding: 12px 25px;
                cursor: pointer;
                overflow: hidden;
                z-index: 1;
                transition: color 0.3s ease;
            }
        }


        /*================= CARBON FOOTPRINT SECTION =================*/
        .carbon-footprint-section {
            display: flex;
            justify-content: center;
            gap: 56px;
            padding: 0 79px;
            margin-top: 50px;
        }

        .image-container {
            margin: 0;
        }

        .factory-image {
            width: 582px;
            height: 387px;
            object-fit: cover;
        }

        .content-container {
            max-width: 645px;
        }

        .section-heading {
            color: #006769;
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .description-text {
            font-size: 16px;
            line-height: 24px;
        }

        .description-text p {
            margin: 0;
        }

        .description-text p+p {
            margin-top: 24px;
        }

        @media (max-width: 991px) {
            .carbon-footprint-section {
                flex-direction: column;
                padding: 0 50px;
            }

            .factory-image {
                width: 100%;
                height: auto;
            }
        }

        @media (max-width: 640px) {
            .carbon-footprint-section {
                padding: 0 20px;
            }
        }

        /*================= CARBON IMPACT SECTION =================*/
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        .carbon-impact {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 66px;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
        }

        .main-title {
            margin: 50px auto;
            color: rgba(0, 103, 105, 1);
            font-size: 48px;
            font-weight: 600;
            line-height: 55px;
            text-align: center;
            width: 1339px;
            max-width: 100%;
        }

        .cards-container {
            display: flex;
            min-height: 433px;
            align-items: start;
            gap: 19px;
            overflow-x: auto;
            margin-top: 20px;
            padding-bottom: 20px;
        }

        .impact-card {
            border-radius: 100px;
            background-color: rgba(255, 255, 255, 1);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            min-width: 240px;
            width: 328px;
            height: 413px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .card-icon {
            width: 132px;
            height: 132px;
            object-fit: contain;
            margin-top: 33px;
        }

        .coin-icon {
            width: 126px;
            height: 126px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 33px;
        }

        .coin-inner {
            background-color: rgba(0, 103, 105, 1);
            width: 105px;
            height: 105px;
        }

        .card-title {
            color: rgba(0, 103, 105, 1);
            font-size: 24px;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            width: 100%;
        }

        .card-description {
            color: rgba(0, 0, 0, 1);
            font-size: 16px;
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            margin-top: 20px;
            padding: 0 20px;

            /* Add these */
            max-height: 138px;
            /* or any fixed value */
            overflow-y: auto;
        }

        @media (max-width: 991px) {
            .carbon-impact {
                max-width: 100%;
                padding-left: 20px;
                margin-top: 0px;
                margin-bottom: 40px;
            }
        }

        .cards-container::-webkit-scrollbar {
            display: none;
        }

        .cards-container {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /*================= CARBON TIPS SECTION =================*/
        .carbon-tips {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 66px;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
            padding: 0 50px 0;
        }

        .eco-tips-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, auto);
            gap: 20px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .eco-tip-card {
            flex: 1;
            border-radius: 26px;
            background-color: #ffffff;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            padding-bottom: 24px;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
            width: 100%;
        }

        .card-image {
            aspect-ratio: 2.95;
            object-fit: contain;
            object-position: center;
            width: 100%;
            border-radius: 26px 26px 0 0;
        }

        .tips-card-title {
            color: #006769;
            font-size: 24px;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            margin-top: 16px;
            margin-bottom: 4px;
        }

        .tips-card-description {
            color: #000000;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
            margin: 4px 34px 0;
        }

        .card-content {
            display: flex;
            margin-top: 16px;
            padding-left: 34px;
            padding-right: 34px;
            flex-direction: column;
        }

        @media (max-width: 991px) {
            .main-title {
                margin: 20px auto;
            }

            .carbon-tips {
                display: flex;
                justify-content: center;
                width: 100%;
                margin-top: 20px;
                font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
                padding: 0 20px 0;
            }

            .eco-tips-grid {
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                grid-template-columns: repeat(1, 1fr);
                grid-template-rows: repeat(1, auto);
            }

            .eco-tip-card {
                margin-top: 20px;
            }

            .tips-card-description {
                margin-left: 10px;
                margin-right: 10px;
            }

            .card-content {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        /*================= SDG BENEFITS SECTION =================*/
        .benefits-section {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 66px;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
            padding: 0 50px 0;

        }

        .benefits-container {
            gap: 20px;
            display: flex;
            max-width: 1274px;
        }

        .benefit-column {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            line-height: normal;
            width: 33%;
        }

        .benefit-content {
            display: flex;
            flex-grow: 1;
            flex-direction: column;
            align-items: stretch;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
            font-size: 16px;
            color: rgba(0, 0, 0, 1);
            font-weight: 400;
            text-align: center;
            line-height: 20px;
        }

        .benefit-image {
            aspect-ratio: 1;
            object-fit: contain;
            object-position: center;
            width: 100%;
        }

        .benefit-description {
            margin-top: 28px;
            align-self: center;
        }

        .benefit-column:not(:first-child) {
            margin-left: 20px;
        }

        @media (max-width: 991px) {
            .benefits-section {
                max-width: 100%;
                margin-top: 40px;
            }

            .benefits-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0px;
            }

            .benefit-column {
                width: 100%;
                margin-left: 0 !important;
            }

            .benefit-content {
                margin-top: 40px;
            }

            .benefit-description {
                margin-right: 7px;
            }
        }

        /*================= SDG BENEFITS SECTION =================*/
        .newsletter-footer {
            background-color: rgba(0, 103, 105, 1);
            border-radius: 50%;
            width: 100%;
            margin-top: 108px;
            padding-top: 132px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Poppins, -apple-system, Roboto, Helvetica, sans-serif;
        }

        .newsletter-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .newsletter-title {
            color: rgba(255, 255, 255, 1);
            font-size: 48px;
            font-weight: 600;
            line-height: 1;
            margin: 0;
        }

        .newsletter-description {
            color: rgba(255, 255, 255, 1);
            font-size: 16px;
            font-weight: 400;
            line-height: 1;
            margin-top: 14px;
            margin-bottom: 0;
        }

        .subscription-form {
            background-color: rgba(255, 255, 255, 1);
            border-radius: 100px;
            display: flex;
            margin-top: 30px;
            width: 730px;
            max-width: 100%;
            padding: 9px 25px;
            align-items: center;
            gap: 20px;
            justify-content: space-between;
            z-index: 10;
        }

        .email-input {
            border: none;
            color: rgba(217, 217, 217, 1);
            font-size: 16px;
            font-weight: 400;
            line-height: 1;
            font-family: inherit;
            background: transparent;
            flex-grow: 1;
        }

        .email-input::placeholder {
            color: rgba(217, 217, 217, 1);
        }

        .subscribe-button {
            border: none;
            border-radius: 90px;
            background-color: rgba(255, 196, 61, 1);
            padding: 0 29px;
            font-size: 20px;
            color: rgba(0, 103, 105, 1);
            font-weight: 500;
            line-height: 55px;
            cursor: pointer;
            font-family: inherit;
        }

        .footer-content {
            background-color: rgba(0, 103, 105, 1);
            width: 100%;
            padding: 117px 70px 75px;
            margin-bottom: -90px;
            z-index: 10;
        }

        .footer-columns {
            display: flex;
            max-width: 1012px;
            margin: 0 auto;
            gap: 20px;
            justify-content: space-between;
        }

        .company-info {
            flex: 1;
            min-width: 500px;
        }

        .brand-name {
            color: rgba(255, 255, 255, 1);
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            text-transform: uppercase;
            margin: 0;
        }

        .company-description {
            color: rgba(255, 255, 255, 1);
            font-size: 18px;
            font-weight: 400;
            line-height: 20px;
            margin-top: 16px;
            margin-bottom: 40px;
        }

        .social-links {
            display: flex;
            gap: 16px;
            list-style: none;
            padding: 0;
            margin-top: 21px;
        }

        .social-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: contain;
        }

        .footer-navigation {
            flex: 1;
        }

        .footer-nav-title {
            color: rgba(255, 255, 255, 1);
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            margin: 0;
        }

        .footer-nav-links {
            /* list-style: none; */
            margin-left: 20px;
            margin: 16px 0 0;
            padding-left: 18px;
        }

        .footer-nav-link {
            color: rgba(255, 255, 255, 1);
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
            text-decoration: none;
            display: block;
            margin-top: 13px;
        }

        .footer-nav-link:hover {
            text-decoration: underline;
        }

        .contact-info {
            flex: 1;
        }

        .contact-title {
            color: rgba(255, 255, 255, 1);
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            margin: 0;
        }

        .contact-details {
            margin-top: 16px;
            font-style: normal;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgba(255, 255, 255, 1);
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
            margin-top: 16px;
        }

        .contact-item:first-child {
            margin-top: 0;
        }

        .contact-icon {
            width: 17px;
            height: 17px;
            object-fit: contain;
        }

        @media (max-width: 991px) {
            .newsletter-footer {
                max-width: 100%;
                padding-top: 80px;
                margin-top: 40px;
                border-radius: 25%;
            }

            .newsletter-section {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                max-width: 300px;
            }

            .newsletter-title {
                max-width: 100%;
                font-size: 40px;
            }

            .newsletter-description {
                max-width: 100%;
            }

            .subscription-form {
                padding-left: 20px;
            }

            .company-info {
                flex: 1;
                min-width: 200px;
            }

            .subscribe-button {
                padding-left: 10px;
                padding-right: 10px;
                white-space: normal;
                font-size: 12px;

            }

            .footer-content {
                max-width: 100%;
                margin-bottom: 0px;
                padding: 80px 20px 20px;
            }

            .footer-columns {
                max-width: 100%;
                flex-direction: column;
            }

            .contact-item:last-child {
                white-space: normal;
            }
        }
    </style>

    <main>
        <!-- INTRODUCTION/HERO SECTION -->
        <section class="hero-section">
            <div class="hero-intro">
                <h1 class="hero-title">
                    Cari tahu berapa banyak emisi yang kamu hasilkan setiap hari dan mulailah
                    perubahan kecil untuk bumi yang lebih hijau!
                </h1>
                <button class="cta-button">Coba sekarang</button>
            </div>
            <figure class="hero-image-container">

                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/28bd38fac5dcae7b62e261d621175b73b608575e"
                    alt="World environment illustration" class="hero-image" />
            </figure>
        </section>

        <!-- CARBON FOOTPRINT SECTION -->
        <article class="carbon-footprint-section">
            <figure class="image-container">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5f2d6a8106032a5e44d582cc9ba4cc33e36da536"
                    alt="Factory emissions" class="factory-image" />
            </figure>
            <div class="content-container">
                <h2 class="section-heading">Apa itu jejak karbon?</h2>
                <div class="description-text">
                    <p>
                        Jejak karbon (carbon footprint) adalah jumlah total emisi gas rumah
                        kaca, terutama karbon dioksida (CO₂), yang dihasilkan oleh aktivitas
                        manusia, baik secara langsung maupun tidak langsung. Ini mencakup segala
                        sesuatu, mulai dari penggunaan listrik, transportasi, produksi makanan,
                        hingga proses industri.
                    </p>
                    <p>
                        Semakin besar jejak karbon seseorang, perusahaan, atau negara, semakin
                        besar pula kontribusinya terhadap pemanasan global dan perubahan iklim.
                        Oleh karena itu, mengurangi jejak karbon dengan cara seperti menggunakan
                        energi terbarukan, menghemat listrik, dan mengurangi penggunaan
                        kendaraan bermotor sangat penting untuk menjaga keseimbangan lingkungan.
                    </p>
                </div>
            </div>
        </article>

        <!-- DAMPAK CARBON SECTION -->
        <h1 class="main-title">Apa saja dampak jejak karbon bagi lingkungan?</h1>
        <section class="carbon-impact">
            <div class="cards-container">
                <article class="impact-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/7b0a134b0e034d886a301490845e4d658a74a0c4?placeholderIfAbsent=true"
                        alt="Climate change icon" class="card-icon">
                    <h2 class="card-title">Perubahan Iklim</h2>
                    <p class="card-description">
                        Carbon footprint yang tinggi meningkatkan emisi gas rumah kaca, menyebabkan suhu bumi naik.
                        Akibatnya, cuaca menjadi lebih ekstrem, dengan gelombang panas, badai, dan banjir yang lebih sering
                        terjadi.
                    </p>
                </article>

                <article class="impact-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/447c2c92140eed53c92a31d0b423a6ac306134a9?placeholderIfAbsent=true"
                        alt="Environmental damage icon" class="card-icon">
                    <h2 class="card-title">Kerusakan Lingkungan</h2>
                    <p class="card-description">
                        Emisi karbon yang berlebihan mempercepat deforestasi dan polusi udara, merusak ekosistem serta
                        mengurangi kualitas tanah dan air. Hal ini berdampak pada hilangnya keanekaragaman hayati dan
                        meningkatnya risiko bencana alam.
                    </p>
                </article>

                <article class="impact-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/c9fad2a9554028c319c486b720626ea2e83c715f?placeholderIfAbsent=true"
                        alt="Health impact icon" class="card-icon">
                    <h2 class="card-title">Dampak Kesehatan</h2>
                    <p class="card-description">
                        Polusi dari emisi karbon memperburuk kualitas udara, meningkatkan risiko penyakit pernapasan seperti
                        asma dan bronkitis. Suhu yang lebih panas juga bisa menyebabkan dehidrasi, stroke panas, hingga
                        kematian.
                    </p>
                </article>

                <article class="impact-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/d6499697fa3434ab0198bbe21998440424a50932?placeholderIfAbsent=true"
                        alt="Food security icon" class="card-icon">
                    <h2 class="card-title">Ketahanan Pangan</h2>
                    <p class="card-description">
                        Perubahan iklim yang dipicu oleh emisi karbon membuat pola cuaca tidak stabil, menyebabkan gagal
                        panen dan kelangkaan air bersih. Hal ini bisa mengarah pada kenaikan harga pangan dan ancaman
                        kelaparan bagi banyak orang.
                    </p>
                </article>

            </div>
        </section>

        <h1 class="main-title">Tips mengurangi jejak karbon</h1>
        <!-- TIPS CARBON SECTION -->
        <section class="carbon-tips">
            <div class="eco-tips-grid">
                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/43f5550cd9038f6ac13d2eecfa332897fa6ae02b?placeholderIfAbsent=true"
                        alt="Green Transportation" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Gunakan Transportasi Hijau</h2>
                        <p class="tips-card-description">
                            Pilih transportasi umum, bersepeda, atau berjalan kaki jika memungkinkan. Jika perlu kendaraan
                            pribadi, pertimbangkan kendaraan listrik atau carpooling untuk mengurangi emisi.
                        </p>
                    </div>
                </article>

                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/dbd1732ee89d68fdf5ca9591d4a1e4d4dbbb2ab6?placeholderIfAbsent=true"
                        alt="Energy Saving" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Hemat Energi</h2>
                        <p class="tips-card-description">
                            Matikan lampu dan perangkat elektronik saat tidak digunakan, gunakan lampu LED yang lebih hemat
                            energi, serta manfaatkan sinar matahari untuk penerangan alami.
                        </p>
                    </div>
                </article>

                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/36d563c132ceb049c6e4ab71f3baa4a7176034ff?placeholderIfAbsent=true"
                        alt="Reduce Reuse Recycle" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Reduce, Reuse, Recycle</h2>
                        <p class="tips-card-description">
                            Kurangi penggunaan plastik sekali pakai, gunakan kembali barang yang masih bisa dimanfaatkan,
                            dan daur ulang sampah untuk mengurangi limbah.
                        </p>
                    </div>
                </article>

                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/682db929c5a3ab8bfbc3860f67e5568549280d28?placeholderIfAbsent=true"
                        alt="Belanja Secara Bijak" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Belanja Secara Bijak</h2>
                        <p class="tips-card-description">
                            Pilih produk lokal dan musiman untuk mengurangi emisi dari transportasi barang. Bawa tas belanja
                            sendiri dan hindari produk dengan terlalu banyak kemasan plastik.
                        </p>
                    </div>
                </article>

                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/bfa61898fff010fc7afa3df6751620b86c6417b1?placeholderIfAbsent=true"
                        alt="Hemat Air" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Hemat Air</h2>
                        <p class="tips-card-description">
                            Gunakan air secukupnya, perbaiki kebocoran, dan pertimbangkan untuk menggunakan sistem
                            penyimpanan air hujan guna mengurangi energi yang digunakan untuk memproses air bersih.
                        </p>
                    </div>
                </article>

                <article class="eco-tip-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/0cb2bba77583aa93dea611402d17d5753934a39b?placeholderIfAbsent=true"
                        alt="Lakukan Penghijauan" class="card-image" />
                    <div class="card-content">
                        <h2 class="tips-card-title">Lakukan Penghijauan</h2>
                        <p class="tips-card-description">
                            Pohon menyerap karbon dioksida dan membantu meningkatkan kualitas udara. Jika tidak bisa menanam
                            pohon, Anda dapat menanam tanaman hias di sekitar rumah.
                        </p>
                    </div>
                </article>

            </div>
        </section>

        <h1 class="main-title">CarbonDiary mendukung <br> Sustainable Development Goals (SDGs)</h1>
        <!-- SDG BENEFITS SECTION -->
        <section class="benefits-section">
            <div class="benefits-container">
                <article class="benefit-column">
                    <div class="benefit-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/aceb5422fa53f40d8347cf809873bc2fdf5ea804?placeholderIfAbsent=true"
                            class="benefit-image" alt="Carbon Diary Benefit 1" />
                        <p class="benefit-description">
                            CarbonDiary dapat membantu pengguna memahami dampak konsumsi mereka
                            terhadap lingkungan dan mendorong gaya hidup yang lebih berkelanjutan,
                            seperti mengurangi limbah dan memilih produk lokal.
                        </p>
                    </div>
                </article>
                <article class="benefit-column">
                    <div class="benefit-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/888e645dc296197313e3f4e3433831442f7dd2ae?placeholderIfAbsent=true"
                            class="benefit-image" alt="Carbon Diary Benefit 2" />
                        <p class="benefit-description">
                            CarbonDiary secara langsung berkontribusi pada aksi iklim dengan
                            meningkatkan kesadaran dan mendorong pengurangan emisi karbon dalam
                            kehidupan sehari-hari.
                        </p>
                    </div>
                </article>
                <article class="benefit-column">
                    <div class="benefit-content">
                        <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/acd76b585ecac58009e3e9db64f4c6a34b77aceb?placeholderIfAbsent=true"
                            class="benefit-image" alt="Carbon Diary Benefit 3" />
                        <p class="benefit-description">
                            Dengan mengurangi emisi karbon, CarbonDiary mendukung upaya konservasi
                            hutan, keanekaragaman hayati, dan lingkungan yang lebih sehat secara
                            keseluruhan.
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer class="newsletter-footer">
        <section class="newsletter-section">
            <h2 class="newsletter-title">Subscribe untuk Berita Terbaru</h2>
            <p class="newsletter-description">Dapatkan berita terbaru tentang emisi karbon melalui email.</p>
            <form class="subscription-form">
                <input type="email" placeholder="Masukkan email Anda..." class="email-input">
                <button type="submit" class="subscribe-button">SUBSCRIBE</button>
            </form>
        </section>

        <section class="footer-content">
            <div class="footer-columns">
                <section class="company-info">
                    <h3 class="brand-name">CARBONDIARY</h3>
                    <p class="company-description">
                        CarbonDiary menawarkan platform untuk melacak dan mengurangi jejak karbon, serta mendukung gaya
                        hidup berkelanjutan.
                    </p>
                    <ul class="social-links">
                        <li><img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/693682b48f3a6e78ac0f60c00ac066ddb7ba5446?placeholderIfAbsent=true"
                                alt="Social Media" class="social-icon"></li>
                        <li><img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/e335d080916a60c704308c11994d2af039c248b1?placeholderIfAbsent=true"
                                alt="Social Media" class="social-icon"></li>
                        <li><img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/c67078a7f58766e46c39f29784ccd8bb4fca7c39?placeholderIfAbsent=true"
                                alt="Social Media" class="social-icon"></li>
                        <li><img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/8aa0ff65178f1a411b441b6907c6d1156c2c3dcc?placeholderIfAbsent=true"
                                alt="Social Media" class="social-icon"></li>
                    </ul>
                </section>

                <nav class="footer-navigation">
                    <h3 class="footer-nav-title">Pages</h3>
                    <ul class="footer-nav-links">
                        <li><a href="#" class="footer-nav-link">Home</a></li>
                        <li><a href="#" class="footer-nav-link">Calculator</a></li>
                        <li><a href="#" class="footer-nav-link">About</a></li>
                        <li><a href="#" class="footer-nav-link">Panduan</a></li>
                        <li><a href="#" class="footer-nav-link">Sign Up</a></li>
                    </ul>
                </nav>

                <section class="contact-info">
                    <h3 class="contact-title">Kontak</h3>
                    <address class="contact-details">
                        <div class="contact-item">
                            <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/b52ca4eb7a48c7c80eac91ee63ca21c15da721ce?placeholderIfAbsent=true"
                                alt="Location" class="contact-icon">
                            <span>Magelang, Indonesia</span>
                        </div>
                        <div class="contact-item">
                            <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/e62f76f4da9ac1bc6eb8e04b6af2c8ac851346e2?placeholderIfAbsent=true"
                                alt="Phone" class="contact-icon">
                            <span>+62 123 4567 8901</span>
                        </div>
                        <div class="contact-item">
                            <img src="https://cdn.builder.io/api/v1/image/assets/0c66eb5256784bcaa650e950fa21f5c7/d320ddbb961d1a03bebe2deef4c5216bf6455d0a?placeholderIfAbsent=true"
                                alt="Email" class="contact-icon">
                            <span>carbondiary@gmail.com</span>
                        </div>
                    </address>
                </section>
            </div>
        </section>
    </footer>

@endsection