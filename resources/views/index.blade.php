<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
  <button id="createPostButton" class="createPostButton">Create Post</button>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Body</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <div id="createPostDialog" class="createPostDialog" title="Create Post">
    <form id="postForm">
      <input id="csrfToken" type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="postTitle">Title</label><br>
        <input type="text" name="title" id="postTitle" class="form-control">
      </div>
      <div class="form-group">
        <label for="postBody">Body</label><br>
        <textarea name="body" id="postBody" class="form-control" cols="30" rows="10"></textarea>
      </div>
    </form>
  </div>

  <div id="error-message" class="error-message"></div>
  <div id="success-message" class="success-message">
    Post Created successfully!
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
