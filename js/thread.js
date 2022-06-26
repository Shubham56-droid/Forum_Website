let createone = document.getElementById("createone");
createone.addEventListener("click", () => {
  $("#loginmodal").modal("hide");
  $("#signupmodal").modal("show");
});



let postbtn = document.getElementById("postbtn");
let commentbox = document.getElementById("commentbox");

postbtn.addEventListener("click", () => {
  postbtn.classList.toggle("active");
  commentbox.classList.toggle("active");

  if (postbtn.className == "btn btn-success active") {
    postbtn.innerText = "Cancel Post";
    postbtn.classList.remove("btn-success");
    postbtn.classList.add("btn-danger");
  } else {
    postbtn.innerText = "Comment";
    postbtn.classList.remove("btn-danger");
    postbtn.classList.add("btn-success");
  }
});




