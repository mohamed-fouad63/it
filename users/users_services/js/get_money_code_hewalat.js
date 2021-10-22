function get_money_code_hewalat() {
  var select_office_name_hewalat = document.getElementById(
    "hewalat_office_name"
  );
  var money_code_hewalat = document.getElementById("hewalat_money_code");
  var option_office_name_hewalat =
    select_office_name_hewalat.options[
      select_office_name_hewalat.selectedIndex
    ];
  money_code_hewalat.innerText = option_office_name_hewalat.value;
}
