<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold">Tabel Daftar Volunteer</h5>
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Urut dari yang terbaru
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                                <li><a class="dropdown-item" href="#">Urut dari yang terbaru</a></li>
                                <li><a class="dropdown-item" href="#">Urut dari yang terlama</a></li>
                            </ul>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari tahun pendaftaran" aria-label="Search" aria-describedby="searchButton">
                            <button class="btn btn-primary" type="button" id="searchButton">Cari</button>
                        </div>
                    </div>
                </div>
              <div class="card">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">User ID</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">NIM</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Divisi</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No WA</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Link</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status Pendaftara</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Created At</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Update At</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($volunteers as $v)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $v->user_id }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $v->nim}}</h6>                         
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $v->devisi}}</h6>                         
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $v->no_wa }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 fs-4"><a href="https://www.stis.ac.id/">link cv</a></a></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $v->status_pendaftaran }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $v->created_at }}</h6>                         
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $v->updated_at }}</p>
                            </td>
                            <td class="border-bottom-0">
                              <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#editModal">
                                Edit
                              </button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                                Hapus
                              </button>
                            </td>
                        </tr>    
                      @endforeach                        
                      </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-success" href="{{route('volunteers.create')}}"><i class="fa fa-plus"></i> Tambah Volunteer</a>
            
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
</x-app-layout>