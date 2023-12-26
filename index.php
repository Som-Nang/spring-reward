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
            <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-blue-400 cursor-pointer" @click="openMenu !== 0 ? openMenu = 0 : openMenu = 1">
              <i class="fas fa-align-left fa-sm text-white"></i>
            </li>
            <a href="dashboard.php" class="mb-3 p-2 rounded-md flex items-center justify-center bg-pink-400 cursor-pointer">
              <i class="fas fa-question-circle fa-sm text-white"></i>
            </a>

          </ul>
        </div>
        <!--End NavItem -->
      </div>
    </aside>

    <aside class="animate__animated animate__fadeInLeft w-52 relative z-0 flex-shrink-0  px-4 overflow-y-auto bg-gray-900 block " x-show="openMenu ==  0" style="display: none;">
      <div class="mb-6">
        <!--Start Sidebar for open menu -->
        <div class="py-8">
          <!-- Start Navitem -->
          <div class="w-full flex  relative">
            <!-- 
            <select id="winnerSelector" class="select select-info max-w-xs w-full ">
              <option selected disabled> Select Winners </option>
              <option> 1 </option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select> -->

            <select id="prizeSelect" class="select select-info w-full">
              <option disabled selected>Select Prize</option>
              <?php $sql = "SELECT tblprize.id AS prizeid, tblprize.prizeName,tblprize.prizePic FROM tblprize";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $row) {

              ?>
                  <option value="<?php echo $row->prizeid; ?>" data-img="<?php echo htmlentities($row->prizePic); ?>" data-name="<?php echo htmlentities($row->prizeName); ?>">
                    <?php echo htmlentities($row->prizeName); ?>
                  </option>
              <?php

                }
              }
              ?>


            </select>

            <!-- <button type="submit" name="submit" class="btn btn-active btn-success">Save</button> -->
          </div>
          <!-- End Navitem -->
        </div>
        <!--End Sidebar for open menu -->
      </div>
    </aside>


    <div class="flex flex-col flex-1 w-full overflow-y-auto">
      <!--Start Topbar -->
      <!--End Topbar -->
      <main class="relative z-0 flex-1 px-6 bg-gray-600">
        <div class="grid  mt-4">
          <!-- Start Content-->
          <div class="pt-4 flex justify-between ">
            <div class="prize w-2/5 m-2">
              <div class="card shadow-xl h-14 w-full flex justify-center items-center bg-red-500">
                <div class="py-2 flex flex-col justify-center items-center text-center ">
                  <p class="card-title" id="shuffleDisplay"> Starting !</p>
                </div>
              </div>

              <div class="card bg-base-100 shadow-xl mt-4 w-full">
                <figure class="px-10 pt-10">
                  <img id="prizeImage" src="./image/qs.jpg" alt="Select Items First!" class="rounded-xl object-fill w-full h-[300px]" />
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
            $sql = "SELECT tblprize.id as prizeid, tbluser.*
            FROM tbluser
            LEFT JOIN tblwinner ON tbluser.id = tblwinner.userId
            LEFT JOIN tblprize ON tblwinner.prizeid = tblprize.id
            WHERE tblwinner.userid IS NULL";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            // Convert participant details to a JavaScript array
            $participantsArray = json_encode($results);

            ?>
            <div class=" m-2 w-full flex flex-col">
              <div id="cardContainer" class="gap-2 w-full flex flex-wrap justify-center space-x-4  items-center">
                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="firstField"> ******</p>
                    <p class="card-title text-xl" id="firstIdField">****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="firstProfileField"> <img class="w-60 h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="firstBranch"> ******</p>
                    <p class="card-title text-xl" id="firstDept">****</p>
                  </div>
                </div>

                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="secondField"> ******</p>
                    <p class="card-title text-xl" id="secondIdField">****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="secondProfileField"><img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="secondBranch"> ******</p>
                    <p class="card-title text-xl" id="secondDept">****</p>
                  </div>
                </div>

                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="thirdField"> ******</p>
                    <p class="card-title text-xl" id="thirdIdField"> ****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="thirdProfileField"><img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="thirdBranch"> ******</p>
                    <p class="card-title text-xl" id="thirdDept">****</p>
                  </div>
                </div>

                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="fourthField"> ******</p>
                    <p class="card-title text-xl" id="fourthIdField"> ****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="fourthProfileField"><img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="fourthBranch"> ******</p>
                    <p class="card-title text-xl" id="fourthDept">****</p>
                  </div>
                </div>

                <div class="flex flex-col bg-[#414955] p-2 rounded-lg">
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="fifthField"> ******</p>
                    <p class="card-title text-xl" id="fifthIdField"> ****</p>
                  </div>
                  <div class="relative card w-60 h-60 bg-base-100 shadow-xl">
                    <span class="absolute" id="fifthProfileField"><img class="w-full h-60 rounded-xl" src="./image/qs.jpg" alt=""></span>
                  </div>
                  <div class="relative flex flex-col justify-center items-center text-center text-white">
                    <p class="card-title text-2xl" id="fifthBranch"> ******</p>
                    <p class="card-title text-xl" id="fifthDept">****</p>
                  </div>
                </div>

              </div>

            </div>
          </div>


      </main>
    </div>
  </div>


  <!-- Draw Winner -->
  <script>
    const shuffleDisplay = document.getElementById("shuffleDisplay");
    const btnTry = document.getElementById("btnTry");

    const firstField = document.getElementById("firstField");
    const firstIdField = document.getElementById("firstIdField");
    const firstProfileField = document.getElementById("firstProfileField");
    const firstDept = document.getElementById("firstDept");
    const firstBranch = document.getElementById("firstBranch");

    const secondField = document.getElementById("secondField");
    const secondProfileField = document.getElementById("secondProfileField");
    const secondIdField = document.getElementById("secondIdField");
    const secondDept = document.getElementById("secondDept");
    const secondBranch = document.getElementById("secondBranch");

    const thirdIdField = document.getElementById("thirdIdField");
    const thirdProfileField = document.getElementById("thirdProfileField");
    const thirdField = document.getElementById("thirdField");
    const thirdDept = document.getElementById("thirdDept");
    const thirdBranch = document.getElementById("thirdBranch");

    const fourthIdField = document.getElementById("fourthIdField");
    const fourthProfileField = document.getElementById("fourthProfileField");
    const fourthField = document.getElementById("fourthField");
    const fourthDept = document.getElementById("fourthDept");
    const fourthBranch = document.getElementById("fourthBranch");

    const fifthIdField = document.getElementById("fifthIdField");
    const fifthProfileField = document.getElementById("fifthProfileField");
    const fifthField = document.getElementById("fifthField");
    const fifthDept = document.getElementById("fifthDept");
    const fifthBranch = document.getElementById("fifthBranch");

    let participants = <?php echo $participantsArray; ?>;
    let currentWinnerState = "first";

    // [firstField, secondField, thirdField].forEach((field) => {
    //   field.style.display = "none";
    // });

    btnTry.addEventListener("click", async () => {
      if (participants.length && currentWinnerState) {
        // Display each randomly selected participant before settling on a winner
        for (let i = 0; i < participants.length; i++) {
          await sleep(100); // Add a delay for visibility
          const selectedParticipant = participants[i];
          console.log(`Selected Participant: ${selectedParticipant.name}`);
          shuffleDisplay.textContent = selectedParticipant.name;
        }

        const selectedIndex = Math.floor(Math.random() * participants.length);
        const selectedParticipant = participants.splice(selectedIndex, 1)[0];
        const winnerName = shuffleDisplay.textContent;
        const winnerDetails = fetchWinnerDetails(winnerName);
        // Display the final winner in the appropriate fields
        if (selectedParticipant && currentWinnerState === "first") {
          displayWinner(firstField, firstIdField, firstProfileField, firstBranch, firstDept, selectedParticipant, document.getElementById("prizeSelect"));
          currentWinnerState = "second";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));
          shuffleDisplay.textContent = "Stop";

        } else if (selectedParticipant && currentWinnerState === "second") {
          displayWinner(secondField, secondIdField, secondProfileField, secondBranch, secondDept, selectedParticipant);
          currentWinnerState = "third";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));
          shuffleDisplay.textContent = "Stop";

        } else if (selectedParticipant && currentWinnerState === "third") {
          displayWinner(thirdField, thirdIdField, thirdProfileField, thirdBranch, thirdDept, selectedParticipant);
          currentWinnerState = "fourth";
          shuffleDisplay.textContent = "Stop";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));

        } else if (selectedParticipant && currentWinnerState === "fourth") {
          displayWinner(fourthField, fourthIdField, fourthProfileField, fourthBranch, fourthDept, selectedParticipant);
          currentWinnerState = "fifth";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));
          shuffleDisplay.textContent = "Stop";

        } else if (selectedParticipant && currentWinnerState === "fifth") {
          displayWinner(fifthField, fifthIdField, fifthProfileField, fifthBranch, fifthDept, selectedParticipant);
          currentWinnerState = "";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));
          shuffleDisplay.textContent = "Stop";
        }

      }

    });

    function displayWinner(nameField, idField, profileField, branchField, deptField, winnerDetails, selectElement) {
      nameField.textContent = winnerDetails.name;
      idField.textContent = ` ${winnerDetails.staffID}`;
      branchField.textContent = `Branch: ${winnerDetails.branch}`;
      deptField.textContent = `Dept: ${winnerDetails.dept}`;

      // Check if winnerDetails has a profile image URL
      if (winnerDetails.profileImageUrl) {
        profileField.textContent = `Profile: not found`;
      } else {
        profileField.innerHTML = `<img class="w-60 h-60 rounded-xl" src="${winnerDetails.profile}" alt="Profile Image">`;
      }

      // Update winnerPrize based on the selected option
      if (selectElement && selectElement.options) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        if (selectedOption) {
          winnerDetails.prizeid = selectedOption.value;
          winnerDetails.prizeName = selectedOption.getAttribute('data-name');
          winnerDetails.prizePic = selectedOption.getAttribute('data-img');
        }
      }
      // console.log(" is: ", selectElement);

    }


    function fetchWinnerDetails(winnerName) {
      // Find the winner details in the participants array based on the name
      return participants.find(participant => participant.name === winnerName);
    }

    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }

    function fetchWinnerDetails(winnerName) {
      // Find the winner details in the participants array based on the name
      return participants.find(participant => participant.name === winnerName);
    }

    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }

    function insertWinnerData(winnerDetails, selectElement) {
      // Make an AJAX request to insert data into tblwinner
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "insert_winner.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
        }
      };

      const data = {
        winnerDetails: winnerDetails,
        selectedOption: {
          id: selectElement.value,
          name: selectElement.getAttribute('data-name'),
          pic: selectElement.getAttribute('data-img')
        }
      };

      xhr.send(JSON.stringify(data));
      console.log(winnerDetails)
    }
  </script>
  <!-- Draw Winner -->



</body>

</html>