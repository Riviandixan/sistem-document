<div class="modal fade" id="remark-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Remark Document</h3>
                <button type="button" class="close btn" data-bs-dimis="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>    
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form" id="remarkForm">
                    @csrf
                    @method('put')
                    <input type="hidden" name="" id="doc-id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaNasabah">Nama Nasabah</label>
                            <input type="email" name="nama_nasabah" class="form-control" id="namaNasabah" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Remark</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="mark" id="approveRadio" value="approve" checked>
                            <label for="approveRadio" class="form-check-label">
                                Approve
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="mark" id="rejectRadio" value="reject">
                            <label for="rejectRadio" class="form-check-label">
                                Reject
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" id="save-button" onclick="remark()" class="btn btn-primary btn-lg">Remark</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
      function remark() {
        var id = $("input#doc-id").val()
        var mark = $("input[name=mark]:checked").val()
        var nasabah = $("input[name=nama_nasabah]").val()
        var url = `/document/${id}/remark`
        if (nasabah == '') {
          console.log('Nama Nasabah Cannot be Null!')
        }
       try {
        $.ajax({
            url: url,
            data: {
                _token: "{{ csrf_token() }}",
                mark, nasabah
            },
            type: "PUT",
            success: (response) => {
                resolve(response.responseJSON)
            },
            error: (error) => {
                console.log(error.responseJSON)
            }
        })
        console.log("Remarking Document Successfully")
        setInterval(() => {
          location.reload()
        }, 3000);
       } catch (error) {
         console.log(error)
       }
      }
    </script>
@endpush