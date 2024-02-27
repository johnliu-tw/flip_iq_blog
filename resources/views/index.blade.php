<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
  <button id="createPost">Create Post</button>
  <table>
    <thead>
      <td>title</td>
      <td>Body</td>
    </thead>
    <tbody>
    </tbody>
  </table>

  <div id="dialog" title="Create Post" style="display: none">
    <form action="/posts" method="POST">
      <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div>
        <label>Title</label>
        <input type="text" name="title" id="title">
      </div>
      <div>
        <label>Body</label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
      </div>
    </form>
  </div>
</body>
<script>
$( document ).ready(function() {
  reloadTable();
});

$('#createPost').click(function(){
  $( "#dialog" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        Submit: function() {
          createPost($(this));
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
})

function createPost(dialog){
  const token = $('#token').val();
  const title = $('#title').val();
  const body = $('#body').val();

  console.log({title, body, _token: token})

  $.ajax({
    url: '/posts',
    method: 'POST',
    headers: {'X-CSRF-TOKEN': token},
    data: {title, body}
  })
  .done(function( data ) {
    dialog.dialog('close');
    reloadTable();
  })
  .fail(function(data){
    alert(JSON.stringify(data.responseText));
  })
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
</script>