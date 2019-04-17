function checkRutGenerico(campo, isEmpresa, svalor){
  var tmpstr = "";
  var rut = campo;
  var i=0;
  var largo=0;
  var rutMax=rut;
  var j=0;
  var cnt=0;
  var dv="";
  var suma=0;
  var mul=0;
  var res=0;
  var dvi;
  if(campo.length == 0)
    return false;
  for ( i=0; i < rut.length ; i++ )
    if ( rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-' )
      tmpstr = tmpstr + rut.charAt(i);
  rut = tmpstr;
  largo = rut.length;
  tmpstr = "";
  for ( i=0; rut.charAt(i) == '0' ; i++ );
    for (; i < rut.length ; i++ )
      tmpstr = tmpstr + rut.charAt(i);
  rut = tmpstr;
  largo = rut.length;

  if ( largo < 2 ){
    alert("Debe ingresar el RUT completo.");
    return false;
  }
  for (i=0; i < largo ; i++ ){
    if( (rut.charAt(i) != '0') && (rut.charAt(i) != '1') && (rut.charAt(i) !='2') && (rut.charAt(i) != '3') && (rut.charAt(i) != '4') && (rut.charAt(i) !='5') && (rut.charAt(i) != '6') && (rut.charAt(i) != '7') && (rut.charAt(i) != '8') && (rut.charAt(i) != '9') && (rut.charAt(i) !='k') && (rut.charAt(i) != 'K') )
    {
      alert("El valor ingresado no corresponde a un RUT valido.");
      return false;
    }
  }
  tmpstr="";
  for ( i=0; i < rutMax.length ; i++ )
    if ( rutMax.charAt(i) != ' ' && rutMax.charAt(i) != '.' && rutMax.charAt(i) != '-' )
      tmpstr = tmpstr + rutMax.charAt(i);
  tmpstr = tmpstr.substring(0, tmpstr.length - 1);
  if ( (!(tmpstr < 50000000)) && (!isEmpresa) )
  {
    alert('El Rut ingresado no corresponde a un RUT de Persona Natural')
    return false;
  }
  var invertido = "";
  for ( i=(largo-1),j=0; i>=0; i--,j++ )
    invertido = invertido + rut.charAt(i);
  var drut = "";
  drut = drut + invertido.charAt(0);
  drut = drut + '-';
  cnt = 0;
  for ( i=1,j=2; i<largo; i++,j++ ){
    if ( cnt == 3 ){
      drut = drut + '.';
      j++;
      drut = drut + invertido.charAt(i);
      cnt = 1;
    }else{
      drut = drut + invertido.charAt(i);
      cnt++;
    }
  }
  invertido = "";
  for ( i=(drut.length-1),j=0; i>=0; i--,j++ ){
    if (drut.charAt(i)=='k')
      invertido = invertido + 'K';
    else
      invertido = invertido + drut.charAt(i);
  }

  switch(svalor) {
    case 1:
      document.getElementById("CustPermIDAux").value = invertido;
      break;
    case 2:
      document.getElementById("txtRutACrear").value = invertido;
      break;
  }//FIN INSTRUCCION
  if (!checkDV(rut)){
    alert("El RUT es incorrecto.");
    return false;
  }
  return true;
}
function checkDV(crut){
  var largo = 0;
  var dv ="";
  var rut="";
  var suma=0;
  var mul=0;
  var res=0;
  var dvr = '0';
  var dvi=0;
  var i=0;

  largo = crut.length;
  if(largo < 2){
    return false;
  }
  if(largo > 2){
    rut = crut.substring(0, largo - 1);
  }else{
    rut = crut.charAt(0);
  }
  var dv = crut.charAt(largo-1);
  if(!checkCDV(dv))
    return false;
  if(rut == null || dv == null){
    return false;
  }
  suma = 0;
  mul  = 2;
  for (i= rut.length -1 ; i >= 0; i--){
    suma = suma + rut.charAt(i) * mul;
    if(mul == 7){
      mul = 2;
    }else{
      mul++;
    }
  }
  res = suma % 11;
  if (res==1){
    dvr = 'k';
  }else{
    if(res==0){
      dvr = '0';
    }else{
      dvi = 11-res;
      dvr = dvi + "";
    }
  }
  if(dvr != dv.toLowerCase()){
    return false;
  }
  return true;
}
function checkCDV(dvr){
  var dv="";
  dv = dvr + "";
  if(dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K'){
    return false;
  }
  return true;
}
function soloRUT(e){
  var tecla = (document.all) ? event.keyCode : e.which;
  if(tecla==8) return true;
  var patron =/^[0-9kK]+$/;
  var te = String.fromCharCode(tecla);
  if(!patron.test(te) && tecla==0){
    return true;
  }

  if (tecla == 13){
    if(document.getElementById("chkEmpresas").checked){
      if(!document.getElementById("CustPermIDAux").value == ""){
        document.getElementById("txtRutACrear").focus();
        if(!document.getElementById("txtRutACrear").value == ""){
          document.getElementById("SignonPswdAux").focus();
        }
      }
    }else{
      if(!document.getElementById("txtRutACrear").value == ""){
        document.getElementById("SignonPswdAux").focus();
      }
    }
  }
  return patron.test(te);
}
function soloLetrasYNum(e){
  var tecla = (document.all) ? event.keyCode : e.which;
  if(tecla==8) return true;
  var patron =/^[0-9A-Za-z]+$/;
  var te = String.fromCharCode(tecla);
  if(!patron.test(te) && tecla==0){
    return true;
  }

  if (tecla == 13){
    if(document.getElementById("chkEmpresas").checked){
      if(!document.getElementById("CustPermIDAux").value == ""
        && !document.getElementById("txtRutACrear").value == ""
        && !document.getElementById("SignonPswdAux").value == ""){
        Procesar();
      }
    }else{
      if(!document.getElementById("txtRutACrear").value == ""
        && !document.getElementById("SignonPswdAux").value == ""){
        Procesar();
      }
    }
  }
  return patron.test(te);
}

function limpiaPuntoGuion(svalor) {
  var valCheck;
  var obj;
  if (document.getElementById("chkEmpresas").checked == true){
    switch(svalor) {
      case 1:
        obj = document.getElementById("CustPermIDAux").value;
        obj = obj.replace(".","");
        obj = obj.replace(".","");
        obj = obj.replace(/-/,"");
        document.getElementById("CustPermIDAux").value = obj;
        break;
      case 2:
        obj = document.getElementById("txtRutACrear").value;
        obj = obj.replace(".","");
        obj = obj.replace(".","");
        obj = obj.replace(/-/,"");
        document.getElementById("txtRutACrear").value = obj;
        break;
    }
  }
  if (document.getElementById("chkPersonas").checked == true){
    obj = document.getElementById("txtRutACrear").value;
    obj = obj.replace(".","");
    obj = obj.replace(".","");
    obj = obj.replace(/-/,"");
    document.getElementById("txtRutACrear").value = obj;
  }
}
