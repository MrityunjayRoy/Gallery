<?php $this->view("header", $data)?>

<div style ="margin: auto; max-width: 60vw; padding: 10px" >   
    <form method = "post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Image Title">
            <div id="emailHelp" class="form-text">Choose a suitable name for the Image.</div>
        </div>
        <div class="mb-3">
            <input type="file" name="file" class="btn" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<?php $this->view("footer", $data)?>