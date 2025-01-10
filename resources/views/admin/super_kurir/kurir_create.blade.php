@extends('layouts.admin')

@section('content')
  <div class="sa4d25">
    <div class="container">
      <div class="row mb-0">
        <div class="col-12">
          <h2 class="st_title"><i class="uil uil-analysis"></i>Form Tambah Kurir</h2>
        </div>
      </div>
      <div class="row mt-0">
        <div class="col-12">
          <div class="course_tabs_1">
            <div class="step-app">
              <form action="" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="step-content">
                  <div class="step-tab-panel step-tab-info active">
                    <div class="tab-from-content">
                      <div class="title-icon">
                        <h3 class="title"><i class="uil uil-info-circle"></i>Tambah Kurir</h3>
                      </div>
                      <div class="course__form">
                        <div class="general_info10">
                          <div class="row">
                            <div class="col-lg-6 col-md-12">
                              <div class="col-lg-12 col-md-12">
                                <div class="ui search focus mt-30 lbel25">
                                  <label>Nama Kurir*</label>
                                  <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore" type="text" placeholder="Course title here"
                                      name="nama_kurir" data-purpose="edit-course-title" maxlength="60" id="main[title]"
                                      value="">
                                    <div class="badge_num">60</div>
                                  </div>
                                  <div class="help-block">(Please make this a maximum of
                                    100
                                    characters and unique.)</div>
                                </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                <div class="ui search focus mt-30 lbel25">
                                  <label>Nomer Telepon*</label>
                                  <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore" type="text" placeholder="Course title here"
                                      name="nomer_telepon" data-purpose="edit-course-title" maxlength="60"
                                      id="main[title]" value="">
                                    <div class="badge_num">60</div>
                                  </div>
                                  <div class="help-block">(Please make this a maximum of
                                    100
                                    characters and unique.)</div>
                                </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                <div class="ui search focus mt-30 lbel25">
                                  <label>Email*</label>
                                  <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore" type="text" placeholder="Course title here"
                                      name="email" data-purpose="edit-course-title" maxlength="60" id="main[title]"
                                      value="">
                                    <div class="badge_num">60</div>
                                  </div>
                                  <div class="help-block">(Please make this a maximum of
                                    100
                                    characters and unique.)</div>
                                </div>
                              </div>


                            </div>
                            <div class="col-lg-6 col-md-12">
                              <div class="col-lg-10 col-md-12 mb-2">
                                <div class="ui search focus lbel25 mt-15">
                                  <label class="label25 text-left">Profile Kurir
                                    <small>*</small></label>
                                  <div class="thumb-item">
                                    <!-- Gambar default -->
                                    <img id="thumbnail-preview" src="{{ asset('') }}assets/images/thumbnail-demo.jpg"
                                      alt="Thumbnail Produk" style="width: 100%; height: auto;">
                                    <div class="thumb-dt">
                                      <div class="upload-btn">
                                        <!-- Input file -->
                                        <input class="uploadBtn-main-input" type="file" id="ThumbFile__input--source"
                                          name="thumbnail" accept="image/*">
                                        <label for="ThumbFile__input--source" title="Zip">Choose
                                          Thumbnail</label>
                                      </div>
                                      <span class="uploadBtn-main-file">Size: 590x300
                                        pixels. Supports: jpg,
                                        jpeg, or png</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                </div>
                <div class="step-footer step-tab-pager mt-4 text-end">
                  <a href="/{{ auth()->user()->role . '/dashboard' }}" class="btn btn-default pt-2">Cancel</a>

                  <button class="create_btn_dash" type="submit">Submit for Review</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('ThumbFile__input--source').addEventListener('change', function(event) {
      // Ambil file yang dipilih
      var file = event.target.files[0];

      // Pastikan file ada dan merupakan gambar
      if (file && file.type.startsWith('image/')) {
        var reader = new FileReader();

        // Ketika file telah dibaca, tampilkan hasilnya di <img>
        reader.onload = function(e) {
          document.getElementById('thumbnail-preview').src = e.target.result;
        };

        // Baca file sebagai URL data
        reader.readAsDataURL(file);
      }
    });
  </script>
@endsection
