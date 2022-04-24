<div class="col">
  <div class="row">
    <div class="col-md-6 offset-md-3 text-center">Update Data Barang</div>
  </div>
  <form name="dForm" action="{{ route('barang.update') }}" method="POST">
    @csrf
    <input type="hidden" class="form-control" id="id" name="id" @if(!empty($update)) value="{{$update->id}}" @else @endif readonly required onchange="validate()">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" @if(!empty($update)) value="{{$update->name}}"  @else readonly @endif required onchange="validate()">
    </div>
    <div class="form-group">
      <label for="id_type" class="form-label">Type</label>
      <select name="id_type" class="form-control" aria-label="Default select example" required @if(!empty($update))  @else readonly @endif onchange="validate()" required>
          <option disabled selected value="">Select Type</option>
          <option value="1" @if(!empty($update) && $update->id_type == "1") selected @endif>1</option>
          <option value="2" @if(!empty($update) && $update->id_type == "2") selected @endif>2</option>
      </select>
    </div>

    <div class="row justify-content-end p-2">
      <button type="submit" name="submit" class="btn btn-warning btn-sm" @if(!empty($update)) @else disabled @endif>Edit</button>
    </div>
  </form>
</div>

<script>
    function validate() {
        let form = document.dForm;
        let resultValidate =
            form.id.value != "" &&
            form.name.value != "" &&
            form.id_type.value != "" ;

        if (resultValidate)
            form.submit.disabled = false
        else
            form.submit.disabled = true
    }
</script>