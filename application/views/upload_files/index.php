    <div class="row">
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
        <form enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label>Choose Files</label>
                <input type="file" class="form-control" name="userFiles[]" multiple/>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit" name="fileSubmit" value="UPLOAD"/>
            </div>
        </form>
    </div>
    
    <div class="row">
    <?php if(!empty($files)): foreach($files as $file): ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
                <a href="<?php echo base_url('uploads/files/'.$file['file_name']) ?>">
                    <img src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" alt="" >
                <p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p>
                </a>
                <?php if($this->session->userdata('logged_in')): ?>
                <?php echo form_open('/upload_files/delete/'.$file['id']); ?>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            <?php else: ?>
            <?php endif; ?>
            </div>
        </div>
        <?php endforeach; else: ?>
            <p>Image(s) not found.....</p>
        <?php endif; ?>
    </div>
    
