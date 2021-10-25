function showImage(idAnh,test) {
    var fr=new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
      // fill fr with image data    
      fr.readAsDataURL(src.files[0]);
      document.getElementById("duongdan").style.width = "304px";
      document.getElementById("duongdan").style.height = "236px";
    });
  }

