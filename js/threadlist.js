let createone = document.getElementById("createone");
createone.addEventListener("click", () => {
  $("#loginmodal").modal("hide");
  $("#signupmodal").modal("show");
});

let loginspan = document.getElementById("loginmodalopen");
loginspan.addEventListener("click", () => {
  $("#loginmodal").modal("show");
});
