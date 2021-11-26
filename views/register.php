<form method="POST" action="/contact/create">
  <div class="mb-3">
    <label>first name</label>
    <input type="text" name="firstname" class="form-control">
  </div>
  <div class="mb-3">
    <label>last name</label>
    <input type="text" name="lastname" class="form-control">
  </div>
  <div class="mb-3">
    <label>email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="mb-3">
    <label>Password confirm</label>
    <input type="password" name="confirmed" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>