RUN =====> npx tailwindcss -i main.css -o ./dist/output.css --watch OR


Second methosd::
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
          displayWinner(firstField, firstIdField, firstProfileField, selectedParticipant);
          currentWinnerState = "second";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));

        } else if (selectedParticipant && currentWinnerState === "second") {
          displayWinner(secondField, secondIdField, secondProfileField, selectedParticipant);
          currentWinnerState = "third";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));

        } else if (selectedParticipant && currentWinnerState === "third") {
          displayWinner(thirdField, thirdIdField, thirdProfileField, selectedParticipant);
          currentWinnerState = "";
          shuffleDisplay.textContent = "display";
          insertWinnerData(selectedParticipant, document.getElementById("prizeSelect"));
        }
      }
    });