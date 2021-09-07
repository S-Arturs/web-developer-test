let blur = false;
submitTextArea = document.getElementById("input-container");
submitButton = document.getElementById("submitButton");
submitButton.disabled = true;
//blur represents text input area being out of focus, aka when user tries clicking disabled submit button
submitTextArea.addEventListener("blur", function () {
   blur = true;
   validation();
});

function validation() {
   submitButton.disabled = true;
   let x = document.getElementById("input-container").value;
   let y = document.getElementById("vehicle3");
   console.log(y.checked);
   x = x.toLowerCase();
   let text;
   let regex =
      /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
   if (x == "") {
      //only show error if text input area is out of focus, otherwise user will see errors while entering email, which is annoying
      if (blur) {
         text = "Email address is required.";
      } else {
         text = "";
      }
   } else {
      if (!x.match(regex)) {
         if (blur) {
            text = "Please provide a valid e-mail address.";
         } else {
            text = "";
         }
      } else {
         if (x.endsWith(".co")) {
            if (blur) {
               text = "We are not accepting subscriptions from Colombia emails.";
            } else {
               text = "";
            }
         } else {
            if (!y.checked) {
               if (blur) {
                  text = "You must accept the terms and conditions";
               } else {
                  text = "";
               }
            } else {
               text = "";
               //once all checks are passed, we can enable button again
               enableButton();
            }
         }
      }
   }
   document.getElementById("error-message").innerText = text;
}
function enableButton() {
   document.getElementById("submitButton").disabled = false;
}