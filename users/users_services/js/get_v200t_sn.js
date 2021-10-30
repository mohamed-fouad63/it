function get_v200t_sn(o, m) {
  var select_v200t_terminal = document.getElementById(o);
  var v200t_sn = document.getElementById("v200t_sn" + m);
  var stuff_pos = document.getElementById("v200t_stuff_pos" + m);
  var option_200t_terminal =
    select_v200t_terminal.options[select_v200t_terminal.selectedIndex];
  if (select_v200t_terminal.value == "") {
    v200t_sn.innerText = "";
  } else {
    stuff_pos.innerText = "/" + option_200t_terminal.dataset.stuff_pos;
    v200t_sn.innerText = option_200t_terminal.value;
  }
}
