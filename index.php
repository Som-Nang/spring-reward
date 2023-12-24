<?php

include('dbconnect.php');

?>

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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="./main.js"></script>
</head>

<body>
  <div class="flex h-screen w-full bg-gray-800 " x-data="{openMenu:1}">
    <!--Start SideBar-->
    <aside class="w-20 relative z-20 flex-shrink-0  px-2 overflow-y-auto bg-indigo-600 sm:block">
      <div class="mb-6">
        <!--Start logo -->
        <a href="dashboard.php" class="flex justify-center">
          <div class="w-14 h-14 rounded-full bg-gray-300 border-2 border-white mt-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVxhAxJ4D7MOeTTj6kR9PBeZonW5HM7giKjTbEmR-HMBwf3G1VqGnlwpO1kWrdyIZu8_U&usqp=CAU" class="rounded-full w-auto" />
          </div>
        </a>
        <!--End logo -->
        <!--Start NavItem -->
        <div>
          <ul class="mt-6 leading-10 px-4">
            <a href="#" class="mb-3 p-2 rounded-md flex items-center justify-center bg-blue-400 cursor-pointer" @click="openMenu !== 1 ? openMenu = 1 : openMenu = null">
              <i class="fas fa-align-left fa-sm text-white"></i>
            </a>
            <a href="dashboard.php" class="mb-3 p-2 rounded-md flex items-center justify-center bg-pink-400 cursor-pointer">
              <i class="fas fa-question-circle fa-sm text-white"></i>
            </a>

          </ul>
        </div>
        <!--End NavItem -->
      </div>
    </aside>


    <div class="flex flex-col flex-1 w-full overflow-y-auto">
      <!--Start Topbar -->
      <!--End Topbar -->
      <main class="relative z-0 flex-1 px-6 bg-gray-600">
        <div class="grid  mt-4">
          <!-- Start Content-->

          <div class="w-full flex space-x-2 justify-between relative">


            <select id="winnerSelector" class="select select-info max-w-xs w-full ">
              <option selected disabled> Select Winners </option>
              <option> 1 </option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>

            <select id="prizeSelect" class="select select-info w-full ">
              <option disabled selected>Select Prize</option>
              <?php $sql = "SELECT tblprize.id ,tblprize.prizeName,tblprize.prizePic FROM tblprize";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $row) {

              ?>
                  <option value="<?php echo $row->id; ?>" data-img="<?php echo htmlentities($row->prizePic); ?>" data-name="<?php echo htmlentities($row->prizeName); ?>">
                    <?php echo htmlentities($row->prizeName); ?>
                  </option>
              <?php

                }
              }
              ?>


            </select>

            <button class="btn btn-active btn-success">Save</button>
          </div>

          <div class="pt-4 flex">
            <div class="prize w-96 m-2">
              <div class="card shadow-xl h-14 w-full flex justify-center items-center bg-red-500">
                <div class="py-2 flex flex-col justify-center items-center text-center ">
                  <p class="card-title" id="shuffleDisplay"> Name Generate</p>
                </div>
              </div>

              <div class="card w-96 bg-base-100 shadow-xl mt-4 ">
                <figure class="px-2 pt-10 object-fill">
                  <img id="prizeImage" src="./image/qs.jpg" alt="Select Items First!" class="rounded-xl object-fit h-60 w-60" />
                </figure>
                <div class="card-body items-center text-center">
                  <p id="prizeName" class="card-title"></p>

                </div>
              </div>

              <div class="flex justify-center mt-4">
                <button id="btnTry" class="btn bg-yellow-500 btn-accent w-full h-28 text-gray-900 font-bold text-4xl">START</button>
              </div>
            </div>
            <!-- Winner -->

            <?php
            $sql = "SELECT *
            FROM tbluser
            LEFT JOIN tblwinner ON tbluser.id = tblwinner.userid
            WHERE tblwinner.userid IS NULL"; // Adjust the query based on your table structure
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            // Convert participant details to a JavaScript array
            $participantsArray = json_encode($results);

            ?>
            <div class=" m-2 w-full flex flex-col">



              <div id="cardContainer" class="w-full flex flex-wrap justify-center space-x-4 space-y-4 items-center">
                <div class="card w-60 h-60 bg-base-100 shadow-xl">
                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <h1 class="card-title " id="firstField"> </h1>
                    <p class="card-title border border-blue-950" id="firstIdField">****</p>
                  </div>
                  <span id="firstProfileField"> <img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>

                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">
                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p id="secondField"></p>
                    <p id="secondIdField"></p>
                  </div>
                  <span id="secondProfileField" />

                </div>

                <div class="card w-60 h-60 bg-base-100 shadow-xl">
                  <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p id="thirdField"></p>
                    <p id="thirdIdField"></p>

                  </div>
                  <span id="thirdProfileField" />


                </div>

              </div>

            </div>

          </div>
        </div>

    </div>
    </main>
  </div>
  </div>



  <script>
    // Handle change event of the select element
    document.getElementById('winnerSelector');

    // Trigger change event to generate the initial card
    document.getElementById('winnerSelector').dispatchEvent(new Event('change'));

    // Handle change event of the select element
    document.getElementById('winnerSelector').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = parseInt(this.value);

      // Clear existing cards
      document.getElementById('cardContainer').innerHTML = '';

      // Generate cards based on the selected value
      for (var i = 1; i <= selectedValue; i++) {
        var cardDiv = document.createElement('div');
        cardDiv.className = 'card w-60 h-60 bg-base-100 shadow-xl';
        cardDiv.innerHTML = `
                <img id="firstProfileField" class="w-full h-full" src="" alt="Shoes" class="rounded-xl" />
                <div class="py-2 flex flex-col justify-center items-center text-center">
                    <p class="card-title" id="firstIdField" ></p>
                    <p class="card-title" id="firstProfileField"></p>
                </div>
            `;

        // Append the card to the container
        document.getElementById('cardContainer').appendChild(cardDiv);
      }
    });


    const shuffleDisplay = document.getElementById("shuffleDisplay");
    const btnTry = document.getElementById("btnTry");
    const firstField = document.getElementById("firstField");
    const secondField = document.getElementById("secondField");
    const thirdField = document.getElementById("thirdField");
    const firstIdField = document.getElementById("firstIdField");
    const secondIdField = document.getElementById("secondIdField");
    const thirdIdField = document.getElementById("thirdIdField");
    const firstProfileField = document.getElementById("firstProfileField");
    const secondProfileField = document.getElementById("secondProfileField");
    const thirdProfileField = document.getElementById("thirdProfileField");

    let participants = <?php echo $participantsArray; ?>;
    let currentWinnerState = "first";

    [firstField, secondField, thirdField].forEach((field) => {
      field.style.display = "none";
    });

    btnTry.addEventListener("click", async () => {
      if (participants.length && currentWinnerState) {
        participants.sort(() => Math.floor(Math.random() - 0.5));

        for (let i = 0; i < participants.length; i++) {
          await sleep(50); // Add a delay for visibility
          const selectedParticipant = participants[i];
          console.log(`Selected Participant: ${selectedParticipant.name}`);
          shuffleDisplay.textContent = selectedParticipant.name;
        }

        participants.splice(0, 1);

        // Fetch winner details directly from the participants array
        const winnerName = shuffleDisplay.textContent;
        const winnerDetails = fetchWinnerDetails(winnerName);

        // Display the winner in the appropriate fields
        if (winnerDetails && currentWinnerState === "first") {
          displayWinner(firstField, firstIdField, firstProfileField, winnerDetails);
          currentWinnerState = "second";
        } else if (winnerDetails && currentWinnerState === "second") {
          displayWinner(secondField, secondIdField, secondProfileField, winnerDetails);
          currentWinnerState = "third";
        } else if (winnerDetails && currentWinnerState === "third") {
          displayWinner(thirdField, thirdIdField, thirdProfileField, winnerDetails);
          currentWinnerState = "";
          shuffleDisplay.textContent = "display";
        }
      }
    });

    function displayWinner(nameField, idField, profileField, winnerDetails) {
      nameField.style.display = "";
      nameField.textContent = shuffleDisplay.textContent;
      idField.textContent = `ID: ${winnerDetails.id}`;
      if (winnerDetails.profileImageUrl) {
        // Use innerHTML to include the <img> tag
        profileField.textContent = `Profile: ${winnerDetails.profile}`;
      } else {
        profileField.innerHTML = `<img class="w-full h-60 rounded-xl" src="${winnerDetails.profile}" alt="Profile Image">`;
      }

      console.log("Profile Image URL:", winnerDetails.profile);
    }


    // function displayWinner(nameField, idField, profileField, winnerDetails) {
    //   nameField.style.display = "";
    //   nameField.textContent = shuffleDisplay.textContent;
    //   idField.textContent = `ID: ${winnerDetails.id}`;
    //   if (winnerDetails.profileImageUrl) {
    //     // Use innerHTML to include the <img> tag
    //     profileField.textContent = `Profile: ${winnerDetails.profile}`;
    //   } else {
    //     profileField.innerHTML = `<img class="w-60 h-40 rounded-xl" src="${winnerDetails.profile}" alt="Profile Image">`;
    //   }
    // }

    function fetchWinnerDetails(winnerName) {
      // Find the winner details in the participants array based on the name
      return participants.find(participant => participant.name === winnerName);
    }

    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }
  </script>

</body>

</html>