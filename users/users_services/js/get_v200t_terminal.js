function get_v200t_terminal(m) {
  var select_office_name_v200t = document.getElementById(
    "v200t_office_name" + m
  );
  var money_code_v200t = document.getElementById("v200t_money_code" + m);
  var option_office_name =
    select_office_name_v200t.options[select_office_name_v200t.selectedIndex];
  money_code_v200t.innerText = option_office_name.value;
  var office_name = option_office_name.text;
  $.ajax({
    url: "ajax/v200t_terminal.php",
    method: "POST",
    data: { office_name: office_name },
    success: function (data) {
      $("#v200t_terminal" + m).html(data);
      var v200t_terminal = "v200t_terminal" + m;
      get_v200t_sn(v200t_terminal, m);
    },
  });
}
