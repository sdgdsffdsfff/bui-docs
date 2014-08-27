<?php $title="折线图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
  
        var chart = new AChart({
          id : 'canvas', //render改成 id
          <?php print getTheme()."\n"?>
          width : 950,
          height : 500,
          plotCfg : {
            margin : [50,50,80] //画板的边距
          },
          title : {
            text : '一年的平均温度'

          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          invert : true, //坐标轴转置
          xAxis : {   //坐标轴更改位置和文本配置信息
            position : 'left', //x轴居左
            title : {
              text : '温度',
              rotate : -90
            },
            labels : {
              label : {
                'text-anchor' : 'end',
                x : -12,
                y : 0
              }
            },
            categories : ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月']
          },
          yAxis : {
            position : 'bottom'
          },
          tooltip : {
            valueSuffix : '°C'
          },
          series : [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
          }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
          }]
        });

        chart.render();
  </script>
<?php include("../../templates/control-footer.php"); ?>
