function error(messageCustom, situation) { alert(messageCustom); situation.focus(); return false; }
function comprobeForm(field) {
  if (field.user.value=='') return error('Debe introducir un usuario', field.user);
  if (field.dataHomeF1.value=='') { return error('Introduza a data de Inicio',field.dataHomeF1); }
  if (field.dataEndF1.value=='') { return error('Introduza a data de Fin',field.dataEndF1); }
  var date1 = new Date(field.dataHomeF1.value.replace(/-/g,'/'));
  var date2 = new Date(field.dataEndF1.value.replace(/-/g,'/'));
  if ( date1 > date2 ) { return error('A data de inicio non pode ser posterior \u00E1 de fin',field.dataHomeF1); }
  return true;
}
function comprobeForm2(field) {
  if (field.dataHomeF2.value=='') { return error('Introduza a data de Inicio',field.dataHomeF2); }
  return true;
}
function comprobeForm3(field) {
  if (field.dataHomeF3.value=='') { return error('Introduza a data de Inicio',field.dataHomeF3); }
  if (field.dataEndF3.value=='') { return error('Introduza a data de Fin',field.dataEndF3); }
  var date1 = new Date(field.dataHomeF3.value.replace(/-/g,'/'));
  var date2 = new Date(field.dataEndF3.value.replace(/-/g,'/'));
  if ( date1 > date2 ) { return error('A data de inicio non pode ser posterior \u00E1 de fin',field.dataHomeF3); }
  return true;
}
