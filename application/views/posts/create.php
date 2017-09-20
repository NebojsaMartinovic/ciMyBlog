<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control"  placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control" id="editor1" placeholder="Add Body" rows="10"></textarea>
  </div>
  <div class="form-group">
  <label>Category</label>
  	<select name="category_id" class="form-control">
  		<?php foreach($categories as $category): ?>
			<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
  		<?php endforeach; ?>
  	</select>
  </div>
  <div class="form-group">
  <label>Upload Image</label>
  	<input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-default btn-sm">Submit</button>
</form>