function refreshMe(url){
    window.location=url;
  }

  function dismissModal(/**@string */modalId){
    $("#"+modalId).modal('hide');
  }

  function showAlert(id,str_err){
    $("#"+id).text(str_err);
    $("#"+id).alert();
  }

  function hideAlert(id){
    $("#"+id).alert('close');
  }