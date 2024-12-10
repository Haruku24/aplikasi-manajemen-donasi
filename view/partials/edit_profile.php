<html>
 <head>
  <title>
   Edit Profile
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="../../assets/partials_css/edit_profile.css" rel="stylesheet"/>
 </head>
 <body>
  <div class="container mt-5">
   <div class="row">
    <div class="col-md-4">
     <div class="profile-card" id="profileCard">
      <img alt="Profile picture of a person with a beard and a hat" height="100" src="https://storage.googleapis.com/a1aa/image/A47sm9yuhZoeUClk5mmqRCcAe2WiqlpOWhPN99xNtTCXyi4TA.jpg" width="100"/>
      <h4>
       Jamed Allan
      </h4>
      <p>
       @james
      </p>
      <button class="btn btn-danger">
       Upload New Photo
      </button>
      <p class="mt-3">
       Upload a new avatar. Larger image will be resized automatically. Maximum upload size is 1 MB
      </p>
      <p>
       Member Since:
       <strong>
        29 September 2019
       </strong>
      </p>
     </div>
    </div>
    <div class="col-md-8">
     <div class="edit-profile-card">
      <h3>
       Edit Profile
      </h3>
      <form class="mt-4">
       <div class="row mb-3">
        <div class="col">
         <label class="form-label" for="fullName">
          Full Name
         </label>
         <input class="form-control" id="fullName" type="text" value="James"/>
        </div>
        <div class="col">
         <label class="form-label" for="username">
          Username
         </label>
         <input class="form-control" id="username" type="text" value="Allan"/>
        </div>
       </div>
       <div class="row mb-3">
        <div class="col">
         <label class="form-label" for="password">
          Password
         </label>
         <input class="form-control" id="password" type="password" value="**********"/>
        </div>
        <div class="col">
         <label class="form-label" for="confirmPassword">
          Confirm Password
         </label>
         <input class="form-control" id="confirmPassword" type="password" value="**********"/>
        </div>
       </div>
       <div class="row mb-3">
        <div class="col">
         <label class="form-label" for="email">
          Email Address
         </label>
         <input class="form-control" id="email" type="email" value="demonail@mail.com"/>
        </div>
        <div class="col">
         <label class="form-label" for="confirmEmail">
          Confirm Email Address
         </label>
         <input class="form-control" id="confirmEmail" type="email" value="demonail@mail.com"/>
        </div>
       </div>
       <button class="btn" type="submit">
        Update Info
       </button>
      </form>
     </div>
    </div>
   </div>
  </div>
  <script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOgQpeKBmBI4rEB5F1RJp/lwBcl1HEfYBXwsf9tbt7E" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>
 </body>
</html>
