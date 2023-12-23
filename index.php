<!DOCTYPE html>
<html data-theme="dracula">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/dist/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
  <div class="flex h-screen w-full bg-gray-800 " x-data="{openMenu:1}">
    <!--Start SideBar-->
    <aside class="w-20 relative z-20 flex-shrink-0  px-2 overflow-y-auto bg-indigo-600 sm:block">
      <div class="mb-6">
        <!--Start logo -->
        <a href="#" class="flex justify-center">
          <div class="w-14 h-14 rounded-full bg-gray-300 border-2 border-white mt-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVxhAxJ4D7MOeTTj6kR9PBeZonW5HM7giKjTbEmR-HMBwf3G1VqGnlwpO1kWrdyIZu8_U&usqp=CAU" class="rounded-full w-auto" />
          </div>
        </a>
        <!--End logo -->
        <!--Start NavItem -->
        <div>
          <ul class="mt-6 leading-10 px-4">
            <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-blue-400 cursor-pointer" @click="openMenu !== 1 ? openMenu = 1 : openMenu = null">
              <i class="fas fa-align-left fa-sm text-white"></i>
            </li>
            <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-pink-400 cursor-pointer">
              <i class="fas fa-question-circle fa-sm text-white"></i>
            </li>
            <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-yellow-400 cursor-pointer">
              <i class="fas fa-headphones fa-sm text-white"></i>
            </li>
            <li class="absolute bottom-0 mb-3 p-2 rounded-full flex items-center mx-auto bg-white cursor-pointer">
              <i class="fas fa-power-off fa-sm text-indigo-600"></i>
            </li>
          </ul>
        </div>
        <!--End NavItem -->
      </div>
    </aside>


    <div class="flex flex-col flex-1 w-full overflow-y-auto">
      <!--Start Topbar -->
      <!--End Topbar -->
      <main class="relative z-0 flex-1 pb-8 px-6 bg-gray-600">
        <div class="grid pb-10  mt-4">
          <!-- Start Content-->
          <div class="w-full flex space-x-2 justify-between relative">
            <select class="select select-info w-full ">
              <option disabled selected>Select Prize</option>
              <option>Power Bank</option>
              <option>Cup</option>
              <option>Phone</option>
            </select>
            <select class="select select-info max-w-xs w-full ">
              <option disabled selected>Select Winner</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <button class="btn btn-active btn-success">Save</button>
          </div>

          <div class="pt-4 flex">
            <div class="prize w-96 m-2">
              <div class="card w-96 bg-base-100 shadow-xl">
                <figure class="px-5 pt-10">
                  <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                  <h2 class="card-title ">Power Bank</h2>

                </div>
              </div>

              <div class="flex justify-center mt-4">
                <p class="btn bg-yellow-500 btn-accent w-full h-40 text-gray-900 font-bold text-4xl">START</p>
              </div>
            </div>
            <!-- Winner -->
            <div class=" m-2 w-full">
              <div class="w-full flex flex-wrap justify-center space-x-4 space-y-4 items-center">

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">

                  <img class="w-full h-full" src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />

                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title ">Name: John</p>
                    <p class="card-title ">ID: B20125</p>

                  </div>
                </div>

              </div>

            </div>
          </div>


        </div>
      </main>
    </div>
  </div>
</body>

</html>