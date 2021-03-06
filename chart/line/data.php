<?php $title="更改数据格式图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var data = [
            {"month":"0","tokyo":7,"newYork":-0.2,"berlin":-0.9,"london":3.9},
            {"month":"1","tokyo":6.9,"newYork":0.8,"berlin":0.6,"london":4.2},
            {"month":"2","tokyo":9.5,"newYork":5.7,"berlin":3.5,"london":5.7},
            {"month":"3","tokyo":14.5,"newYork":11.3,"berlin":8.4,"london":8.5},
            {"month":"4","tokyo":18.2,"newYork":17,"berlin":13.5,"london":11.9},
            {"month":"5","tokyo":21.5,"newYork":22,"berlin":17,"london":15.2},
            {"month":"6","tokyo":25.2,"newYork":24.8,"berlin":18.6,"london":17},
            {"month":"7","tokyo":26.5,"newYork":24.1,"berlin":17.9,"london":16.6},
            {"month":"8","tokyo":23.3,"newYork":20.1,"berlin":14.3,"london":14.2},
            {"month":"9","tokyo":18.3,"newYork":14.1,"berlin":9,"london":10.3},
            {"month":"10","tokyo":13.9,"newYork":8.6,"berlin":3.9,"london":6.6},
            {"month":"11","tokyo":9.6,"newYork":2.5,"berlin":1,"london":4.8}
          ];
        var chart = new AChart({
          id : 'canvas',
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
          xAxis : {
            categories : ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月']
          },
          yAxis : {
            title : {
              text : '温度',
              rotate : -90
            }
          },
          data : data,
          tooltip : {
            valueSuffix : '°C',
            shared : true, //是否多个数据序列共同显示信息
            crosshairs : true //是否出现基准线
          },
          series : [{
                name: 'Tokyo',
                yField : 'tokyo'
            }, {
                name: 'New York',
                yField : 'newYork'
            }, {
                name: 'Berlin',
                yField : 'berlin'
            }, {
                name: 'London',
                yField : 'london'
            }]
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
