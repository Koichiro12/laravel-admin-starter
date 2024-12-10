<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        PE Engine Software
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Term & conditions </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            {{ date('Y') }}, made with <i class="fa fa-heart heart text-danger"></i> by
            <a href="#">PE Engine Software</a>
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('/') }}assets/js/core/jquery-3.7.1.min.js"></script>
<script src="{{ asset('/') }}assets/js/core/popper.min.js"></script>
<script src="{{ asset('/') }}assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('/') }}assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Datatables -->
<script src="{{ asset('/') }}assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('/') }}assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset('/') }}assets/js/plugin/sweetalert/sweetalert2.min.js"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('/') }}assets/js/kaiadmin.min.js"></script>

@yield('content-js')

<script>
    $('#dataTable').DataTable({
        postprocessing: true,
        serverside: true,
    });
    $('#dataTable1').DataTable({
        postprocessing: true,
        serverside: true,
    });
    $('.form-submit').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Anda tidak bisa mengubah atau membatalkan proses ini !",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            } else if (result.isDenied) {
                Swal.fire('Gagal', '', 'error')
            }
        });
    });
    $(document).on('click', '.a-confirm', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Apakah Anda yakin untuk melakukan proses ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.isConfirmed) {
                var base_url = $(this).attr('href');
                $.ajax({
                    url: base_url,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Proses telah dilakukan dengan Berhasil',
                            button: 'Ok'
                        }).then((confrimed) => {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Proses gagal dilakukan !',
                            button: 'Ok'
                        }).then((confrimed) => {
                            window.location.reload();
                        });
                    }
                });
            }
        })
    });
</script>
</body>

</html>
