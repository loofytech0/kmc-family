<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset("favicon.png") }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ mix("css/app.css") }}">
  <title>Kedaton Medical Center</title>
  <style>
    table tr td {
      padding-top: 10px;
    }
  </style>
</head>
<body>
  <div class="w-full h-screen bg-[#ADD6B1] flex justify-center items-center">
    <div class="p-3 max-w-[528px]">
      <div class="px-[29px] py-[45px] rounded-[30px] bg-[#ffffffbf]">
        <img src="{{ asset("img-dashboard.png") }}" class="w-full" alt="logo">
        <form method="POST" action="{{ route("login.post") }}" class="flex flex-col mt-[50px] gap-[20px]">
          <div class="text-center text-xl font-bold">LOGIN</div>
          @csrf
          <table class="w-full">
            <tr>
              <td class="text-lg font-semibold">Email</td>
              <td class="text-lg font-semibold px-3">:</td>
              <td class="w-full">
                <input type="text" name="email" autocomplete="off" class="border-0 w-full shadow">
              </td>
            </tr>
            <tr>
              <td class="text-lg font-semibold">Password</td>
              <td class="text-lg font-semibold px-3">:</td>
              <td class="w-full">
                <input type="password" name="password" autocomplete="off" class="border-0 w-full shadow">
              </td>
            </tr>
          </table>
          <div class="mt-[10px]">
            <button type="submit" class="bg-white text-center w-full text-lg font-bold h-[50px] shadow rounded-full">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ mix("js/app.js") }}"></script>
</body>
</html>