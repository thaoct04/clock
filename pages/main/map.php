<div class="map-file">
    <div class="map__search">
        <h2>tìm 1 cửa hàng của chúng tôi</h2>
        <p>Chúng tôi trân trọng kính mời bạn đến trực tiếp để trải nghiệm đồng hồ hoặc đến tận nơi để được bảo dưỡng hoặc đặt lịch hẹn.

            Tìm kiếm quốc gia, khu vực, thành phố...</p>
        <fieldset>
            <label for="">
                <input type="text" placeholder="tìm kiếm dựa vào tên quốc gia">
                <a href="#">Tìm kiếm</a>
            </label>
        </fieldset>
    </div>

    <div id="map" style="flex:1;height:400px"></div>



</div>
<script>
    var map = new maplibregl.Map({
        container: "map",
        style: {
            version: 8,
            sources: {
                "carto-positron": {
                    type: "raster",
                    tiles: [
                        "https://a.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
                        "https://b.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
                        "https://c.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
                        "https://d.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
                        "https://e.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
                    ],
                    tileSize: 256,
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        '<a href="https://carto.com/attributions">CARTO</a>',
                },
            },
            layers: [{
                id: "carto-positron",
                type: "raster",
                source: "carto-positron",
                minzoom: 0,
                maxzoom: 20,
            }, ],
        },
        center: [106.6297, 10.8231],
        zoom: 10,
    });
    // 
    var el = document.createElement('div');
    el.innerHTML = '<i class="fa-light fa-location-crosshairs map-location"></i>';
    el.style.width = '30px';
    el.style.height = '30px';
    el.style.display = 'flex';
    el.style.justifyContent = 'center';
    el.style.backgroundSize = '100%';

    var el_usa = document.createElement('div');
    el_usa.innerHTML = '<i class="fa-light fa-location-crosshairs map-location"></i>';
    el_usa.style.width = '30px';
    el_usa.style.height = '30px';
    el_usa.style.display = 'flex';
    el_usa.style.justifyContent = 'center';
    el_usa.style.backgroundSize = '100%';

    var el_3 = document.createElement('div');
    el_3.innerHTML = '<i class="fa-light fa-location-crosshairs map-location"></i>';
    el_3.style.width = '30px';
    el_3.style.height = '30px';
    el_3.style.display = 'flex';
    el_3.style.justifyContent = 'center';
    el_3.style.backgroundSize = '100%';

    var el_4 = document.createElement('div');
    el_4.innerHTML = '<i class="fa-light fa-location-crosshairs map-location"></i>';
    el_4.style.width = '30px';
    el_4.style.height = '30px';
    el_4.style.display = 'flex';
    el_4.style.justifyContent = 'center';
    el_4.style.backgroundSize = '100%';


    var customMarker = new maplibregl.Marker(el) // Sử dụng phần tử HTML làm marker
        .setLngLat([108.2772, 14.0583])
        .addTo(map);

    var customMarker2 = new maplibregl.Marker(el_usa) // Sử dụng phần tử HTML làm marker
        .setLngLat([-95.7129, 37.0902])
        .addTo(map);
    var customMarker_japan = new maplibregl.Marker(el_3) // Sử dụng phần tử HTML làm marker
        .setLngLat([138.2529, 36.2048])
        .addTo(map);

    var customMarker_france = new maplibregl.Marker(el_4) // Sử dụng phần tử HTML làm marker
        .setLngLat([1.8883, 46.6034])
        .addTo(map);
    var popup = new maplibregl.Popup({
            offset: 25
        }) // Tạo popup với khoảng cách 25px
        .setText('cửa hàng tại thành phố hồ chí minh'); // Nội dung trong popup
    var popup_usa = new maplibregl.Popup({
            offset: 25
        }) // Tạo popup với khoảng cách 25px
        .setText('cửa hàng tại mỹ'); // Nội dung trong popup
    var popup_jp = new maplibregl.Popup({
            offset: 25
        }) // Tạo popup với khoảng cách 25px
        .setText('cửa hàng tại nhật bản'); // Nội dung trong popup
    var popup_fr = new maplibregl.Popup({
            offset: 25
        }) // Tạo popup với khoảng cách 25px
        .setText('cửa hàng tại pháp'); // Nội dung trong popup

    customMarker.setPopup(popup);
    customMarker2.setPopup(popup_usa);
    customMarker_japan.setPopup(popup_jp);
    customMarker_france.setPopup(popup_fr);

    const countries = {
        "Vietnam": {
            lat: 14.0583,
            lng: 108.2772
        },
        "USA": {
            lat: 37.0902,
            lng: -95.7129
        },
        "Japan": {
            lat: 36.2048,
            lng: 138.2529
        },
        "France": {
            lat: 46.6034,
            lng: 1.8883
        }
    };

    // Hàm điều hướng đến quốc gia
    function goToCountry() {
        const input = document.querySelector('.map__search input');
        const countryName = input.value.trim();

        if (countries[countryName]) {
            const {
                lat,
                lng
            } = countries[countryName];
            map.flyTo({
                center: [lng, lat],
                zoom: 6
            });
        } else {
            alert("Không tìm thấy quốc gia này!");
        }
    }

    // Gắn sự kiện cho nút tìm kiếm
    document.querySelector('.map__search a').addEventListener('click', (event) => {
        event.preventDefault();
        goToCountry();
    });


    // Tạo các marker riêng biệt
</script>