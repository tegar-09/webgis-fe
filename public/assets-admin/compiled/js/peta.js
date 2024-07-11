
    // menampilkan peta dengan koordinat dan zoom awal
    var map = L.map('map').setView([-8.209107466115151, 114.3714710442807], 10);

    // menambahkan tile layer OpenStreetMap sebagai latar belakang peta
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

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

    // layer group untuk menyimpan titik marker
    var titik1 = L.marker([-8.297087104296851, 114.30753102268709]).bindPopup('Lokasi Rogojampi, Desa Karang Bendo');
    var titik2 = L.marker([-8.333919771022156, 114.29530145412798]).bindPopup('Lokasi Rogojampi, Desa Gladag');
    var titik3 = L.marker([-8.299160839109767, 114.30179682362218]).bindPopup('Lokasi Rogojampi, Desa Gitik');
    var titik4 = L.marker([-8.45528731842464, 114.33210354127651]).bindPopup('Lokasi Muncar, Desa Kedungringin');
    var titik5 = L.marker([-8.462490240398619, 114.31489050167171]).bindPopup('Lokasi Muncar, Desa Sumberberas');
    var titik6 = L.marker([-8.409594186679396, 114.336467749363]).bindPopup('Lokasi Muncar, Desa Sumbersewu');
    var titik7 = L.marker([-8.301976336503648, 114.11612360727838]).bindPopup('Lokasi Genteng, Desa Kaligondo');
    var titik8 = L.marker([-8.275816640831849, 114.11698191419138]).bindPopup('Lokasi Genteng, Desa Kalisetail');
    var titik9 = L.marker([-8.307242039038995, 114.05260889471546]).bindPopup('Lokasi Genteng, Desa Kembiritan');

    // Menambahkan marker ke subgrup desa, kategori, dan tahun yang sesuai
    rgjFrekuensi2022.addLayer(titik1);
    rgjFrekuensi2022.addLayer(titik2);
    rgjFrekuensi2022.addLayer(titik3);

    rgjKeparahan2023.addLayer(titik2);
    rgjKeparahan2023.addLayer(titik1);

    rgjTertangani2024.addLayer(titik2);
    rgjTertangani2024.addLayer(titik3);

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
        muncarFrekuensi2023, muncarFrekuensi2024, gentengFrekuensi2022, gentengFrekuensi2023, gentengFrekuensi2024
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
    map.addLayer(thn2022);

    // var baseMaps = {
    //     "OpenStreetMap": osm,
    //     "OpenStreetMap.HOT": osmHOT
    // };

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
    var layersControl = L.control.layers(null, overlayMaps, {
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