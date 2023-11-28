function calculateBill() {
  const units = $("#units").val();
  const customerType = $("#type").val();

  $.ajax({
    type: "POST",
    url: "calculate.php",
    data: { units: units, type: customerType },
    success: function (response) {
      $("#result").html(response);
    },
  });
}
