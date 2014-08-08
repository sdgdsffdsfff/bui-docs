<?php $title="柱状图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var chart = new Chart({
          id : 'canvas',
          <?php print getTheme()."\n"?>
          width : 950,
          height : 500,
          plotCfg : {
            margin : [50,50,80] //画板的边距
          },
          title : {
            text : '柱状图'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          xAxis : {
            categories: [
              'Tokyo',
              'Jakarta',
              'New York',
              'Seoul',
              'Manila',
              'Mumbai',
              'Sao Paulo',
              'Mexico City',
              'Dehli',
              'Osaka',
              'Cairo',
              'Kolkata',
              'Los Angeles',
              'Shanghai',
              'Moscow',
              'Beijing',
              'Buenos Aires',
              'Guangzhou',
              'Shenzhen',
              'Istanbul'
            ],
            labels : {
              label : {
                rotate : -45,
                'text-anchor' : 'end'
              }
            }
          },
          yAxis : {
            min : 0
          },
          seriesOptions : { //设置多个序列共同的属性
            /*columnCfg : { //公共的样式在此配置

            }*/
          },
          tooltip : {
            valueSuffix : '￥'
          },
          series : [ {
            name: 'Africa',
            type : 'column',
            data: [34.4, 21.8, {y : 20.1,attrs : {fill : '#ff0000'}}, 20, 19.6, 19.5, 19.1, 18.4, 18,
                17.3, 16.8, 15, 14.7, 14.5, 13.3, 12.8, 12.4, 11.8,
                11.7, 11.2],
            labels : { //显示的文本信息
              label : {
                rotate : -90,
                y : 10,
                'fill' : '#fff',
                'text-anchor' : 'end',
                textShadow: '0 0 3px black',
                'font-size' : '14px'
              }
            }

          }]

        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
