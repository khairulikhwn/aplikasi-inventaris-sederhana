      <div class="modal fade" id="modal-logout">
          <div class="modal-dialog">
              <form action="/logout" method="POST">
                  @csrf
                  @method('POST')
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi Logout</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Apakah Anda Yakin Keluar Aplikasi Ini</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-outline-danger">Ya</button>
                      </div>
                  </div>
              </form>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
