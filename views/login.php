<form method="POST" action="/contact/create" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="avatar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>