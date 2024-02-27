$( document ).ready(function() {
  reloadTable();
});

$('#createPostButton').click(function() {
  $("#createPostDialog").dialog({
    resizable: false,
    height: "auto",
    width: 400,
    modal: true,
    buttons: {
      "Submit": function() {
        createPost($(this));
      },
      "Cancel": function() {
        $(this).dialog("close");
      }
    }
  });
});

function createPost(dialog) {
  const token = $('#csrfToken').val();
  const title = $('#postTitle').val();
  const body = $('#postBody').val();

  $.ajax({
    url: '/posts',
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': token },
    data: { title, body }
  })
  .done(function(_data) {
    dialog.dialog('close');
    showSuccess();
    reloadTable();
  })
  .fail(function(data) {
    showError(data);
  });
}

function showSuccess(){
  $("div#success-message").dialog({
    modal: true,
    title: "Success",
    buttons: {
      Ok: function() {
        $(this).dialog("close");
      }
    }
  });
}

function showError(data){
  $("div#error-message").dialog({
    modal: true,
    title: "Error",
    open: function () {
      let messages = "Errors occurred <br>";
      for (const [fieldName, reasons] of Object.entries(data.responseJSON)) {
        for(const reason of reasons){
          messages += `${reason}<br>`;
        }
      }
      $(this).html(messages);
    },
    buttons: {
      Ok: function() {
        $(this).dialog("close");
      }
    }
  });
}

function reloadTable(){
  $.ajax({
    url: '/posts',
  })
  .done(function( data ) {
    if(data) {
      $('table tbody').html('');
      data.forEach(row => {
        $('table tbody').append(`
          <tr>
            <td>${row.title}</td>
            <td>${row.body}</td>
          </tr>
        `)
      });
    }
  });
}