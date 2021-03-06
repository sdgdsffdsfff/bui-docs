<?php $title="显示连接线的树"?>
<?php include("../../templates/control-header.php"); ?>
  <style>
    .bui-tree-list{
      overflow: auto;
    }
  </style>
    <div class="row">
      <div class="span8 offset3">
        <div class="panel">
          <div class="panel-header clearfix">
            <h3 class="pull-left">双击编辑树</h3>
            <div id="tbar" class="pull-right"></div>
          </div>
          <div class="panel-body" id= "t1">
           
          </div>
        </div>
        
      </div>
    </div>
    <?php include("../../templates/script.php"); ?>
    <script type="text/javascript">
    <?php if($useKissy) {?>
    KISSY.use(['bui/tree','bui/data','bui/toolbar','bui/editor'],function (S,Tree,Data,Toolbar,Editor){
    <?php }else{?>
    BUI.use(['bui/tree','bui/data','bui/toolbar','bui/editor'],function (Tree,Data,Toolbar,Editor) {
    <?php } ?>
       var data = [ 
          {text : '1',id : '1',children: [{text : '11',id : '11'}]},
          {text : '2',id : '2',expanded : true,children : [
              {text : '21',id : '21',children : [{text : '211',id : '211'},{text : '212',id : '212'}]},
              {text : '22',id : '22'}
          ]},
          {text : '3',id : '3'},
          {text : '4',id : '4'}
        ];
        
      var tree = new Tree.TreeList({
        render : '#t1',
        showLine : true,
        height:300,
        nodes : data
      });
      tree.render();

      var store = tree.get('store'),
        editor = new Editor.Editor({
          field : { //设置编辑的字段
            rules : {
              required : true
            }
          },
          autoUpdate : false, //不自动更新对应DOM的文本，而使用store更新数据
          changeSourceEvent : null
        });
      editor.render();

      editor.on('accept',function(){
        var text = editor.getValue(),
          node = editor.get('curNode');
        node.text = text;
        store.update(node);
      });

      //显示编辑器
      function showEditor(node){
        var element = tree.findElement(node);
        editor.setValue(node.text);

        editor.set('curNode',node); //缓存当前编辑的记录
        editor.set('align',{ //设置对齐
          node : $(element).find('.x-tree-icon-wraper'),
          points : ['tr','tl']
        });
        editor.show();
        editor.focus(); //获取焦点

      }
      //双击编辑
      tree.on('itemdblclick',function(ev){
        var node = ev.item;
        showEditor(node);
      });

      var bar = new Toolbar.Bar({
        render : '#tbar',
        elCls : 'button-group',
        children : [
          {
           
            elCls : 'button button-small',
            content : '添加',
            handler : function(){
              var selectedNode = tree.getSelected(),
                newNode = {text : '新增节点'};
              newNode = store.add(newNode,selectedNode);
              tree.expandNode(selectedNode);
              showEditor(newNode);
            }
          },
          {
            
            elCls : 'button button-small',
            content : '删除',
            handler : function(){
              var selectedNode = tree.getSelected();
              if(selectedNode){
                store.remove(selectedNode);
              }
              
            }
          }
        ]
      });
      bar.render();


      
    });
    </script>
<?php include("../../templates/control-footer.php"); ?>

