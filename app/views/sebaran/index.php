<main>
    <div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
        <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
            <li class="breadcrumb-item"><a href="index.php" class="link">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/sebaran" class="link">Sebaran Mahasiswa</a></li>
        </ol>
    </div>
    <div class="container-fluid px-4 mt-2">
        <div class="card mb-3">
            <div class="card-body p-1">
                <div id="chartdiv"></div>
            </div>
            <div class="card-footer p-0">
              <p  class="fst-italic mb-0"><i class="m-2" data-feather="info"></i>*Sebaran Mahasiswa Baru berdasarkan Mahasiswa yang sudah mendapatkan NIM (Nomor Induk Mahasiswa)
                </p>
                <!-- <a class="btn btn-primary col-12" href="rekap-sebaran.php" role="button">
                    <div class="row">
                        <div class="col-10">
                        <h4 class="card-title ps-4 m-0 text-start">Asal Daerah Mahasiswa Baru</h4>
                        </div>
                        <div class="col float-end">
                        <i data-feather="chevron-right"></i>
                        </div>
                    </div>
                </a> -->
            </div>
        </div>
    </div>
  <?php 
$mhs = array();
    foreach($data['prov'] as $row) {
        $mhs[] = $row;
    }
  ?>
</main>
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

 // Create map instance
var chart = am4core.create("chartdiv", am4maps.MapChart);

// Set map definition
chart.geodata = am4geodata_indonesiaHigh;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

//background
chart.background.fill = am4core.color("#F1F1F1");
chart.background.fillOpacity = 0.5;

//Set min/max fill color for each area
polygonSeries.heatRules.push({
  "property": "fill",
  "target": polygonSeries.mapPolygons.template,
  "min": am4core.color("#FF8700"),
  "max": am4core.color("#7B4100"),
  // "logarithmic": true
});
// Make map load polygon data (state shapes and names) from GeoJSON
polygonSeries.useGeodata = true;

// Set heatmap values for each state
polygonSeries.data = <?php echo json_encode($mhs) ?>

//exclude map
polygonSeries.exclude = ["MY-13", "MY-12", "BN", "TL"];

//setting zoom
chart.seriesContainer.draggable = false;
chart.seriesContainer.resizable = false;
chart.chartContainer.wheelable = false;
chart.seriesContainer.events.disableType("doublehit");
chart.chartContainer.background.events.disableType("doublehit");

// Add zoom control
chart.zoomControl = new am4maps.ZoomControl();

// Add button
var button = chart.chartContainer.createChild(am4core.Button);
button.padding(5, 5, 5, 5);
button.align = "right";
button.marginRight = 15;
button.events.on("hit", function() {
  chart.goHome();
});
button.icon = new am4core.Sprite();
button.icon.path = "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8";

// Add heat legend
let heatLegend = chart.createChild(am4maps.HeatLegend);
heatLegend.series = polygonSeries;
heatLegend.align = "right";
heatLegend.valign = "bottom";
heatLegend.width = am4core.percent(40);;
heatLegend.marginRight = am4core.percent(6);
heatLegend.valueAxis.renderer.opposite = true;
heatLegend.valueAxis.renderer.dx = - 25;
heatLegend.valueAxis.strictMinMax = false;
heatLegend.valueAxis.fontSize = 9;
// heatLegend.valueAxis.logarithmic = true;

// Configure series tooltip
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name} : {value} Mahasiswa";
polygonTemplate.nonScalingStroke = true;
polygonTemplate.strokeWidth = 0.5;

// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.fill = am4core.color("#004F91");

// Configure label series
var labelSeries = chart.series.push(new am4maps.MapImageSeries());
var labelTemplate = labelSeries.mapImages.template.createChild(am4core.Label);
labelTemplate.horizontalCenter = "middle";
labelTemplate.verticalCenter = "middle";
labelTemplate.fontSize = 12;
labelTemplate.interactionsEnabled = false;
labelTemplate.nonScaling = false;

var ids = ["ID-AC",
"ID-SU",
"ID-SB",
"ID-RI",
"ID-JA",
"ID-SS",
"ID-BE",
"ID-LA",
"ID-BB",
"ID-KR",
"ID-JK",
"ID-JB",
"ID-JT",
"ID-YO",
"ID-JI",
"ID-BT",
"ID-KB",
"ID-KT",
"ID-KS",
"ID-KI",
"ID-KU",
"ID-SA",
"ID-ST",
"ID-SN",
"ID-SG",
"ID-GO",
"ID-SR",
"ID-BA",
"ID-NB",
"ID-NT",
"ID-MA",
"ID-MU",
"ID-PA",
"ID-PB"];

// Set up label series to populate
polygonSeries.events.on("inited", function () {
  for(var i = 0; i < ids.length; i++){
  	var polygon = polygonSeries.getPolygonById(ids[i]);
  	if(polygon){
	    var label = labelSeries.mapImages.create();
	    var state = polygon.dataItem.dataContext.id.split("-").pop();
	    label.latitude = polygon.visualLatitude;
	    label.longitude = polygon.visualLongitude;
	    label.children.getIndex(0).text = state;
	}
  }
});


polygonSeries.mapPolygons.template.events.on("over", function(ev) {
  if (!isNaN(ev.target.dataItem.value)) {
    heatLegend.valueAxis.showTooltipAt(ev.target.dataItem.value)
  }
  else {
    heatLegend.valueAxis.hideTooltip();
  }
});

polygonSeries.mapPolygons.template.events.on("out", function(ev) {
  heatLegend.valueAxis.hideTooltip();
});

</script>