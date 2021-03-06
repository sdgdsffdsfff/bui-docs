<?php $title="修改标记样式"?>
<?php include("../../templates/chart-header.php"); ?>
<style>
    .ac-tooltip{
        position:absolute;
        visibility:hidden;
        border : 1px solid #efefef;
        background-color: white;
        opacity: .8;
        padding: 10px;

        transition: top 200ms,left 200ms;
        -moz-transition:  top 200ms,left 200ms;  /* Firefox 4 */
        -webkit-transition:  top 200ms,left 200ms; /* Safari 和 Chrome */
        -o-transition:  top 200ms,left 200ms;
    }

    .ac-tooltip .ac-title{
        margin: 0;
        padding: 5px 0;
    }

    .ac-tooltip .ac-list{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .ac-tooltip li{
        line-height:  22px;
    }
</style>
<div class="detail-section">
    <div id="canvas">

    </div>
</div>

<?php include("../../templates/chart-script.php"); ?>

<script type="text/javascript">

    var chart = new Chart({
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
    xAxis : {
        categories : ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月']
    },
    yAxis : {
        title : {
            text : '温度',
                    rotate : -90
        }
    },
    tooltip : {
        valueSuffix : '°C',
        custom : true //自定义tooltip
    },
    seriesOptions: {
        flagCfg: {
            flags:{
                flag:{
                    distance: -15,              //上下偏移的距离
                    line: {                     //线的配置
                        stroke: '#00cccc',
                        'stroke-width': 1
                    },
                    shapeType: 'circle',        //可选circle，rect，image三种，默认rect
                    shapeCfg: {                 //shape的配置项
                        stroke: '#00cccc',
                        r: 12,
                        width: 22,
                        height: 22
                    },
                    title: 'B',                 //显示的title
                    titleCfg: {                 //title配置项

                        rotate : 90,
                        'font-size':13,
                        'font-weight' : 'bold'
                    },
                    text: '这是一个flag',         //tooltip显示

                }
            },
            duration : 1000,                //动画时间
            animate: true,                  //是否动画
        }
    },
    series : [{
        id: 's1',
        type: 'line',
        name: 'Tokyo',
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        type: 'line',
        name: 'Beijing',
        data: [13.9, 14.2, 15.7, 18.5, 21.9, 25.2, 27.0, 26.6, 24.2, 20.3, 16.6, 14.8]
    },{
        name: 'flag',
        data:[{
            x : '一月'
        },{
            x : '一月'
        },{
            x : '十一月',
            flag:{                  //可以配置在data内部
                title:''  ,
                distance: 0,
                shapeType: 'image',
                shapeCfg: {
                    width: 16,
                    height: 20,
                    src: 'https://i.alipayobjects.com/i/ecmng/png/201408/3Ds9p7HMph_src.png'
                }
            }
        },{
            x : '十二月'
        }],
        type: 'flag',
        onSeries: 's1' //定义flag坐落的series
    }]
    });

    chart.render();
</script>
<?php include("../../templates/control-footer.php"); ?>
