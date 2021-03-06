<?php $title="表格使用弹出框编辑"?>
<?php include("../../templates/control-header.php"); ?>
    <div class="row">
      <div class="span16">
        <div id="grid">
          
        </div>
      </div>
    </div>
    <!-- 初始隐藏 dialog内容 -->
    <div id="content" class="hide">
      <form class="form-horizontal">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>文本：</label>
            <div class="controls">
              <input id="a1" name="a" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label"><s>*</s>数字：</label>
            <div class="controls">
              <input name="b" type="text" data-rules="{required:true,number : true}" class="input-normal control-text">
            </div>
          </div>
        </div>  
        <div class="row">
          <div class="control-group span8 ">
            <label class="control-label">日期：</label>
            <div id="range" class="controls">
              <input name="c" class="calendar" type="text">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">选择：</label>
            <div class="controls">
              <select name="d" class="input-normal"> 
                <option value="">请选择</option>
                <option value="1">选项一</option>
                <option value="2">选项二</option>
              </select>
            </div>
          </div>
       
        </div>
        <div class="row">
          <div class="control-group span12">
            <label class="control-label">多选：</label>
            <div class="controls bui-form-field-select" data-select="{multipleSelect:true,items : [{text:'选项一',value:'1'},{text:'选项二',value:'2'},{text:'选项三',value:'3'}]}">
              <input type="hidden" name="e">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">备注：</label>
            <div class="controls control-row4">
              <textarea name="f" class="input-large" type="text"></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php include("../../templates/script.php"); ?>
    <script type="text/javascript">
    <?php if($useKissy) {?>
    KISSY.use(['bui/grid','bui/data'],function(S,Grid,Data){
    <?php }else if($useLoader) {?>
    BUI.use(['bui/grid','bui/data'],function(Grid,Data){
    <?php }else{?>
        var Grid = BUI.Grid,
            Data = BUI.Data;
    <?php }?>
        var Grid = Grid,
          Store = Data.Store,
          enumObj = {"1" : "选项一","2" : "选项二","3" : "选项三"},
          columns = [
            {title : '文本',dataIndex :'a'}, //editor中的定义等用于 BUI.Form.Field.Text的定义
            {title : '数字', dataIndex :'b'},
            {title : '日期',dataIndex :'c'},
            {title : '单选',dataIndex : 'd',renderer : Grid.Format.enumRenderer(enumObj)},
            {title : '多选',dataIndex : 'e',renderer : Grid.Format.multipleItemsRenderer(enumObj)},
            {title : '操作',renderer : function(){
              return '<span class="grid-command btn-edit">编辑</span>'
            }}
          ],
          data = [{a:'123'},{a:'cdd',c:'2013-03-13'},{a:'1333',b:2222,d:2,e:'1,2'}];

        var 
          editing = new Grid.Plugins.DialogEditing({
            contentId : 'content', //设置隐藏的Dialog内容
            triggerCls : 'btn-edit' //触发显示Dialog的样式
          }),
          store = new Store({
            data : data,
            autoLoad:true
          }),
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                  btnCls : 'button button-small',
                  text : '<i class="icon-plus"></i>添加',
                  listeners : {
                    'click' : addFunction
                  }
                },
                {
                  btnCls : 'button button-small',
                  text : '<i class="icon-remove"></i>删除',
                  listeners : {
                    'click' : delFunction
                  }
                }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection],
            store : store
          });

        grid.render();

        editing.on('editorshow',function(ev){
          var //type = ev.editType, //add ,edit
            record = editing.get('record'); 
          if(record.isAdd){  //如果马上保存，通过 ev.editType == 'add' 来判断
            $('#a1').attr('readonly',false);
          }else{
            $('#a1').attr('readonly',true);
          }
        });

        //添加记录
        function addFunction(){
          var newData = {b : 0,isAdd : true}; //添加标志位，标志是否新增
          editing.add(newData,'a'); //添加记录后，直接编辑
        }
        //删除选中的记录
        function delFunction(){
          var selections = grid.getSelection();
          store.remove(selections);
        }          
    <?php if($useLoader) {?>
  });
    <?php } ?>
</script>
<?php include("../../templates/control-footer.php"); ?>

