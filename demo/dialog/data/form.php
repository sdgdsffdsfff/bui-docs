<form id="J_Form" class="form-horizontal" action="">
    <div class="row">
      <div class="control-group span8">
        <label class="control-label">供应商编码：</label>
        <div class="controls">
          <input name="id" type="text" data-rules="{required:true}" data-messages="{required:'供应商编码不能为空'}" class="input-normal control-text" data-tip="{text:'请输入供应商编码'}">
        </div>
      </div>
      <div class="control-group span8">
        <label class="control-label">供应商类型：</label>
        <div class="controls">
          <select name="type" class="input-normal"> 
            <option value="saler">淘宝卖家</option>
            <option value="large">大厂直供</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="control-group span15">
        <label class="control-label">起始日期：</label>
        <div class="controls bui-form-group" data-rules="{dateRange : true}">
          <input name="start" data-tip="{text : '起始日期'}" data-rules="{required:true}" data-messages="{required:'起始日期不能为空'}" class="input-small calendar" type="text"><label>&nbsp;-&nbsp;</label>
          <input name="end" data-rules="{required:true}" data-messages="{required:'结束日期不能为空'}" class="input-small calendar" type="text">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="control-group span15">
        <label class="control-label">备注：</label>
        <div class="controls control-row4">
          <textarea name="memo" class="input-large" type="text"></textarea>
        </div>
      </div>
    </div>
</form>