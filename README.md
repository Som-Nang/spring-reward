RUN =====> npx tailwindcss -i main.css -o ./dist/output.css --watch OR

# npm install tailwindcss --save-dev && npm run dev
<div id="cardContainer" class="gap-2 w-full flex flex-wrap justify-center space-x-4  items-center">
                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="firstField"> ******</p>
                    <p class="card-title text-xl" id="firstIdField">****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="firstProfileField"> <img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                </div>