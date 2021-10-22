function insert_action_v200t(i) {
  var select_v200t_office_name_done = document.getElementById(
    "v200t_office_name" + i
  );
  var option_v200t_office_name_done =
    select_v200t_office_name_done.options[
      select_v200t_office_name_done.selectedIndex
    ];
  var v200t_office_name_done = option_v200t_office_name_done.text;
  var v200t_money_code_done = option_v200t_office_name_done.value;

  var select_v200t_terminal_done = document.getElementById(
    "v200t_terminal" + i
  );
  var option_v200t_terminal_done =
    select_v200t_terminal_done.options[
      select_v200t_terminal_done.selectedIndex
    ];
  var v200t_terminal_done = option_v200t_terminal_done.text;
  var v200t_sn_done = option_v200t_terminal_done.value;

  var select_v200t_auth_done = document.getElementById("v200t_auth" + i);
  var option_v200t_auth_done =
    select_v200t_auth_done.options[select_v200t_auth_done.selectedIndex];
  var v200t_auth_done = option_v200t_auth_done.text;

  var v200t_user_name_done = document.getElementById(
    "v200t_user_name" + i
  ).innerText;
  var v200t_user_id_done = document.getElementById(
    "v200t_user_id" + i
  ).innerText;

  var select_v200t_action_done = document.getElementById("v200t_action" + i);
  var option_v200t_action_done =
    select_v200t_action_done.options[select_v200t_action_done.selectedIndex];
  var v200t_action_done = option_v200t_action_done.text;
  $.ajax({
    url: "users_action_insert/v200t_users_action_insert.php",
    type: "POST",
    data: {
      office_name: v200t_office_name_done,
      money_code: v200t_money_code_done,
      pos_terminal: v200t_terminal_done,
      sn: v200t_sn_done,
      auth: v200t_auth_done,
      names: v200t_user_name_done,
      id: v200t_user_id_done,
      action: v200t_action_done,
    },
    success: function (data) {
      $.ajax({
        url: "users_action/v200t_users_action.php",
        method: "POST",
        data: {},
        success: function (data) {
          $("#v200t_table_body").html(data);
        },
      });
    },
  });
}
