<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCbkV3b6Je-BLy_I3bK8lKUFJ5wUzzcpYA",
    authDomain: "chat-test-67cef.firebaseapp.com",
    projectId: "chat-test-67cef",
    storageBucket: "chat-test-67cef.appspot.com",
    messagingSenderId: "495254751652",
    appId: "1:495254751652:web:ddfa507f4846f40b2b9931",
    measurementId: "G-P4JR6C4K9W"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  
  var myName = prompt ("Enter Your Name");
  
  function sendMessage() {
    
    var message = document.getElementById("message").value;
    
    firebase.database().ref("message").push().set({
      "sender":myName,
      "message":message
    });
    
    return false;
  }
  
  firebase.database().ref("messages").on("child_added",function(snapshot){
    var html = "";
    html += "<li>";
      html += snapshot.val().sender + ": ".snapshot.val().message;
    html += "</li>";
    
    document.getElementById("messages").innerHTML += html;
    
  });
  
</script>

<form onsubmit="return sendMessage("");">
  <input id="message" placeholder="Enter Message" autocomplete="off">
  <input type="submit">
</form>

<ul id="messages">
  
</ul>