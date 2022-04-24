<div class="col">
  <div class="row">
    <div class="col-md-6 offset-md-3 text-center">Add Data Product</div>
  </div>
  <form action="{{ route('product.create') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
      <label for="id_type" class="form-label">Type</label>
      <select name="id_type" class="form-control" aria-label="Default select example" required>
          <option disabled selected value="">Select Id Type</option>
          <option value="1">1</option>
          <option value="2">2</option>
      </select>
    </div>
    <div class="row justify-content-end p-2">
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>
</div>