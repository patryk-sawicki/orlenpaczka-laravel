@php
    $data = \PatrykSawicki\OrlenPaczkaApi\app\Classes\OrlenPaczka::giveMeAllRUCHWithFilled()->listForMap();
@endphp

@push('after-css')
    <link rel="preload" as="style" href="{{ route('op.sass', 'app') }}"/>
    <link rel="modulepreload" href="{{ route('op.js', 'app') }}"/>
    <link rel="stylesheet" href="{{ route('op.sass', 'app') }}"/>
    <script type="module" src="{{ route('op.js', 'app') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css"/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
@endpush

<button class="map-widget" id="orlenMapPop">Wybierz na mapie</button>
<input type="text" hidden id="orlenPointId" name="orlenPointId">

<div class="orlenModal">
    <div class="orlenModal__content">

        <button class="orlenModal__close-btn" aria-label="Zamknij wybór paczkomatu">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                 height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M331.3 308.7L278.6 256l52.7-52.7c6.2-6.2 6.2-16.4 0-22.6-6.2-6.2-16.4-6.2-22.6 0L256 233.4l-52.7-52.7c-6.2-6.2-15.6-7.1-22.6 0-7.1 7.1-6 16.6 0 22.6l52.7 52.7-52.7 52.7c-6.7 6.7-6.4 16.3 0 22.6 6.4 6.4 16.4 6.2 22.6 0l52.7-52.7 52.7 52.7c6.2 6.2 16.4 6.2 22.6 0 6.3-6.2 6.3-16.4 0-22.6z">
                </path>
                <path
                        d="M256 76c48.1 0 93.3 18.7 127.3 52.7S436 207.9 436 256s-18.7 93.3-52.7 127.3S304.1 436 256 436c-48.1 0-93.3-18.7-127.3-52.7S76 304.1 76 256s18.7-93.3 52.7-127.3S207.9 76 256 76m0-28C141.1 48 48 141.1 48 256s93.1 208 208 208 208-93.1 208-208S370.9 48 256 48z">
                </path>
            </svg>
        </button>

        <div class="point-group">

            <input type="text" placeholder="Wpisz nazwę miejscowości" name="point" id="point"
                   list="point">

            <div id="pointDropdown" class="pointDropdown">
                @if ($data)
                    @foreach ($data as $point)
                        <button data-id={{ $point['id'] }}
                                data-location="{{ $point['location'] }}">{{ $point['location'] }}</button>
                    @endforeach
                @endif
            </div>
        </div>

        <div id="map"></div>
    </div>
</div>

@push('after-scripts')
    <script>
        let map;
        const mapInit = document.querySelector('#orlenMapPop');
        const orlenModal = document.querySelector('.orlenModal');
        const closeOrlenModalBtn = document.querySelector('.orlenModal__close-btn');
        const markersMap = new Map();
        const orlenPointFormInput = document.querySelector('#orlenPointId');

        mapInit.addEventListener('click', () => {

            orlenModal.classList.add('open')
            orlenMapFunc()

            if (!navigator.geolocation) {
                alert("Geolocation is not supported by your browser")
            } else {
                navigator.geolocation.getCurrentPosition((position) => {
                    map.setView([position.coords.latitude, position.coords.longitude], 13)
                }, () => {
                }, {
                    enableHighAccuracy: true,
                    timeout: 10 * 1000, // 5 seconds
                    maximumAge: 0
                });
            }
        })

        closeOrlenModalBtn.addEventListener('click', () => {
            orlenModal.classList.remove('open')
        })

        const orlenMapFunc = (lat, lang) => {

            if (map) return

            map = L.map("map").setView([lat || 53.13333, lang || 23.16433], 13);

            const iconUrl = {!! json_encode(route('op.img', ['marker', 'png'])) !!};

            const orlenIcon = L.icon({
                iconUrl: iconUrl,
                iconSize: [40, 40]
            })

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            const points = {!! json_encode($data, JSON_HEX_TAG) !!};

            clusterGroup = L.markerClusterGroup({
                maxClusterRadius: 50
            });

            points.forEach(point => {
                let marker = L.marker([point.lat, point.lang], {
                    icon: orlenIcon
                }).addTo(map)

                //add marker to markes map

                markersMap.set(point.id, marker)


                const popupContent = document.createElement('div')
                // set popup HTML
                popupContent.innerHTML = `<span>${point.title}</span>
                                    <p>${point.description}</p>
                                    <span>
                                        <p>Godziny otwarcia</p>
                                        <p>${point.OpeningHours}</p>
                                    </span>
                                    <p>${point.location_details}</p>
                                    `
                const popupButton = document.createElement('button')
                popupButton.textContent = 'Wybierz'
                popupButton.addEventListener('click', () => {
                    //set hidden input value
                    orlenPointId.value = point.id
                    orlenModal.classList.remove('open')
                    //run input change event
                    orlenPointId.dispatchEvent(new Event('change'))
                })
                popupContent.append(popupButton)

                marker.bindPopup(popupContent)
                // dodanie powoduje odpalenie na starcie
                // .openPopup()


                // add marker to cluser group
                clusterGroup.addLayer(marker)
            });

            map.addLayer(clusterGroup)

            // input + dropdown

            const pointDropdown = document.querySelector('#pointDropdown');
            const dropdownPoints = pointDropdown.querySelectorAll('button');
            const pointInput = document.querySelector('#point');

            const inputListener = (e) => {
                //Remove open class from all dropdown points
                dropdownPoints.forEach(point => {
                    point.classList.remove('open')
                })

                if (e.target.value.length < 3) {
                    return;
                }

                let selectedPoints = []
                let selectedPointsCounter = 0

                points.forEach(singlePoint => {
                    if (selectedPointsCounter >= 100)
                        return

                    if (singlePoint.location.toLocaleLowerCase().includes(e.target.value
                        .toLocaleLowerCase())) {
                        selectedPoints.push(singlePoint)
                        selectedPointsCounter++

                        //Add open class to dropdown item
                        const point = pointDropdown.querySelector(`button[data-id="${singlePoint.id}"]`)
                        point.classList.add('open')
                    }
                })

                if (selectedPointsCounter > 0)
                    pointDropdown.classList.add('open')
                else
                    pointDropdown.classList.remove('open')
            }

            pointInput.addEventListener('input', inputListener)
            pointInput.addEventListener('focus', inputListener)

            dropdownPoints.forEach(point => {
                point.addEventListener('click', (e) => {
                    // get point id
                    const pointId = e.target.dataset.id
                    // find marker
                    const marker = markersMap.get(pointId)
                    // move map to marker, open popup
                    map.setView(new L.latLng(marker.getLatLng()), 13)
                    marker.openPopup()
                    // hide dropdown
                    pointDropdown.classList.remove('open')
                })
            })
        }
    </script>
@endpush