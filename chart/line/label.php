<?php $title="曲线图"?>
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
              smooth : true,
              labels : { //标示显示文本
                label : { //文本样式

                  y : -15
                },
                //渲染文本
                renderer : function(value,item){ //通过item修改属性
                  if(value > 25){
                    item.fill = 'red';
                    item['font-weight'] = 'bold';
                    item['font-size'] = 16;
                  }
                  return value;
                }
              }
            }
          },
          tooltip : {
            valueSuffix : '°C'/*,
            shared : true, //是否多个数据序列共同显示信息
            crosshairs : true //是否出现基准线
            */
          },
          series : [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            },{
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }]
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
