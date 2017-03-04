<?php
        
        date_default_timezone_set('Asia/Singapore');
	$id = $_GET['id'];
	$sql = "SELECT * FROM post WHERE post_id = '$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>  

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Edit Post</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <form action="functions/edit_post_function.php" enctype="multipart/form-data" class="form-horizontal" method="post" >
                  <fieldset>
                    <div class="control-group">
                    <legend> Edit the form to update the existing post! </legend>

                    <input name="post_id" type="hidden" value="<?= $id; ?>" /> 
                    <input name="author" type="hidden" value="<?= $_SESSION['user_name']; ?>" /> 

	                <label class="control-label">Title<span class="required">*</span></label>
	                <div class="controls">
	                  <input value="<?= $row['post_title']; ?>" type="text" name="title" data-required="1" class="span5 m-wrap" id="typeahead"  data-provide="typeahead" data-source='["Daddy","Dad","Daughter","Son","Princess","Love"]'/>
	                </div>

                    </div>
                    <div class="control-group">
                      <label class="control-label" for="textarea2">Summary<span class="required">*</span></label>
                      <div class="controls">
                        <textarea name="description" class="input-xlarge textarea" placeholder="Enter description ..." style="width: 600px; height: 75px">
                        	<?= $row['post_description']; ?>
                        </textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Category<span class="required">*</span></label>
                      <div class="controls">
                        <select name="category" id="select01" class="span5 m-wrap">
                          <option value="learn" <?php if($row['post_category']=='learn'){ echo "selected"; } ?>>learn</option>
                          <option value="stories" <?php if($row['post_category']=='stories'){ echo "selected"; } ?>>stories</option>
                          <option value="events" <?php if($row['post_category']=='events'){ echo "selected"; } ?>>events</option>
                        </select>
                    </div>

                    </div>
                    <div class="control-group">
                      <label class="control-label" for="fileInput">Featured Image<span class="required">*</span></label>
                      <div class="controls">
                      	<img src="../img/post/<?= $row["post_image"]; ?>"/ width="100px">
                        <input name="attach" class="input-file uniform_on" id="fileInput" type="file">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="textarea2">Content<span class="required">*</span></label>
                      <div class="controls">
                        <textarea name="content" class="input-xlarge textarea" placeholder="Enter content ..." style="width: 600px; height: 200px">
                        	<?= $row['post_content']; ?>
                        </textarea>
                      </div>
                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Edit Post</button>
                      <button type="button" class="btn" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue">Cancel</button>
                    </div>
                  </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>

