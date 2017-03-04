<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Add Post</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <form action="functions/add_post_function.php" enctype="multipart/form-data" class="form-horizontal" method="post" >
                  <fieldset>
                    <div class="control-group">
                      <legend> Fill up the form to add post! </legend>

                      <input name="author" type="hidden" value="<?= $_SESSION['user_name']; ?>" /> 

                      <label class="control-label">Title<span class="required">*</span></label>
                      <div class="controls">
                        <input type="text" name="title" data-required="1" class="span5 m-wrap" id="typeahead"  data-provide="typeahead" data-source='["Daddy","Dad","Daughter","Son","Princess","Love"]'/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="textarea2">Summary<span class="required">*</span></label>
                      <div class="controls">
                        <textarea name="description" class="input-xlarge textarea" placeholder="Enter description ..." style="width: 600px; height: 75px"></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Category<span class="required">*</span></label>
                      <div class="controls">
                        <select name="category" id="select01" class="span5 m-wrap">
                          <option value="learn">learn</option>
                          <option value="stories">stories</option>
                          <option value="events">events</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="fileInput">Featured Image<span class="required">*</span></label>
                      <div class="controls">
                        <input name="attach" class="input-file uniform_on" id="fileInput" type="file">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="textarea2">Content<span class="required">*</span></label>
                      <div class="controls">
                        <textarea name="content" class="input-xlarge textarea" placeholder="Enter content ..." style="width: 600px; height: 200px"></textarea>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Add Post</button>
                      <button type="button" class="btn" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue">Cancel</button>
                    </div>
                  </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>

