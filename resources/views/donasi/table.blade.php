<div>
<table class="table text-nowrap mb-0 align-middle">
    <thead class="text-dark fs-4">
      <tr>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Tanggal & Waktu</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Nama Donatur</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Metode Pembayaran</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Bukti Pembayaran</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Jumlah Donasi</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Status</h6>
        </th>
        <th class="border-bottom-0">
          <h6 class="fw-semibold mb-0">Action</h6>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($donations as $donation)
        <td class="border-bottom-0">
          <h6 class="fw-semibold mb-0">{{ $donation->created_at->format('H:i:s | j F Y') }}</h6>
      </td>
        <td class="border-bottom-0">
            <h6 class="fw-semibold mb-1">{{ $donation->nama }}</h6>                         
        </td>
        <td class="border-bottom-0">
          <p class="mb-0 fw-normal">{{ $donation->metode }}</p>
        </td>
      </td>
      <td class="border-bottom-0">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal{{$donation->id}}">
              View Image
          </button>
          <div class="modal fade" id="imageModal{{$donation->id}}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{$donation->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="imageModalLabel{{$donation->id}}">Donation Image</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <img src="{{ asset($donation->link) }}" alt="Donation Image" style="max-width: 100%;">
                      </div>
                  </div>
              </div>
          </div>
      </td>
      <td class="border-bottom-0">
        <p class="mb-0 fw-normal">{{ $donation->nominal }}</p>
      </td>
      <td class="border-bottom-0">
          <p class="mb-0 fw-normal">{{ $donation->status }}</p>
      </td>
      <td class="border-bottom-0">
          <form action="{{ route('donations.updateStatus', $donation->id) }}" method="POST">
              @csrf
              @method('PUT')   
              <div class="btn-group mr-2" role="group" aria-label="Update Donation Status">
                  @if ($donation->status === 'belum dikonfirmasi')
                      <button type="submit" name="new_status" value="disetujui" class="btn btn-success mr-2">
                          Setujui
                      </button>
                      <button type="submit" name="new_status" value="ditolak" class="btn btn-danger">
                          Tolak
                      </button>
                  @elseif ($donation->status === 'disetujui')
                      <button type="submit" name="new_status" value="ditolak" class="btn btn-danger">
                          Tolak
                      </button>
                  @elseif ($donation->status === 'ditolak')
                      <button type="submit" name="new_status" value="disetujui" class="btn btn-success">
                          Setujui
                      </button>
                  @endif
              </div>
          </form>
      </td>                                                          
      </td>
      </tr>
      @endforeach                      
    </tbody>
  </table>
</div>