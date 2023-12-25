// Change dinamix prize
$(document).ready(function () {
  // Set the initial image source
  $("#prizeImage").attr("src", "");
  $("#prizeName").text("");

  // Handle change event of the select element
  $("#prizeSelect").change(function () {
    // Get the selected option
    var selectedOption = $(this).find(":selected");

    // Get the image source and prize name from the data attributes
    var imageSrc = selectedOption.data("img");
    var prizeName = selectedOption.data("name");

    // Update the image source and prize name
    $("#prizeImage").attr("src", imageSrc);
    $("#prizeName").text(prizeName);
  });
});
