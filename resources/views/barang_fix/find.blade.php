<div class="col">
  <div class="row">
    <div class="col-md-6 offset-md-3 text-center">Detail Data Barang</div>
  </div>
    <input type="hidden" class="form-control" id="id" name="id" placeholder="ID" @if(!empty($find)) value="{{$find->id}}" @endif required readonly>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" @if(!empty($find)) value="{{$find->name}}" @endif required readonly>
    </div>
    <div class="form-group">
      <label for="id_type">Type</label>
      <input type="select" class="form-control" id="id_type" name="id_type" placeholder="Type" @if(!empty($find)) value="{{$find->id_type}}" @endif required readonly>
    </div>
  <div class="row justify-content-end p-2">
    <a type="button" href="{{ route('barang.index') }}" class="btn btn-info btn-sm" @if(!empty($find)) @else style="pointer-events: none; display: inline-block;" @endif>Reset</a>
  </div>
</div>