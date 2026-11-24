{{-- Start JS --}}


    <!-- Core -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>


    <!-- Volt JS -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function lihatFoto(url, nama) {
            Swal.fire({
                title: nama,
                imageUrl: url,
                imageAlt: 'Foto profil ' + nama,
                imageWidth: 350,
                imageHeight: 350,
                imageClass: 'foto-profil-preview',
                showCloseButton: true,
                showConfirmButton: false,
                background: '#ffffff',
                customClass: {
                    popup: 'swal-foto-profil'
                }
            });
        }
    </script>


    {{-- End JS --}}
