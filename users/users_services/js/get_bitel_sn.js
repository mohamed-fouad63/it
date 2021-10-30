function get_bitel_sn(o, m) {
  var select_bitel_terminal = document.getElementById(o);
  var bitel_sn = document.getElementById("bitel_sn" + m);
  var bitel_stuff_pos = document.getElementById("bitel_stuff_pos" + m);
  var option_bitel_terminal =
    select_bitel_terminal.options[select_bitel_terminal.selectedIndex];
  if (select_bitel_terminal.value == "") {
    bitel_sn.innerText = "";
  } else {
    bitel_stuff_pos.innerText = "/" + option_bitel_terminal.dataset.stuff_pos;
    bitel_sn.innerText = option_bitel_terminal.value;
  }
}
