<?php  
include_once("conexion/BD.php");

  $sql = "SELECT COUNT(CASE WHEN genero = 'Masculino' THEN 1 END) as M, COUNT(CASE WHEN genero ='Femenino' THEN 1 END) as F FROM `matrix`";
  $res = $con->query($sql);
  $reg = $res->fetch_assoc();            
   
  $query = "SELECT 
  
  COUNT(CASE WHEN juris = 'TLALNEPANTLA' THEN 1 END) as T, 
  COUNT(CASE WHEN juris ='ECATEPEC' THEN 1 END) as E, 
  COUNT(CASE WHEN juris = 'AMECAMECA' THEN 1 END) as A, 
  COUNT(CASE WHEN juris ='ZUMPANGO' THEN 1 END) as Z 
  FROM `dgis`";
  $res = $con->query($query);
  $juris = $res->fetch_assoc(); 

  $query = "SELECT 
  
  COUNT(CASE WHEN clave = 'IMSS' THEN 1 END) as IMSS, 
  COUNT(CASE WHEN clave ='ISSSTE' THEN 1 END) as ISSSTE, 
  COUNT(CASE WHEN clave = 'DIF' THEN 1 END) as DIF
 
  FROM `dgis` where juris='TLALNEPANTLA'";
  $res = $con->query($query);
  $TLALNEPANTLA = $res->fetch_assoc(); 

   $query = "SELECT 
  
  COUNT(CASE WHEN clave = 'IMSS' THEN 1 END) as IMSS, 
  COUNT(CASE WHEN clave ='ISSSTE' THEN 1 END) as ISSSTE, 
  COUNT(CASE WHEN clave = 'DIF' THEN 1 END) as DIF
 
  FROM `dgis` where juris='ZUMPANGO'";
  $res = $con->query($query);
  $ZUMPANGO = $res->fetch_assoc(); 

  $query = "SELECT 
  
  COUNT(CASE WHEN clave = 'IMSS' THEN 1 END) as IMSS, 
  COUNT(CASE WHEN clave ='ISSSTE' THEN 1 END) as ISSSTE, 
  COUNT(CASE WHEN clave = 'DIF' THEN 1 END) as DIF
 
  FROM `dgis` where juris='AMECAMECA'";
  $res = $con->query($query);
  $AMECAMECA = $res->fetch_assoc(); 


  $query = "SELECT 
  
  COUNT(CASE WHEN clave = 'IMSS' THEN 1 END) as IMSS, 
  COUNT(CASE WHEN clave ='ISSSTE' THEN 1 END) as ISSSTE, 
  COUNT(CASE WHEN clave = 'DIF' THEN 1 END) as DIF
 
  FROM `dgis` where juris='ECATEPEC'";
  $res = $con->query($query);
  $ECATEPEC = $res->fetch_assoc(); 

  $query = "SELECT 
  
  COUNT(CASE WHEN edad >= 18 AND edad <= 30 THEN 1 END) as EDADX, 
  COUNT(CASE WHEN edad >= 31 AND edad <= 60 THEN 1 END) as EDADY, 
  COUNT(CASE WHEN edad >= 61 AND edad <= 100 THEN 1 END) as EDADZ
 
  FROM `matrix`";
  $res = $con->query($query);
  $edad = $res->fetch_assoc(); 



?>
<script>
<!-- grafica 1 -->

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  radius: am5.percent(90),
  innerRadius: am5.percent(50),
  layout: root.horizontalLayout
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  name: "Series",
  valueField: "sales",
  categoryField: "country"
}));


 
    
    
    
series.data.setAll([ <?php
      $sql2 = "SELECT Municipio,COUNT(Municipio) AS b FROM matrix   where fechaingreso between '2022-05-01' and '2022-07-20' GROUP BY Municipio ORDER BY Municipio ";
      $res2 = $con->query($sql2);
      while ($regg2 = $res2->fetch_assoc()) { ?> 
         {
          country: "<?php echo ($regg2['Municipio']); ?>",
         sales: <?php echo ($regg2['b']); ?>
        },
      <?php
      } ?>  ]);

// Disabling labels and ticks
series.labels.template.set("visible", false);
series.ticks.template.set("visible", false);

// Adding gradients
series.slices.template.set("strokeOpacity", 0);
series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
  stops: [{
    brighten: -0.8
  }, {
    brighten: -0.8
  }, {
    brighten: -0.5
  }, {
    brighten: 0
  }, {
    brighten: -0.5
  }]
}));

// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerY: am5.percent(50),
  y: am5.percent(50),
  layout: root.verticalLayout
}));
// set value labels align to right
legend.valueLabels.template.setAll({ textAlign: "right" })
// set width and max width of labels
legend.labels.template.setAll({ 
  maxWidth: 150,
  width: 140,
  oversizedBehavior: "wrap"
});

legend.data.setAll(series.dataItems);

series.appear(1000, 100);

    
    
}); // end am5.ready()
<!-- grafica 1 -->


<!-- grafica 2 -->

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv2");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
// start and end angle must be set both for chart and series
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  startAngle: 180,
  endAngle: 360,
  layout: root.verticalLayout,
  innerRadius: am5.percent(50)
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
// start and end angle must be set both for chart and series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  startAngle: 180,
  endAngle: 360,
  valueField: "value",
  categoryField: "category",
  alignLabels: false
}));

series.states.create("hidden", {
  startAngle: 180,
  endAngle: 180
});

series.slices.template.setAll({
  cornerRadius: 5
});

series.ticks.template.setAll({
  forceHidden: true
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
    
    
    
         {
           value: <?php echo $edad['EDADX']; ?>,     
          category: "<= 18 AND >=30"
        
        },{
           value: <?php echo $edad['EDADY']; ?>,     
          category: "<= 31 AND >=60"
        
        },{
           value: <?php echo $edad['EDADZ']; ?>,     
          category: "<= 61 AND >=100"
        
        }
 
]);
// Add export menu
var exporting = am5plugins_exporting.Exporting.new(root, {
  menu: am5plugins_exporting.ExportingMenu.new(root, {})
});
series.appear(1000, 100);

}); // end am5.ready()
<!-- grafica 2 -->


<!-- grafica 3 -->
am5.ready(function() {


// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv3");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([am5themes_Animated.new(root)]);

var container = root.container.children.push(
  am5.Container.new(root, {
    width: am5.p100,
    height: am5.p100,
    layout: root.horizontalLayout
  })
);

// Create main chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = container.children.push(
  am5percent.PieChart.new(root, {
    tooltip: am5.Tooltip.new(root, {})
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category",
    alignLabels: false
  })
);

series.labels.template.setAll({
  textType: "circular",
  radius: 4
});
series.ticks.template.set("visible", false);
series.slices.template.set("toggleKey", "none");

// add events
series.slices.template.events.on("click", function(e) {
  selectSlice(e.target);
});

// Create sub chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var subChart = container.children.push(
  am5percent.PieChart.new(root, {
    radius: am5.percent(50),
    tooltip: am5.Tooltip.new(root, {})
  })
);

// Create sub series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var subSeries = subChart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category"
  })
);

subSeries.data.setAll([
  { category: "A", value: 0 },
  { category: "B", value: 0 },
  { category: "C", value: 0 },
  { category: "D", value: 0 },
  { category: "E", value: 0 },
  { category: "F", value: 0 },
  { category: "G", value: 0 }
]);
subSeries.slices.template.set("toggleKey", "none");

var selectedSlice;

series.on("startAngle", function() {
  updateLines();
});

container.events.on("boundschanged", function() {
  root.events.on("frameended", function(){
    updateLines();
   })
})

function updateLines() {
  if (selectedSlice) {
    var startAngle = selectedSlice.get("startAngle");
    var arc = selectedSlice.get("arc");
    var radius = selectedSlice.get("radius");

    var x00 = radius * am5.math.cos(startAngle);
    var y00 = radius * am5.math.sin(startAngle);

    var x10 = radius * am5.math.cos(startAngle + arc);
    var y10 = radius * am5.math.sin(startAngle + arc);

    var subRadius = subSeries.slices.getIndex(0).get("radius");
    var x01 = 0;
    var y01 = -subRadius;

    var x11 = 0;
    var y11 = subRadius;

    var point00 = series.toGlobal({ x: x00, y: y00 });
    var point10 = series.toGlobal({ x: x10, y: y10 });

    var point01 = subSeries.toGlobal({ x: x01, y: y01 });
    var point11 = subSeries.toGlobal({ x: x11, y: y11 });

    line0.set("points", [point00, point01]);
    line1.set("points", [point10, point11]);
  }
}

// lines
var line0 = container.children.push(
  am5.Line.new(root, {
    position: "absolute",
    stroke: root.interfaceColors.get("text"),
    strokeDasharray: [2, 2]
  })
);
var line1 = container.children.push(
  am5.Line.new(root, {
    position: "absolute",
    stroke: root.interfaceColors.get("text"),
    strokeDasharray: [2, 2]
  })
);

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
  {
    category: "TLALNEPANTLA",
    value: <?php echo $juris['T']; ?>,
    subData: [
      { category: "IMSS", value: <?php echo $TLALNEPANTLA['IMSS']; ?> },
      { category: "ISSSTE", value: <?php echo $TLALNEPANTLA['ISSSTE']; ?> },
    { category: "DIF", value: <?php echo $TLALNEPANTLA['DIF']; ?> }
    ]
  },
  {
    category: "ZUMPANGO",
    value: <?php echo $juris['Z']; ?>,
    subData: [
     { category: "IMSS", value: <?php echo $ZUMPANGO['IMSS']; ?> },
      { category: "ISSSTE", value: <?php echo $ZUMPANGO['ISSSTE']; ?> },
    { category: "DIF", value: <?php echo $ZUMPANGO['DIF']; ?> }
    ]
  },
  {
    category: "AMECAMECA",
    value: <?php echo $juris['A']; ?>,
    subData: [
      { category: "IMSS", value: <?php echo $AMECAMECA['IMSS']; ?> },
      { category: "ISSSTE", value: <?php echo $AMECAMECA['ISSSTE']; ?> },
    { category: "DIF", value: <?php echo $AMECAMECA['DIF']; ?> }
    ]
  },
  {
    category: "ECATEPEC",
    value: <?php echo $juris['E']; ?>,
    subData: [
       { category: "IMSS", value: <?php echo $ECATEPEC['IMSS']; ?> },
      { category: "ISSSTE", value: <?php echo $ECATEPEC['ISSSTE']; ?> },
    { category: "DIF", value: <?php echo $ECATEPEC['DIF']; ?> }
    ]
  }


]);

function selectSlice(slice) {
  selectedSlice = slice;
  var dataItem = slice.dataItem;
  var dataContext = dataItem.dataContext;

  if (dataContext) {
    var i = 0;
    subSeries.data.each(function(dataObject) {
      var dataObj = dataContext.subData[i];
      if(dataObj){
          subSeries.data.setIndex(i, dataObj);
          if(!subSeries.dataItems[i].get("visible")){
              subSeries.dataItems[i].show();
          }
      }
      else{
          subSeries.dataItems[i].hide();
      }
      
      i++;
    });
  }

  var middleAngle = slice.get("startAngle") + slice.get("arc") / 2;
  var firstAngle = series.dataItems[0].get("slice").get("startAngle");

  series.animate({
    key: "startAngle",
    to: firstAngle - middleAngle,
    duration: 1000,
    easing: am5.ease.out(am5.ease.cubic)
  });
  series.animate({
    key: "endAngle",
    to: firstAngle - middleAngle + 360,
    duration: 1000,
    easing: am5.ease.out(am5.ease.cubic)
  });
}

container.appear(1000, 10);
// Add export menu
var exporting = am5plugins_exporting.Exporting.new(root, {
  menu: am5plugins_exporting.ExportingMenu.new(root, {})
});
series.events.on("datavalidated", function() {
  selectSlice(series.slices.getIndex(0));
});

}); // end am5.ready()
    
<!-- grafica 3 -->

<!-- grafica 4 -->

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv4");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(
  am5xy.XYChart.new(root, {
    panX: true,
    panY: true,
    wheelX: "panX",
    wheelY: "zoomX"
  })
);

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

var xAxis = chart.xAxes.push(
  am5xy.CategoryAxis.new(root, {
    maxDeviation: 0.3,
    categoryField: "country",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
  })
);

var yAxis = chart.yAxes.push(
  am5xy.ValueAxis.new(root, {
    maxDeviation: 0.3,
    renderer: am5xy.AxisRendererY.new(root, {})
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(
  am5xy.ColumnSeries.new(root, {
    name: "Series 1",
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: "value",
    sequencedInterpolation: true,
    categoryXField: "country"
  })
);

series.columns.template.setAll({
  width: am5.percent(120),
  fillOpacity: 0.9,
  strokeOpacity: 0
});
series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.set("draw", function (display, target) {
  var w = target.getPrivate("width", 0);
  var h = target.getPrivate("height", 0);
  display.moveTo(0, h);
  display.bezierCurveTo(w / 4, h, w / 4, 0, w / 2, 0);
  display.bezierCurveTo(w - w / 4, 0, w - w / 4, h, w, h);
});

    
    
  
    
    
    
    
    
// Set data
var data = [ <?php
      $sql2 = "SELECT genero,COUNT(genero) AS b FROM matrix where fechaingreso between '2021-01-01' and '2022-07-20'   GROUP BY genero ORDER BY genero";
      $res2 = $con->query($sql2);
      while ($regg2 = $res2->fetch_assoc()) { ?> 
         {
          country: "<?php echo ($regg2['genero']); ?>",
         value: <?php echo ($regg2['b']); ?>
        },
      <?php
      } ?>  ];

xAxis.data.setAll(data);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);
// Add export menu
var exporting = am5plugins_exporting.Exporting.new(root, {
  menu: am5plugins_exporting.ExportingMenu.new(root, {})
});
});
<!-- grafica 4 -->

</script>