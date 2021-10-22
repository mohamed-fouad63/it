function insert_action_bitel(i) {
  var select_bitel_office_name_done = document.getElementById(
    "bitel_office_name" + i
  );
  var option_bitel_office_name_done =
    select_bitel_office_name_done.options[
      select_bitel_office_name_done.selectedIndex
    ];
  var bitel_office_name_done = option_bitel_office_name_done.text;
  var bitel_money_code_done = option_bitel_office_name_done.value;

  var select_bitel_terminal_done = document.getElementById(
    "bitel_terminal" + i
  );
  var option_bitel_terminal_done =
    select_bitel_terminal_done.options[
      select_bitel_terminal_done.selectedIndex
    ];
  var bitel_terminal_done = option_bitel_terminal_done.text;
  var bitel_sn_done = option_bitel_terminal_done.value;

  var select_bitel_auth_done = document.getElementById("bitel_auth" + i);
  var option_bitel_auth_done =
    select_bitel_auth_done.options[select_bitel_auth_done.selectedIndex];
  var bitel_auth_done = option_bitel_auth_done.text;

  var bitel_user_name_done = document.getElementById(
    "bitel_user_name" + i
  ).innerText;
  var bitel_user_id_done = document.getElementById(
    "bitel_user_id" + i
  ).innerText;

  var select_bitel_action_done = document.getElementById("bitel_action" + i);
  var option_bitel_action_done =
    select_bitel_action_done.options[select_bitel_action_done.selectedIndex];
  var bitel_action_done = option_bitel_action_done.text;

  alert(bitel_user_name_done);
  $.ajax({
    url: "users_action_insert/bitel_users_action_insert.php",
    type: "POST",
    data: {
      office_name: bitel_office_name_done,
      money_code: bitel_money_code_done,
      pos_terminal: bitel_terminal_done,
      sn: bitel_sn_done,
      auth: bitel_auth_done,
      names: bitel_user_name_done,
      id: bitel_user_id_done,
      action: bitel_action_done,
    },
    success: function (data) {
      $.ajax({
        url: "users_action/bitel_users_action.php",
        method: "POST",
        data: {},
        success: function (data) {
          $("#bitel_table_body").html(data);
        },
      });
    },
  });
}
