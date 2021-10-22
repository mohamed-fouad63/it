$(document).on("click", "#hewalat_action_insert", function () {
  var select_hewalat_office_name_done = document.getElementById(
    "hewalat_office_name"
  );
  var option_hewalat_office_name_done =
    select_hewalat_office_name_done.options[
      select_hewalat_office_name_done.selectedIndex
    ];
  var hewalat_office_name_done = option_hewalat_office_name_done.text;
  var hewalat_money_code_done = option_hewalat_office_name_done.value;

  var select_hewalat_auth_done = document.getElementById("hewalat_auth");
  var option_hewalat_auth_done =
    select_hewalat_auth_done.options[select_hewalat_auth_done.selectedIndex];
  var hewalat_auth_done = option_hewalat_auth_done.text;

  var hewalat_user_name_done =
    document.getElementById("hewalat_user_name").innerText;
  var hewalat_user_id_done =
    document.getElementById("hewalat_user_id").innerText;
  var hewalat_user_code_done =
    document.getElementById("hewalat_user_code").innerText;

  var select_hewalat_action_done = document.getElementById("hewalat_action");
  var option_hewalat_action_done =
    select_hewalat_action_done.options[
      select_hewalat_action_done.selectedIndex
    ];
  var hewalat_action_done = option_hewalat_action_done.text;
  $.ajax({
    url: "users_action_insert/hewalat_users_action_insert.php",
    type: "POST",
    data: {
      office_name: hewalat_office_name_done,
      money_code: hewalat_money_code_done,
      auth: hewalat_auth_done,
      names: hewalat_user_name_done,
      id: hewalat_user_id_done,
      code: hewalat_user_code_done,
      action: hewalat_action_done,
    },
    success: function (data) {
      $.ajax({
        url: "users_action/hewalat_users_action.php",
        method: "POST",
        data: {},
        success: function (data) {
          $("#hewalat_table_body").html(data);
        },
      });
    },
  });
});
