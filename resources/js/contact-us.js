$(document).ready(function () {
  var offices = [
    {
      id: "usa",
      name: "United States",
      lat: 40.7282,
      lng: -73.7338,
      address: "218-10, Hillside Ave, Queens Village, New York, USA, 11427.",
      phone: "+ 60 146600012",
      tooltipDirection: "bottom",   // USA → popup on left side
    },
    {
      id: "malaysia",
      name: "Malaysia",
      lat: 3.0942,
      lng: 101.6831,
      address: "M116, Jalan Mega Mendung, Off Jalan Klang Lama, 58200, Kuala Lumpur, Malaysia.",
      phone: "+ 60 146600012",
      tooltipDirection: "bottom", // Malaysia → popup below
    },
    {
      id: "india",
      name: "India",
      lat: 19.1874,
      lng: 72.8484,
      address: "3102, 1st Floor, Rustomjee Eaze Zone, Sundar Nagar, Malad West - Mumbai 400064, MH - IN",
      phone: "+ 91 9967940928",
      tooltipDirection: "top",    // India → popup above
    },
  ];

  function makeIcon() {
    return L.divIcon({
      className: "",
      html: [
        '<div style="',
        "width:36px;height:36px;",
        "background:#057a96;",
        "border:3px solid #fff;",
        "border-radius:50% 50% 50% 0;",
        "transform:rotate(-45deg);",
        "box-shadow:0 4px 14px rgba(0,0,0,0.25);",
        "display:flex;align-items:center;justify-content:center;",
        '">',
        '<div style="transform:rotate(45deg);color:#fff;font-size:14px;">&#9679;</div>',
        "</div>",
      ].join(""),
      iconSize: [36, 36],
      iconAnchor: [18, 36],
      popupAnchor: [0, -40],
    });
  }

  var map = L.map("office-map", {
    center: [20, 10],
    zoom: 2,
    zoomControl: true,
    scrollWheelZoom: false,
  });

  setTimeout(function () {
    map.invalidateSize();
  }, 300);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 19,
  }).addTo(map);

  var markers = {};

  $.each(offices, function (idx, office) {
    var marker = L.marker([office.lat, office.lng], {
      icon: makeIcon(),
    }).addTo(map);

    // Use permanent tooltip — all 3 show at once, no overlap
    marker.bindTooltip(
      '<div class="custom-popup"><h4>' + office.name + '</h4><p>' + office.address + '</p></div>',
      {
        permanent: true,          // Always visible
        direction: office.tooltipDirection,
        opacity: 1,
        className: "custom-tooltip",
        offset: getOffset(office.tooltipDirection),
      }
    ).openTooltip();

    markers[office.id] = marker;
  });

  function getOffset(direction) {
    switch (direction) {
      case "left":   return [-10, -18];
      case "right":  return [10, -18];
      case "top":    return [0, -36];
      case "bottom": return [0, 10];
      default:       return [0, 0];
    }
  }

  // Set active card on load
  $(".map-office-card").eq(0).addClass("active");

  // Card click — fly to location, highlight card
  $(".map-office-card").on("click", function () {
    var $card = $(this);
    var idx = $(".map-office-card").index($card);

    $(".map-office-card").removeClass("active");
    $card.addClass("active");

    var lat = parseFloat($card.data("lat"));
    var lng = parseFloat($card.data("lng"));
    var zoom = parseInt($card.data("zoom")) || 5;

    map.flyTo([lat, lng], zoom, { duration: 1.2 });
  });

  // Contact modal
  $(".open-contact-modal").on("click", function (e) {
    e.preventDefault();
    $(".support-modal-overlay").removeClass("active");
    $(".modal-overlay").addClass("active");
    $("body").css("overflow", "hidden");
  });

  $(".modal-overlay").on("click", function () {
    $(this).removeClass("active");
    $("body").css("overflow", "");
  });

  $(".contact-modal").on("click", function (e) {
    e.stopPropagation();
  });

  // Support modal
  $(".open-support-modal").on("click", function (e) {
    e.preventDefault();
    $(".modal-overlay").removeClass("active");
    $(".support-modal-overlay").addClass("active");
    $("body").css("overflow", "hidden");
  });

  $(".support-modal-overlay").on("click", function () {
    $(this).removeClass("active");
    $("body").css("overflow", "");
  });

  $(".support-modal").on("click", function (e) {
    e.stopPropagation();
  });
});