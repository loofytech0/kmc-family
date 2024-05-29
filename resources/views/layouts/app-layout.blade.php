<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link rel="shortcut icon" href="{{ asset("favicon.png") }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ mix("css/app.css") }}">
  <link rel="stylesheet" href="{{ asset("css/dashboard.css") }}">
  @stack("css")
  <title>Kedaton Medical Center</title>
</head>
<body>
  <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
          </button>
          <a href="{{ route("dashboard") }}" class="flex ms-2 md:me-24">
            <img src="{{ asset("favicon.png") }}" class="h-8 me-3" alt="" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Kedaton Medical</span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm rounded-full" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset("user.png") }}" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600 min-w-[200px]" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  {{ Auth::user()->name }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  {{ Auth::user()->email }}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="{{ route("logout") }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium sidebar">
        <li class="@yield("dashboard")">
          <a href="{{ route("dashboard") }}" class="flex items-center p-2 text-gray-900 group">
            <span class="ps-3">Dashboard</span>
          </a>
        </li>
        <li class="">
          <button
            type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 group"
            aria-controls="rmk"
            data-collapse-toggle="rmk"
            @hasSection("patient")
              aria-expanded="true"
            @else
            @hasSection("inspection")
              aria-expanded="true"
            @else
              aria-expanded="false"
            @endif
              aria-expanded="false"
            @endif
          >
            <span class="ps-3 flex-1 text-left rtl:text-right whitespace-nowrap">Rekam Medis Keluarga</span>
            <span class="pe-3">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </span>
          </button>
          <ul
            id="rmk"
            @hasSection("patient")
              class="py-2 space-y-2"
            @else
            @hasSection("inspection")
              class="py-2 space-y-2"
            @else
              class="py-2 space-y-2 hidden"
            @endif
              class="py-2 space-y-2 hidden"
            @endif
          >
            <li class="@yield("patient")">
              <a href="{{ route("patient") }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-7 group ps-9 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Daftar Pasien</a>
            </li>
            <li class="@yield("inspection")">
              <a href="{{ route("inspection") }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-7 group ps-9 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pemeriksaan Pasien</a>
            </li>
          </ul>
        </li>
        <li class="@yield("report")">
          <a href="{{ route("report") }}" class="flex items-center p-2 text-gray-900 group">
            <span class="ps-3">Laporan Rekam Medis Keluarga</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <div class="@hasSection("dashboard") bg-transparent @else bg-[#ADD6B1] @endif p-4 min-h-screen sm:ml-64">
    <div class="p-4 my-20">
      @yield("content")
    </div>
  </div>
  <script src="{{ mix("js/app.js") }}"></script>
  <script src="{{ asset("js/datepicker.min.js") }}"></script>
  @stack("js")
</body>
</html>