<?php $title="曲线图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var chart = new AChart({
          id : 'canvas',
           <?php print getTheme()."\n"?> //theme : Chart.Theme.Base,
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
          seriesOptions : { //设置多个序列共同的属性
            lineCfg : { //不同类型的图对应不同的共用属性，lineCfg,areaCfg,columnCfg等，type + Cfg 标示
              markers : {
                /*marker : { //此处是默认皮肤的默认markers配置，可以通过修改里面的值
                  radius : 3
                },
                actived : {
                  radius : 6,
                  stroke: '#fff'
                }*/
              }
            }
          },
          tooltip : {
            valueSuffix : '°C',
            shared : true, //是否多个数据序列共同显示信息
            crosshairs : true //是否出现基准线
            /**/
          },
          series : [{ //默认的marker的类型，会按照预先设置的顺序进行，可以通过markers修改对应的属性
                name: 'Tokyo',
                markers : {
                  marker : {
                    radius : 6,
                    'stroke-width' : 0,
                    stroke : undefined,
                    fill : null,
                    symbol : 'url(http://mat1.gtimg.com/www/images/qq2012/weather/20120906/sun.png)'
                  },
                  actived : {
                    
                    radius : 10
                  }
                },
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            },{
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, {y : 17.0,marker : { //单个对象上自定义标记
                  radius : 6,
                  fill : 'none',
                  symbol : 'url(http://mat1.gtimg.com/www/images/qq2012/weather/20120906/sun.png)'
                }}, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }]
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
