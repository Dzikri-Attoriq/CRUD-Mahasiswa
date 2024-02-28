<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
  <style>
    .swal2-popup {
        font-size: 1rem !important;
    }
  </style>
  @vite('resources/css/app.css')
</head>
<body>
  

<nav class=" bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
          </div>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="
          @if(Request()->segment(1) == '')
              block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500
          @else
              block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
          @endif
          ">Home</a>
        </li>
        <li>
          <a href="/jurusan" class="
          @if(Request()->segment(1) == 'jurusan')
              block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500
          @else
              block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
          @endif
          ">Jurusan</a>
        </li>
        <li>
          <a href="/mahasiswa" class="
          @if(Request()->segment(1) == 'mahasiswa')
              block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500
          @else
              block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
          @endif
          ">Mahasiswa</a>
        </li>
        <li>
      </ul>
    </div>
    </div>
  </nav>
    
@yield('content')

<script src="/sweetalert2/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@if (session()->has('success'))
<script>
        let message = '{{ session('success') }}';
        Swal.fire({
            icon: 'success',
            title: 'Succes!',
            text: message,
        })
    </script>
@endif
@if (session()->has('gagal'))
    <script>
        let message = '{{ session('gagal') }}';
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: message,
        })
    </script>
@endif
@if (session()->has('relasi'))
    <script>
        let message = '{{ session('relasi') }}';
        Swal.fire({
            icon: 'info',
            title: 'Informasi!',
            text: message,
        })
    </script>
@endif

<script>
    $(function() {
        $(document).on('click', '#btn-delete', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var action = form.attr('action');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    $(function() {
        $(document).on('click', '#logout', function(e) {
            e.preventDefault();
            var logoutUrl = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari akun.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = logoutUrl;
                }
            });
        });
    });
</script>
  @vite('resources/js/app.js')
</body>
</html>