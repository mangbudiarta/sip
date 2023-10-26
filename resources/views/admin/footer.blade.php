@extends('admin.layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="row">
              <div class="col-xxl">
                <!-- Form Layout Start-->
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Footer</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div>
                          <label for="formFile" class="form-label">Gambar <span class=" text-muted">(png/jpg)</span></label>
                          <input type="file" class="form-control" type="file" id="formFile" name="gambar" onchange="handleFiles(event)"/>
                          <img id="imageView" class="my-2" alt="">
                      </div>    
                        <div class="mb-3">
                            <label class="col-form-label" for="deskripsi">Deskripsi</label>
                            <textarea
                            id="deskripsi"
                            class="form-control"
                            placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                            aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                            aria-describedby="basic-icon-default-message2"
                          ></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label" for="peta">Peta</label>
                            <input
                              type="text"
                              class="form-control"
                              id="peta"
                              placeholder="ex : https://maps.google.com/maps?q=candikuning&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            />
                      </div>                  
                        <div class="row justify-content-end">
                          <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                   <!-- Form Layout End-->
                    <!-- Table Layout Start -->
                    <div class="card mb-4">
                      <div class="card-datatable table-responsive p-3">
                        <table class="datatables table border-top">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Gambar</th>
                              <th>Deskripsi</th>
                              <th>Peta</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>gambar.jpg</td>
                              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, voluptatum!</td>
                              <td>https://maps.google.com/maps?q=candikuning&t=&z=13&ie=UTF8&iwloc=&output=embed</td>
                              <td>
                                <a href="/#footer" class="btn btn-info btn-sm"><i class="menu-icon tf-icons bx bx-show m-0"></i></a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Table Layout End -->
                </div>
              </div>
          </div>
    </div>
</div>
<script>
    function handleFiles(e) {
    const imageView = document.getElementById('imageView');
    const file = e.target.files[0];
    const blobURL = URL.createObjectURL(file);
    imageView.src = blobURL;
}
</script>
@endsection

