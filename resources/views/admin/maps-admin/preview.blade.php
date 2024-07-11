@extends('admin.layouts-admin.main')

@section('title', 'Preview-SIG')

@section('content')
    <div class="page-heading">
        <h3>Preview</h3>
    </div>
    <div class="container">
        <div id="map">
            <div class="dba container-fluid">
                <div class="tdba">
                    <b>Dampak Bencana Alam</b>
                </div>
                <div class="row">
                    <div class="txt col-sm-6">Hilang</div>
                    <div class="tx col-sm-3"><span>10</span></div>
                </div>
                <div class="row">
                    <div class="txt col-sm-6"> Meninggal</div>
                    <div class="tx col-sm-3"><span>0</span></div>
                </div>
                <div class="row">
                    <div class="txt col-sm-6"> Terluka</div>
                    <div class="tx col-sm-3"><span>50</span></div>
                </div>
            </div>

            <div class="legend">
                <div class="tdba">
                    <b>Legenda:</b>
                </div>
                <!-- Frekuensi Kejadian -->
                <div class="legend-item" style="--color: #0573DA;">
                    <div class="color-box" style="background-color: #0573DA;"></div>
                    <div class="text">&gt;150</div>
                </div>
                <div class="legend-item" style="--color: #0084FE;">
                    <div class="color-box" style="background-color: #0084FE;"></div>
                    <div class="text">50-150</div>
                </div>
                <div class="legend-item" style="--color: #99BDF2;">
                    <div class="color-box" style="background-color: #99BDF2;"></div>
                    <div class="text">1-50</div>
                </div>
                <!-- Keparahan -->
                <div class="legend-item" style="--color: #FF0000;">
                    <div class="color-box" style="background-color: #FF0000;"></div>
                    <div class="text">&gt;1.5 m</div>
                </div>
                <div class="legend-item" style="--color: #FFFF00;">
                    <div class="color-box" style="background-color: #FFFF00;"></div>
                    <div class="text">0.76-1.5 m</div>
                </div>
                <div class="legend-item" style="--color: #00FF00;">
                    <div class="color-box" style="background-color: #00FF00;"></div>
                    <div class="text">&lt;0.76 m</div>
                </div>
            </div>

            {{-- <div id="judulKejadianBencana" class="leaflet-layerstree-header-name"></div> --}}
        </div>
    </div>

    <script src="{{ asset('assets-admin/compiled/js/peta.js') }}"></script>

    {{-- menampilkan peta berdasarkan titik --}}
    {{-- <script>
        // Inisialisasi peta dengan koordinat dan zoom awal
        var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

        // Tambahkan tile layer OpenStreetMap sebagai latar belakang peta
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        // Layer group untuk menyimpan marker
        var titik1 = L.marker([-8.254924, 114.341757]).bindPopup('Titik lokasi A');
        var titik2 = L.marker([-8.362892382426141, 114.2254719724655]).bindPopup('Titik lokasi B');
        var titik3 = L.marker([-8.274874738629721, 114.11990365245079]).bindPopup('Titik lokasi C');
        var titik4 = L.marker([-8.200000, 114.350000]).bindPopup('Titik lokasi D');
        var titik5 = L.marker([-8.431943942466374, 114.3352616100296]).bindPopup('Titik lokasi E');
        var titik6 = L.marker([-8.455546232922979, 114.35483100764625]).bindPopup('Titik lokasi F');
        var titik7 = L.marker([-8.301516975235728, 114.27745356986539]).bindPopup('Titik lokasi G');

        // Mengelompokkan titik ke dalam layer group berdasarkan kejadian
        var frekuensi = L.layerGroup([titik1, titik3]);
        var keparahan = L.layerGroup([titik2]);
        var tertangani = L.layerGroup([titik4, titik5]);
        var blmTertangani = L.layerGroup([titik6, titik7]);

        // Mengelompokkan titik ke dalam layer group berdasarkan tahun
        var thn2022 = L.layerGroup([titik1, titik4]);
        var thn2023 = L.layerGroup([titik2, titik5, titik7]);
        var thn2024 = L.layerGroup([titik3, titik6]);

        // Menambahkan layer ke peta
        map.addLayer(frekuensi); // Menambahkan layer kejadian frekuensi ke peta secara default
        map.addLayer(thn2023);

        var baseMaps = {
            "OpenStreetMap": osm,
            "OpenStreetMap.HOT": osmHOT
        };

        var overlayMaps = {
            "Frekuensi": frekuensi,
            "Keparahan": keparahan,
            "Tertangani": tertangani,
            "Belum Tertangani": blmTertangani,
            "2022": thn2022,
            "2023": thn2023,
            "2024": thn2024
        };

        // Menambahkan kontrol layer ke peta
        var layersControl = L.control.layers(baseMaps, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // Fungsi untuk menambahkan header
        function addHeader(container, text) {
            var header = document.createElement('span');
            header.className = 'header';
            header.innerHTML = text;
            container.appendChild(header);
        }

        // Menambahkan header secara manual (mendapatkan elemen container dari kontrol layer Leaflet yang menyimpan semua layer overlay)
        var overlaysContainer = layersControl._overlaysList;

        // Membuat elemen wrapper untuk header dan kontrol layer
        var kejadianContainer = document.createElement('div');
        var tahunContainer = document.createElement('div');

        // Menambahkan header ke dalam wrapper
        addHeader(kejadianContainer, 'Kejadian Bencana');
        addHeader(tahunContainer, 'Tahun');

        // Memindahkan kontrol layer ke dalam wrapper yang sesuai
        while (overlaysContainer.childNodes.length > 0) {
            var node = overlaysContainer.childNodes[0];
            if (node.innerHTML.includes('Frekuensi') || node.innerHTML.includes('Keparahan') || node.innerHTML
                .includes('Tertangani') || node.innerHTML.includes('Belum Tertangani')) {
                kejadianContainer.appendChild(node);
            } else {
                tahunContainer.appendChild(node);
            }
        }

        // Menambahkan wrapper ke dalam overlaysContainer
        overlaysContainer.appendChild(kejadianContainer);
        overlaysContainer.appendChild(tahunContainer);
    </script> --}}

    {{-- berdasarkan clustering marker --}}
    {{-- <script>
        // Inisialisasi peta dengan koordinat dan zoom awal
        var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

        // Tambahkan tile layer OpenStreetMap sebagai latar belakang peta
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        // Membuat cluster group
        var desaRgj = L.markerClusterGroup();
        var desaMuncar = L.markerClusterGroup();
        var desaGenteng = L.markerClusterGroup();

        // Layer group untuk menyimpan marker
        var titik1 = L.marker([-8.297087104296851, 114.30753102268709]).bindPopup('Lokasi Rogojampi, Desa Karang Bendo');
        var titik2 = L.marker([-8.333919771022156, 114.29530145412798]).bindPopup('Lokasi Rogojampi, Desa Gladag');
        var titik3 = L.marker([-8.299160839109767, 114.30179682362218]).bindPopup('Lokasi Rogojampi, Desa Gitik');
        var titik4 = L.marker([-8.45528731842464, 114.33210354127651]).bindPopup('Lokasi Muncar, Desa Kedungringin');
        var titik5 = L.marker([-8.462490240398619, 114.31489050167171]).bindPopup('Lokasi Muncar, Desa Sumberberas');
        var titik6 = L.marker([-8.409594186679396, 114.336467749363]).bindPopup('Lokasi Muncar, Desa Sumbersewu');
        var titik7 = L.marker([-8.301976336503648, 114.11612360727838]).bindPopup('Lokasi Genteng, Desa Kaligondo');
        var titik8 = L.marker([-8.275816640831849, 114.11698191419138]).bindPopup('Lokasi Genteng, Desa Kalisetail');
        var titik9 = L.marker([-8.307242039038995, 114.05260889471546]).bindPopup('Lokasi Genteng, Desa Kembiritan');

        // Menambahkan marker ke desa cluster group
        desaRgj.addLayer(titik1);
        desaRgj.addLayer(titik2);
        desaRgj.addLayer(titik3);

        desaMuncar.addLayer(titik4);
        desaMuncar.addLayer(titik5);
        desaMuncar.addLayer(titik6);

        desaGenteng.addLayer(titik7);
        desaGenteng.addLayer(titik8);
        desaGenteng.addLayer(titik9);

        // Menambahkan cluster group ke peta
        map.addLayer(desaRgj);
        map.addLayer(desaMuncar);
        map.addLayer(desaGenteng);

        // Mengelompokkan titik ke dalam layer group berdasarkan kejadian
        var frekuensi = L.layerGroup([titik1, titik3]);
        var keparahan = L.layerGroup([titik2]);
        var tertangani = L.layerGroup([titik4, titik5]);
        var blmTertangani = L.layerGroup([titik6, titik7]);

        // Mengelompokkan titik ke dalam layer group berdasarkan tahun
        var thn2022 = L.layerGroup([titik1, titik4]);
        var thn2023 = L.layerGroup([titik2, titik5, titik7]);
        var thn2024 = L.layerGroup([titik3, titik6]);

        // Menambahkan layer ke peta
        map.addLayer(frekuensi); // Menambahkan layer kejadian frekuensi ke peta secara default
        map.addLayer(thn2023);

        var baseMaps = {
            "OpenStreetMap": osm,
            "OpenStreetMap.HOT": osmHOT
        };

        var overlayMaps = {
            "Frekuensi": frekuensi,
            "Keparahan": keparahan,
            "Tertangani": tertangani,
            "Belum Tertangani": blmTertangani,
            "2022": thn2022,
            "2023": thn2023,
            "2024": thn2024
        };

        // Menambahkan kontrol layer ke peta
        var layersControl = L.control.layers(baseMaps, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // Fungsi untuk menambahkan header
        function addHeader(container, text) {
            var header = document.createElement('span');
            header.className = 'header';
            header.innerHTML = text;
            container.appendChild(header);
        }

        // Menambahkan header secara manual (mendapatkan elemen container dari kontrol layer Leaflet yang menyimpan semua layer overlay)
        var overlaysContainer = layersControl._overlaysList;

        // Membuat elemen wrapper untuk header dan kontrol layer
        var kejadianContainer = document.createElement('div');
        var tahunContainer = document.createElement('div');

        // Menambahkan header ke dalam wrapper
        addHeader(kejadianContainer, 'Kejadian Bencana');
        addHeader(tahunContainer, 'Tahun');

        // Memindahkan kontrol layer ke dalam wrapper yang sesuai
        while (overlaysContainer.childNodes.length > 0) {
            var node = overlaysContainer.childNodes[0];
            if (node.innerHTML.includes('Frekuensi') || node.innerHTML.includes('Keparahan') || node.innerHTML.includes(
                    'Tertangani') || node.innerHTML.includes('Belum Tertangani')) {
                kejadianContainer.appendChild(node);
            } else {
                tahunContainer.appendChild(node);
            }
        }

        // Menambahkan wrapper ke dalam overlaysContainer
        overlaysContainer.appendChild(kejadianContainer);
        overlaysContainer.appendChild(tahunContainer);
    </script> --}}

    {{-- berdasarkan featur grup sub grup marker --}}
    {{-- <script>
        // Inisialisasi peta dengan koordinat dan zoom awal
        var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

        // Tambahkan tile layer OpenStreetMap sebagai latar belakang peta
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        // Membuat cluster group
        var desaRgj = L.markerClusterGroup();
        var desaMuncar = L.markerClusterGroup();
        var desaGenteng = L.markerClusterGroup();

        var rgjFrekuensi2022 = L.featureGroup.subGroup(desaRgj);
        var rgjFrekuensi2023 = L.featureGroup.subGroup(desaRgj);
        var rgjFrekuensi2024 = L.featureGroup.subGroup(desaRgj);
        var rgjKeparahan2022 = L.featureGroup.subGroup(desaRgj);
        var rgjKeparahan2023 = L.featureGroup.subGroup(desaRgj);
        var rgjKeparahan2024 = L.featureGroup.subGroup(desaRgj);
        var rgjTertangani2022 = L.featureGroup.subGroup(desaRgj);
        var rgjTertangani2023 = L.featureGroup.subGroup(desaRgj);
        var rgjTertangani2024 = L.featureGroup.subGroup(desaRgj);
        var rgjBlmTertangani2022 = L.featureGroup.subGroup(desaRgj);
        var rgjBlmTertangani2023 = L.featureGroup.subGroup(desaRgj);
        var rgjBlmTertangani2024 = L.featureGroup.subGroup(desaRgj);

        var muncarFrekuensi2022 = L.featureGroup.subGroup(desaMuncar);
        var muncarFrekuensi2023 = L.featureGroup.subGroup(desaMuncar);
        var muncarFrekuensi2024 = L.featureGroup.subGroup(desaMuncar);
        var muncarKeparahan2022 = L.featureGroup.subGroup(desaMuncar);
        var muncarKeparahan2023 = L.featureGroup.subGroup(desaMuncar);
        var muncarKeparahan2024 = L.featureGroup.subGroup(desaMuncar);
        var muncarTertangani2022 = L.featureGroup.subGroup(desaMuncar);
        var muncarTertangani2023 = L.featureGroup.subGroup(desaMuncar);
        var muncarTertangani2024 = L.featureGroup.subGroup(desaMuncar);
        var muncarBlmTertangani2022 = L.featureGroup.subGroup(desaMuncar);
        var muncarBlmTertangani2023 = L.featureGroup.subGroup(desaMuncar);
        var muncarBlmTertangani2024 = L.featureGroup.subGroup(desaMuncar);

        var gentengFrekuensi2022 = L.featureGroup.subGroup(desaGenteng);
        var gentengFrekuensi2023 = L.featureGroup.subGroup(desaGenteng);
        var gentengFrekuensi2024 = L.featureGroup.subGroup(desaGenteng);
        var gentengKeparahan2022 = L.featureGroup.subGroup(desaGenteng);
        var gentengKeparahan2023 = L.featureGroup.subGroup(desaGenteng);
        var gentengKeparahan2024 = L.featureGroup.subGroup(desaGenteng);
        var gentengTertangani2022 = L.featureGroup.subGroup(desaGenteng);
        var gentengTertangani2023 = L.featureGroup.subGroup(desaGenteng);
        var gentengTertangani2024 = L.featureGroup.subGroup(desaGenteng);
        var gentengBlmTertangani2022 = L.featureGroup.subGroup(desaGenteng);
        var gentengBlmTertangani2023 = L.featureGroup.subGroup(desaGenteng);
        var gentengBlmTertangani2024 = L.featureGroup.subGroup(desaGenteng);

        // Layer group untuk menyimpan marker
        var titik1 = L.marker([-8.297087104296851, 114.30753102268709]).bindPopup('Lokasi Rogojampi, Desa Karang Bendo');
        var titik2 = L.marker([-8.333919771022156, 114.29530145412798]).bindPopup('Lokasi Rogojampi, Desa Gladag');
        var titik3 = L.marker([-8.299160839109767, 114.30179682362218]).bindPopup('Lokasi Rogojampi, Desa Gitik');
        var titik4 = L.marker([-8.45528731842464, 114.33210354127651]).bindPopup('Lokasi Muncar, Desa Kedungringin');
        var titik5 = L.marker([-8.462490240398619, 114.31489050167171]).bindPopup('Lokasi Muncar, Desa Sumberberas');
        var titik6 = L.marker([-8.409594186679396, 114.336467749363]).bindPopup('Lokasi Muncar, Desa Sumbersewu');
        var titik7 = L.marker([-8.301976336503648, 114.11612360727838]).bindPopup('Lokasi Genteng, Desa Kaligondo');
        var titik8 = L.marker([-8.275816640831849, 114.11698191419138]).bindPopup('Lokasi Genteng, Desa Kalisetail');
        var titik9 = L.marker([-8.307242039038995, 114.05260889471546]).bindPopup('Lokasi Genteng, Desa Kembiritan');

        // Menambahkan marker ke desa cluster group
        // Menambahkan marker ke subgrup desa, kategori, dan tahun yang sesuai
        rgjFrekuensi2022.addLayer(titik1);
        rgjKeparahan2023.addLayer(titik2);
        rgjFrekuensi2024.addLayer(titik3);

        muncarTertangani2022.addLayer(titik4);
        muncarBlmTertangani2023.addLayer(titik5);
        muncarTertangani2024.addLayer(titik6);

        gentengBlmTertangani2022.addLayer(titik7);
        gentengFrekuensi2023.addLayer(titik8);
        gentengKeparahan2024.addLayer(titik9);

        // Menambahkan cluster group ke peta
        map.addLayer(desaRgj);
        map.addLayer(desaMuncar);
        map.addLayer(desaGenteng);

        // Mengelompokkan titik ke dalam layer group berdasarkan kejadian dan tahun
        var frekuensi = L.layerGroup([rgjFrekuensi2022, rgjFrekuensi2023, rgjFrekuensi2024, muncarFrekuensi2022,
            muncarFrekuensi2023, muncarFrekuensi2024, gentengFrekuensi2022, gentengFrekuensi2023,
            gentengFrekuensi2024
        ]);
        var keparahan = L.layerGroup([rgjKeparahan2022, rgjKeparahan2023, rgjKeparahan2024, muncarKeparahan2022,
            muncarKeparahan2023, muncarKeparahan2024, gentengKeparahan2022, gentengKeparahan2023,
            gentengKeparahan2024
        ]);
        var tertangani = L.layerGroup([rgjTertangani2022, rgjTertangani2023, rgjTertangani2024, muncarTertangani2022,
            muncarTertangani2023, muncarTertangani2024, gentengTertangani2022, gentengTertangani2023,
            gentengTertangani2024
        ]);
        var blmTertangani = L.layerGroup([rgjBlmTertangani2022, rgjBlmTertangani2023, rgjBlmTertangani2024,
            muncarBlmTertangani2022, muncarBlmTertangani2023, muncarBlmTertangani2024, gentengBlmTertangani2022,
            gentengBlmTertangani2023, gentengBlmTertangani2024
        ]);

        var thn2022 = L.layerGroup([rgjFrekuensi2022, rgjKeparahan2022, rgjTertangani2022, rgjBlmTertangani2022,
            muncarFrekuensi2022, muncarKeparahan2022, muncarTertangani2022, muncarBlmTertangani2022,
            gentengFrekuensi2022, gentengKeparahan2022, gentengTertangani2022, gentengBlmTertangani2022
        ]);
        var thn2023 = L.layerGroup([rgjFrekuensi2023, rgjKeparahan2023, rgjTertangani2023, rgjBlmTertangani2023,
            muncarFrekuensi2023, muncarKeparahan2023, muncarTertangani2023, muncarBlmTertangani2023,
            gentengFrekuensi2023, gentengKeparahan2023, gentengTertangani2023, gentengBlmTertangani2023
        ]);
        var thn2024 = L.layerGroup([rgjFrekuensi2024, rgjKeparahan2024, rgjTertangani2024, rgjBlmTertangani2024,
            muncarFrekuensi2024, muncarKeparahan2024, muncarTertangani2024, muncarBlmTertangani2024,
            gentengFrekuensi2024, gentengKeparahan2024, gentengTertangani2024, gentengBlmTertangani2024
        ]);

        // Menambahkan layer ke peta
        map.addLayer(frekuensi); // Menambahkan layer kejadian frekuensi ke peta secara default
        map.addLayer(thn2023);

        var baseMaps = {
            "OpenStreetMap": osm,
            "OpenStreetMap.HOT": osmHOT
        };

        var overlayMaps = {
            "Frekuensi": frekuensi,
            "Keparahan": keparahan,
            "Tertangani": tertangani,
            "Belum Tertangani": blmTertangani,
            "2022": thn2022,
            "2023": thn2023,
            "2024": thn2024
        };

        // Menambahkan kontrol layer ke peta
        var layersControl = L.control.layers(baseMaps, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // Fungsi untuk menambahkan header
        function addHeader(container, text) {
            var header = document.createElement('span');
            header.className = 'header';
            header.innerHTML = text;
            container.appendChild(header);
        }

        // Menambahkan header secara manual (mendapatkan elemen container dari kontrol layer Leaflet yang menyimpan semua layer overlay)
        var overlaysContainer = layersControl._overlaysList;

        // Membuat elemen wrapper untuk header dan kontrol layer
        var kejadianContainer = document.createElement('div');
        var tahunContainer = document.createElement('div');

        // Menambahkan header ke dalam wrapper
        addHeader(kejadianContainer, 'Kejadian Bencana');
        addHeader(tahunContainer, 'Tahun');

        // Memindahkan kontrol layer ke dalam wrapper yang sesuai
        while (overlaysContainer.childNodes.length > 0) {
            var node = overlaysContainer.childNodes[0];
            if (node.innerHTML.includes('Frekuensi') || node.innerHTML.includes('Keparahan') || node.innerHTML.includes(
                    'Tertangani') || node.innerHTML.includes('Belum Tertangani')) {
                kejadianContainer.appendChild(node);
            } else {
                tahunContainer.appendChild(node);
            }
        }

        // Menambahkan wrapper ke dalam overlaysContainer
        overlaysContainer.appendChild(kejadianContainer);
        overlaysContainer.appendChild(tahunContainer);
    </script> --}}

    {{-- <script>
        // Inisialisasi peta dengan koordinat dan zoom awal
        var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

        // Tambahkan tile layer OpenStreetMap sebagai latar belakang peta
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        // Membuat cluster group
        var desaRgj = L.markerClusterGroup();
        var desaMuncar = L.markerClusterGroup();
        var desaGenteng = L.markerClusterGroup();

        // Membuat subgrup untuk setiap kategori dan tahun
        var subGroups = {
            rgjFrekuensi: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaRgj)),
            rgjKeparahan: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaRgj)),
            rgjTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaRgj)),
            rgjBlmTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaRgj)),
            muncarFrekuensi: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaMuncar)),
            muncarKeparahan: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaMuncar)),
            muncarTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaMuncar)),
            muncarBlmTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaMuncar)),
            gentengFrekuensi: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaGenteng)),
            gentengKeparahan: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaGenteng)),
            gentengTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaGenteng)),
            gentengBlmTertangani: [2022, 2023, 2024].map(year => L.featureGroup.subGroup(desaGenteng))
        };

        // Daftar marker
        var markers = [{
                coords: [-8.297087104296851, 114.30753102268709],
                popup: 'Lokasi Rogojampi, Desa Karang Bendo',
                group: subGroups.rgjFrekuensi[0]
            },
            {
                coords: [-8.333919771022156, 114.29530145412798],
                popup: 'Lokasi Rogojampi, Desa Gladag',
                group: subGroups.rgjFrekuensi[1]
            },
            {
                coords: [-8.299160839109767, 114.30179682362218],
                popup: 'Lokasi Rogojampi, Desa Gitik',
                group: subGroups.rgjFrekuensi[2]
            },
            {
                coords: [-8.45528731842464, 114.33210354127651],
                popup: 'Lokasi Muncar, Desa Kedungringin',
                group: subGroups.muncarTertangani[0]
            },
            {
                coords: [-8.462490240398619, 114.31489050167171],
                popup: 'Lokasi Muncar, Desa Sumberberas',
                group: subGroups.muncarBlmTertangani[1]
            },
            {
                coords: [-8.409594186679396, 114.336467749363],
                popup: 'Lokasi Muncar, Desa Sumbersewu',
                group: subGroups.muncarTertangani[2]
            },
            {
                coords: [-8.301976336503648, 114.11612360727838],
                popup: 'Lokasi Genteng, Desa Kaligondo',
                group: subGroups.gentengBlmTertangani[0]
            },
            {
                coords: [-8.275816640831849, 114.11698191419138],
                popup: 'Lokasi Genteng, Desa Kalisetail',
                group: subGroups.gentengFrekuensi[1]
            },
            {
                coords: [-8.307242039038995, 114.05260889471546],
                popup: 'Lokasi Genteng, Desa Kembiritan',
                group: subGroups.gentengKeparahan[2]
            }
        ];

        // Menambahkan marker ke subgrup yang sesuai
        markers.forEach(marker => {
            L.marker(marker.coords).bindPopup(marker.popup).addTo(marker.group);
        });

        // Menambahkan cluster group ke peta
        map.addLayer(desaRgj);
        map.addLayer(desaMuncar);
        map.addLayer(desaGenteng);

        // Layer group untuk kategori dan tahun
        var frekuensi = L.layerGroup([...subGroups.rgjFrekuensi, ...subGroups.gentengFrekuensi]);
        var keparahan = L.layerGroup([...subGroups.rgjKeparahan, ...subGroups.muncarKeparahan]);
        var tertangani = L.layerGroup([...subGroups.muncarTertangani, ...subGroups.gentengTertangani]);
        var blmTertangani = L.layerGroup([...subGroups.rgjBlmTertangani, ...subGroups.muncarBlmTertangani]);

        var thn2022 = L.layerGroup([
            subGroups.rgjFrekuensi[0], subGroups.muncarKeparahan[0], subGroups.gentengTertangani[0],
            subGroups.gentengBlmTertangani[0]
        ]);
        var thn2023 = L.layerGroup([
            subGroups.rgjKeparahan[1], subGroups.rgjTertangani[1], subGroups.muncarBlmTertangani[1],
            subGroups.gentengFrekuensi[1]
        ]);
        var thn2024 = L.layerGroup([
            subGroups.rgjBlmTertangani[2],
            subGroups.muncarTertangani[2], subGroups.muncarBlmTertangani[2],
            subGroups.gentengFrekuensi[2]
        ]);

        // Menyimpan marker sesuai dengan frekuensi kejadian
        // markers.forEach(marker => {
        //     L.marker(marker.coords).bindPopup(marker.popup).addTo(marker.group);
        //     // Menentukan warna marker berdasarkan frekuensi kejadian
        //     if (marker.group === subGroups.rgjFrekuensi[0]) { // Rogojampi
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#99BDF2'
        //         }).addTo(map); // 1-50
        //     } else if (marker.group === subGroups.rgjFrekuensi[1]) {
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#0084FE'
        //         }).addTo(map); // 50-150
        //     } else if (marker.group === subGroups.rgjFrekuensi[2]) {
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#0573DA'
        //         }).addTo(map); // >150
        //     }
        // });

        // Menyimpan marker sesuai dengan keparahan
        // markers.forEach(marker => {
        //     L.marker(marker.coords).bindPopup(marker.popup).addTo(marker.group);
        //     // Menentukan warna marker berdasarkan keparahan
        //     if (marker.group === subGroups.gentengKeparahan[0]) { // Genteng
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#00FF00'
        //         }).addTo(map); // <0.76 meter
        //     } else if (marker.group === subGroups.gentengKeparahan[1]) {
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#FFFF00'
        //         }).addTo(map); // 0.76-1.5 meter
        //     } else if (marker.group === subGroups.gentengKeparahan[2]) {
        //         L.circle(marker.coords, {
        //             radius: 100
        //         }).setStyle({
        //             fillColor: '#FF0000'
        //         }).addTo(map); // >1.5 meter
        //     }
        // });


        // Menambahkan layer ke peta
        map.addLayer(frekuensi); // Default layer
        map.addLayer(thn2022);

        var baseMaps = {
            "OpenStreetMap": osm,
            "OpenStreetMap.HOT": osmHOT
        };

        var overlayMaps = {
            "Frekuensi": frekuensi,
            "Keparahan": keparahan,
            "Tertangani": tertangani,
            "Belum Tertangani": blmTertangani,
            "2022": thn2022,
            "2023": thn2023,
            "2024": thn2024
        };

        // Menambahkan kontrol layer ke peta
        var layersControl = L.control.layers(baseMaps, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // Fungsi untuk menambahkan header
        function addHeader(container, text) {
            var header = document.createElement('span');
            header.className = 'header';
            header.innerHTML = text;
            container.appendChild(header);
        }

        // Menambahkan header secara manual (mendapatkan elemen container dari kontrol layer Leaflet yang menyimpan semua layer overlay)
        var overlaysContainer = layersControl._overlaysList;

        // Membuat elemen wrapper untuk header dan kontrol layer
        var kejadianContainer = document.createElement('div');
        var tahunContainer = document.createElement('div');

        // Menambahkan header ke dalam wrapper
        addHeader(kejadianContainer, 'Kejadian Bencana');
        addHeader(tahunContainer, 'Tahun');

        // Memindahkan kontrol layer ke dalam wrapper yang sesuai
        while (overlaysContainer.childNodes.length > 0) {
            var node = overlaysContainer.childNodes[0];
            if (node.innerHTML.includes('Frekuensi') || node.innerHTML.includes('Keparahan') || node.innerHTML.includes(
                    'Tertangani') || node.innerHTML.includes('Belum Tertangani')) {
                kejadianContainer.appendChild(node);
            } else {
                tahunContainer.appendChild(node);
            }
        }
        // Menambahkan wrapper ke dalam overlaysContainer
        overlaysContainer.appendChild(kejadianContainer);
        overlaysContainer.appendChild(tahunContainer);
    </script> --}}

    {{-- <script>
        // mendefinisikan titik area menggunakan json
        var dataGeojson = {
            "type": "FeatureCollection",
            "features": [{
                    "type": "Feature",
                    "properties": {
                        "name": "Wilayah A",
                        "population": 4000
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [114.28635462387194, -8.318127865618067],
                                [114.28635462387194, -8.352962788907348],
                                [114.34478627258773, -8.352962788907348],
                                [114.34478627258773, -8.318127865618067],
                                [114.28635462387194, -8.318127865618067]
                            ]
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Wilayah B",
                        "population": 6000
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [114.30704307320912, -8.296679174650421],
                                [114.31098997375113, -8.299394935594677],
                                [114.32284327222129, -8.30228118982059],
                                [114.31442427915965, -8.286987936294182],
                                [114.2917961981264, -8.289566251789893],
                                [114.29864486225807, -8.29430982753847],
                                [114.30704307320912, -8.296679174650421]
                            ]
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Wilayah C",
                        "population": 8000
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [114.1944925118388, -8.234179333792753],
                                [114.20684889026705, -8.254036966911428],
                                [114.21596933047391, -8.24518028419871],
                                [114.19886334985188, -8.229853517129428],
                                [114.1944925118388, -8.234179333792753]
                            ]
                        ]
                    }
                }
            ]
        };

        // fungsi menentukan style area
        function style(area) {
            var populasi = area.properties.population;
            var fillColor = populasi >= 8000 ? "red" : populasi >= 6000 ? "yellow" : populasi >= 4000 ? "green" :
                "blue";

            return {
                fillColor: fillColor,
                weight: 2,
                opacity: 1,
                color: "black",
                fillOpacity: 0.5
            };
        }

        // Fungsi untuk menyorot fitur saat mouseover (diarahkan ke area)
        function highlightFeature(e) {
            var layer = e.target;

            // Simpan gaya awal fitur
            layer.options.originalStyle = {
                weight: layer.options.weight || 2, // Simpan juga gaya bobot lapisan
                color: layer.options.color || '#3388ff',
                dashArray: layer.options.dashArray || '',
                fillOpacity: layer.options.fillOpacity || 0.2
            };

            // Mengubah gaya fitur untuk menyorotnya
            layer.setStyle({
                weight: 5, // Ketebalan garis
                color: '#666', // Warna garis
                dashArray: '', // Pola garis putus-putus
                fillOpacity: 0.7 // Opasitas isi (0 hingga 1)
            });

            // Membawa lapisan ke depan agar tidak tertutup oleh lapisan lain
            layer.bringToFront();
        }

        // Fungsi untuk mengembalikan gaya fitur ke gaya awalnya saat mouse meninggalkan
        function resetHighlight(e) {
            var layer = e.target;

            // Mengembalikan fitur ke gaya awalnya
            layer.setStyle(layer.options.originalStyle);
        }

        // Mendefinisikan fungsi mouseover dan mouseout untuk setiap fitur
        function onEachFeature(feature, layer) {
            // Menambahkan event listener mouseover dan mouseout ke setiap fitur
            layer.on({
                mouseover: highlightFeature, // Ketika mouseover, panggil fungsi highlightFeature
                mouseout: resetHighlight // Ketika mouseout, panggil fungsi resetHighlight
            });
        }

        // Menambahkan lapisan GeoJSON ke dalam peta Leaflet
        for (var i = 0; i < dataGeojson.features.length; i++) {
            L.geoJSON(dataGeojson.features[i], {
                style: style,
                onEachFeature: onEachFeature // Memanggil fungsi onEachFeature untuk setiap fitur
            }).addTo(map);
        }
    </script> --}}

    {{-- <script>
        fetch('assets-admin/compiled/geojson/batas_desa.geojson')
            .then(response => response.json())
            .then(data => {
                var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.geoJSON(data).addTo(map);
            });
    </script> --}}
@endsection
