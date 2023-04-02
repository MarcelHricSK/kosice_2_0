@extends('client.template.with_header')

@section('title', format_title('KI15M'))

@section('content')
  <div class="content content--fluid">
    <div class="content__wrapper">
      <div id="map" style="width: 100vw; height: 100vh"></div>
      <div class="bar">
        <form action="." id="main_form">
          <input class="input" type="text" placeholder="Zem. dĺžka" name="lat" id="lat__input">
          <input class="input" type="text" placeholder="Zem. šírka" name="lng" id="lng__input">
          <button class="button button--primary" type="submit">Potvrdiť</button>
        </form>
      </div>
    </div>
    <div class="sidebar open" id="sidebar" ></div>
  </div>
@endsection

@section('scripts_body')
  <script>
    var mainMarker, markers = []

    mapboxgl.accessToken =
      "pk.eyJ1IjoibWFyY2VsaHJpYyIsImEiOiJja29zd2hiZ3kwMDJrMzFwY25xNnV5aTliIn0.FJPCVKhDzagzMV7yfVOe8w";
    var map = new mapboxgl.Map({
      container: "map",
      style: "mapbox://styles/marcelhric/clfy5n9yl000p01p7n28in8z3",
      center: [21.2824586, 48.7395041],
      zoom: 12,
    });

    map.on("load", async () => {
      const data = await fetch(
        "https://api.mapbox.com/isochrone/v1/mapbox/walking/21.25843310038516%2C48.720592924078744?contours_minutes=15&polygons=true&denoise=1&generalize=0.5&access_token=pk.eyJ1IjoibWFyY2VsaHJpYyIsImEiOiJja29zd2hiZ3kwMDJrMzFwY25xNnV5aTliIn0.FJPCVKhDzagzMV7yfVOe8w"
      ).then((res) => res.json());

      map.addSource("maine", {
        type: "geojson",
        data: {
          geometry: data["features"][0]["geometry"],
          type: "Feature",
        },
      });

      map.addLayer({
        id: "maine",
        type: "fill",
        source: "maine",
        layout: {},
        paint: {
          "fill-color": "#fff",
          "fill-opacity": 0.25,
        },
      });

      map.addLayer({
        id: "outline",
        type: "line",
        source: "maine",
        layout: {},
        paint: {
          "line-color": "#fff",
          "line-width": 2,
        },
      });

      loadData(48.720592924078744, 21.25843310038516)
      $('#lat__input').val(48.720592924078744)
      $('#lng__input').val(21.25843310038516)
    });
  </script>
  <script>
    async function rerenderIso(lat, lng, feature) {

      map.getSource("maine").setData({
        geometry: feature,
        type: "Feature",
      });

      if (mainMarker) {
        mainMarker.remove()
      }
      const el = document.createElement("div");
      el.className = "marker";
      mainMarker = new mapboxgl.Marker(el)
        .setLngLat({lat: lat, lng: lng})
        .addTo(map);
    }

    function placeMarker(lat, lng, type, id) {
      const el = document.createElement("div");
      el.className = "marker marker--" + type;
      el.dataset.ico = "media/" + type + '.png';
      el.dataset.id = id;
      let m = new mapboxgl.Marker(el)
        .setLngLat({lat: lat, lng: lng})
        .addTo(map);

      markers.push(m)
    }


    async function loadData(lat, lng) {
      const data = await fetch(
        "http://hk23.work:8000/api/v1/points", {
          body: JSON.stringify({lat: lat, lng: lng }),
          headers: {'Content-Type': 'application/json'},
          method: 'POST'
        }
      ).then((res) => res.json());

      markers.forEach((el) => {
        el.remove()
      })
      markers = []
      data.points.forEach((el) => {
        placeMarker(el.lat, el.lng, el.type, el.id)
      })

      const sidebar = document.getElementById('sidebar')
      let info_div = document.createElement("div");
      info_div.className = "info_div";
      info_div.style.width = "fit-content";
      //info_div.style.border = "3px solid #1D4046";
      info_div.style.textAlign = "center";
      info_div.style.width = '100%';
      info_div.innerHTML = "<h1 style='text-align: center'>Eventy</h1>"
      data.events.forEach((el) => {
        info_div.innerHTML += `<div class="eventcard">
            <h2>${el.name}</h2>
            <p>${el.poi_name}</p>
            <p>${el.description}</p>
            <small>${el.datetime}</small>
        </div>`
      })

      sidebar.replaceChildren(info_div)

      rerenderIso(lat, lng, data.polygon["features"][0]["geometry"])
    }

    async function loadSidebar(id, target) {
      const data = await fetch(
        "http://hk23.work:8000/api/v1/points/" + id, {
          headers: {'Content-Type': 'application/json'},
          method: 'GET'
        }
      ).then((res) => res.json());

      const info = [target.dataset.ico]

      const sidebar = document.getElementById('sidebar')
      let info_div = document.createElement("div");
      info_div.className = "info_div";
      info_div.style.width = "fit-content";
      //info_div.style.border = "3px solid #1D4046";
      info_div.style.textAlign = "center";
      info_div.style.width = '100%';
      let icon_div = document.createElement("div");
      let icon = document.createElement("img");
      icon.src = info[0];
      icon.style.width = 48 +"px";
      icon_div.append(icon);
      icon_div.style.marginBottom = "0.5rem";
      info_div.append(icon_div);

      let text_info = document.createElement("p");
      text_info.style.minWidth = "10em";
      text_info.style.fontWeight = "bold";
      text_info.style.marginBottom = "0.25rem";
      text_info.textContent = data.poi.name != '' ? data.poi.name : 'Neznáme';
      info_div.append(text_info);

      text_info = document.createElement("small");
      text_info.style.minWidth = "10em";

      text_info.textContent = data.poi.subtype;
      info_div.append(text_info);

      data.poi.events.forEach((el) => {
        info_div.innerHTML += `<div class="eventcard">
            <h2>${el.name}</h2>
            <p>${el.description}</p>
            <small>${el.datetime}</small>
        </div>`
      })

      sidebar.replaceChildren(info_div)
    }

    document.querySelector('#main_form').addEventListener('submit', function (e) {
      e.preventDefault()
      loadData($('#lat__input').val(), $('#lng__input').val())
    })

    map.on('click', function (e) {
      if(e.originalEvent.target.classList[0] == 'marker'){
        $('.marker--active').removeClass('marker--active')
        e.originalEvent.target.classList.add('marker--active')
        loadSidebar(e.originalEvent.target.dataset.id, e.originalEvent.target)
      } else {
        loadData(e.lngLat.lat, e.lngLat.lng)
        $('#lat__input').val(e.lngLat.lat)
        $('#lng__input').val(e.lngLat.lng)
      }

    });

  </script>
@endsection
