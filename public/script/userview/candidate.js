function create_html(json, method){
  const id = "outgo-" + method + "Dropdown";
  var list = document.getElementById(id);
  var url = location.href + "/outgo/edit";

  var outgoes = json.data;
  for(let i=0; i<outgoes.length; i++){
    var newLi = document.createElement("li");
    var newAnchor = document.createElement("a");
    var outgo = outgoes[i];
    if(outgo.status){
      var status = "Necessary";
    }else{
      var status = "Wasted";
    }
    var text = "amount:" + outgo.amount + ", status:" + status;
    var newTxt = document.createTextNode(text);
    let params = new URL(url);
    params.searchParams.append("id", outgo.id);

    newAnchor.appendChild( newTxt );
    newAnchor.setAttribute("href", params);
    newLi.appendChild(newAnchor);
    list.appendChild(newLi);
    }
  }

  function refresh(){
    var list = document.getElementById("outgo-editDropdown");
    while (list.firstChild) {
    list.removeChild(list.firstChild);
      }
    }

function getEditData(){
  const method = "edit";
  const url = "/ajax/data/get";
  var item = document.getElementById("edit-item").value;
  var date = document.getElementById("edit-date").value;
  var formData = new FormData(document.getElementById("outgo-editForm"));

  fetch(url, {method : "POST",
              headers : {"X-CSRF-Token": $('input[name="_token"]').val()},
              body   : formData,
              mode: 'same-origin',
            })
  .then(response=> {
    return response.json();
  })
  .then(json => {
    refresh();
    create_html(json, method);
  })
  .catch(e => {console.error("error", e);})
}

function getDeleteData(){
  const method = "delete"
  const url = "/ajax/data/get";
  var item = document.getElementById("edit-item").value;
  var date = document.getElementById("edit-date").value;
  var formData = new FormData(document.getElementById("outgo-editForm"));

  fetch(url, {method : "POST",
              headers : {"X-CSRF-Token": $('input[name="_token"]').val()},
              body   : formData,
              mode: 'same-origin',
            })
  .then(response=> {
    return response.json();
  })
  .then(json => {
    refresh();
    create_html(json);
  })
  .catch(e => {console.error("error", e);})
}
