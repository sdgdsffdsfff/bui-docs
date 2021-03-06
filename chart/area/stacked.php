<?php $title="存在断点的区域图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var chart = new AChart({
          id : 'canvas',
          <?php print getTheme()."\n"?>
          width : 950,
          height : 500,
          plotCfg : {
            margin : [50,50,80] //画板的边距
          },
          title : {
            text : '区域图'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          seriesOptions : { //设置多个序列共同的属性
            areaCfg : {
                pointStart: 1940,
                pointInterval: 1,
                stackType : 'normal' //none,normal,percent三种类型，默认是none
            }
          },
          tooltip : {
            valueSuffix : '°C',
            shared : true,
            crosshairs : true
          },
          series : [ {
              name: 'Africa',
              data: [106, 107, 111, 133, 221, 767, 1766]
          }, {
              name: 'Europe',
              data: [163, 203, 276, 408, 547, 729, 628]
          }, {
              name: 'America',
              data: [18, 31, 54, 156, 339, 818, 1201]
          }, {
              name: 'Oceania',
              data: [2, 2, 2, 6, 13, 30, 46]
          },{
              name: 'Asia',
              data: [502, 635, 809, 947, 1402, 3634, 5268]
          }]

        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
