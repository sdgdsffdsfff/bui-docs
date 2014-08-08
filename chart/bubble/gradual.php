<?php $title="内部渐变图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">  
      <div id="canvas">
        
      </div>
    </div>
    
    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
    
  
        var chart = new Chart({
          id : 'canvas',
          width : 950,
          height : 500,
          plotCfg : {
            margin : [50,50,100]
            
          },
          title : {
            text : '气泡图',
            'font-size' : '16px'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          xAxis : {
              tickOffset : 20
          },
          yAxis : {
            title : {
              text : '气泡'
            },
            min : -10
          },  
          tooltip : {
            shared : true
          },
          seriesOptions : {
              bubbleCfg : {
                
              }
          },
          series: [{
            name : 'bubble1',
            data: [[9, 81, 63],
                [98, 5, 89],
                [51, 50, 73],
                [41, 22, 14],
                [58, 24, 20],
                [78, 37, 34],
                [55, 56, 53],
                [18, 45, 70],
                [42, 44, 28],
                [3, 52, 59],
                [31, 18, 97],
                [79, 91, 63],
                [93, 23, 23],
                [44, 83, 22]],
            circle : {
                fill : 'r(0.4, 0.3)rgba(255,255,255,0.5)-rgba(69,114,167,0.5)'
            }
        }, {
            name : 'bubble2',
            data: [ [42, 38, 20],
                [6, 18, 1],
                [1, 93, 55],
                [57, 2, 90],
                [80, 76, 22],
                [11, 74, 96],
                [88, 56, 10],
                [30, 47, 49],
                [57, 62, 98],
                [4, 16, 16],
                [46, 10, 11],
                [22, 87, 89],
                [57, 91, 82],
                [45, 15, 98]],
            circle : {
                fill : 'r(0.4, 0.3)rgba(255,255,255,0.5)-rgba(170,70,67,0.5)'
            }
        }]
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>