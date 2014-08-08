<?php $title="图形分组"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">  
      <div id="canvas">
        
      </div>
    </div>
    
    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
    
      //创建画板
      var canvas = new Chart.Canvas({
        id : 'canvas',
        height : 400,
        width : 500
      });

      var group = canvas.addGroup({
        elCls : 'group12'
      });

      canvas.addGroup({
        id : 'my-group',
        x : 100,
        y : 100
      });

      group.addShape('circle',{
        cx : 125,
        cy : 100,
        r : 20,
        fill : '#2f7ed8',
        stroke : ''
      });

      group.animate({ //分组的动画仅支持平移
        x : 300,
        y : 200
      },1000);

      //通过id查找分组
      var mygroup = canvas.find('my-group');

      mygroup.addShape('rect',{
        x : 0,
        y : 0,
        height: 100,
        width : 100,
        fill : 'red',
        'fill-opacity':.5,
        stroke : 'yellow'
      });
      
      </script>
<?php include("../../templates/control-footer.php"); ?>