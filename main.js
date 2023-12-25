$(document).ready(function () {
  // Set the initial image source
  $("#prizeImage").attr("src", "");
  $("#prizeName").text("");

  // Handle change event of the select element
  $("#prizeSelect").change(function () {
    // Get the selected option
    var selectedOption = $("#prizeSelect option:selected");

    // Get the image source and prize name from the data attributes
    var imageSrc = selectedOption.data("img");
    var prizeName = selectedOption.data("name");

    // Update the image source and prize name
    $("#prizeImage").attr("src", imageSrc);
    $("#prizeName").text(prizeName);
  });
});

function filterTable() {
  // Get the input element and filter value
  var input = document.getElementById("searchInput");
  var filter = input.value.toLowerCase();

  // Get the table and rows
  var table = document.querySelector(".student-data-table");
  var rows = table.getElementsByTagName("tr");

  // Initialize a flag for not found
  var notFound = true;

  // Initialize a variable to count the results
  var resultCount = 0;

  // Loop through all table rows and hide those that don't match the search query
  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var visible = false;

    // Loop through the cells in the current row
    for (var j = 0; j < cells.length; j++) {
      var cell = cells[j];
      if (cell) {
        var text = cell.textContent || cell.innerText;
        if (text.toLowerCase().indexOf(filter) > -1) {
          visible = true;
          notFound = false; // At least one match was found
          break;
        }
      }
    }

    // Toggle row visibility
    rows[i].style.display = visible ? "" : "none";

    // Increment the result count
    if (visible) {
      resultCount++;
    }
  }

  // Display the "Not Found" message and the result count
  var notFoundMessage = document.getElementById("notFound");
  notFoundMessage.style.display = notFound ? "block" : "none";

  var resultCountElement = document.getElementById("resultCount");
  resultCountElement.textContent = `Results Found: ${resultCount}`;
}

// Add an event listener to the search input
var searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", filterTable);
