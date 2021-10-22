function get_bitel_terminal(m) {
  var select_office_name_bitel = document.getElementById(
    "bitel_office_name" + m
  );
  var money_code_bitel = document.getElementById("bitel_money_code" + m);
  var option_office_name =
    select_office_name_bitel.options[select_office_name_bitel.selectedIndex];
  money_code_bitel.innerText = option_office_name.value;
  var office_name = option_office_name.text;
  $.ajax({
    url: "ajax/bitel_terminal.php",
    method: "POST",
    data: { office_name: office_name },
    success: function (data) {
      $("#bitel_terminal" + m).html(data);
      var bitel_terminal = "bitel_terminal" + m;
      get_bitel_sn(bitel_terminal, m);
    },
  });
}
